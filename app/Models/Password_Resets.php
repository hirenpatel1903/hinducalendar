<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Event;
use App\Events\SendMail;
use App\Jobs\SendEmailJob;

class Password_Resets extends Model
{
    protected $table = 'password_resets';
    public $timestamps = false;
    protected $primaryKey ='email';
	
    protected $fillable = [
        'email','token','created_at'
    ];
    public function forgotLink($token,$email)
    {
		dispatch(new SendEmailJob([
                    '_blade'=>'forgot',
                    'subject'=>trans('email.resetPassword'),
                    'email'=>$email,
                    'name'=>$email,
                    'token'=>$token
                ]));
				
       // Event::dispatch(new SendMail(['_blade'=>'forgot','subject'=>trans('email.subjectforgot',[],$language),'language'=>$language,'email'=>$email,'name'=>$email,'token'=>$token]));    
    }
}
