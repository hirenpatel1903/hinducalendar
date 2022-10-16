<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendEmailTest;
use Mail;

class SendEmailJob //implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $event = $this->data;
		
        if(!isset($event['subject'])){
            $event['subject'] = '';
        }
        
        Mail::send('mail.'.$event['_blade'], $event, function($message) use ($event) {
            if(isset($event['is_contactus']) && $event['is_contactus'] ==1){
                $message->from(config('const.contactusfromemail'));
            }
            $message->to($event['email']);
            if(isset($event['cc']) && $event['cc'] !=''){
                $message->cc($event['cc']);    
            }
            $message->subject($event['subject']);
        });
    }
}
