<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\admin\BaseController;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\User;

class HomeController extends BaseController
{
    public function index(){
        $data = new \stdClass();
        $data->total_active_users = User::activeUserCount();
        return view('admin.dashboard.home',array('data'=>$data));
    }

    /* public function notFound(Request $request){
        return view('admin.errors.404');
    }

    public function exceptions(Request $request){
        return view('admin.errors.500');
    }

    public function unauthorized(Request $request){
        return view('admin.errors.401');
    } */

    /* Set Time Zone in Sesstion For date display USE Start*/
    public function settimezone(Request $request){
        $data = $request->all();
        session()->put('customTimeZone',$data['timezone']);
    }
    /* Set Time Zone in Sesstion For date display USE End*/




    /* public function emails(Request $request){
        return view('admin.temp.emails');
    }
    public function stats(Request $request){
        return view('admin.temp.stats');
    }
    public function questionnaire(Request $request){
        return view('admin.temp.questionnaire');
    }
    public function notification(Request $request){
        return view('admin.temp.notification');
    }
    public function download(Request $request){
        return view('admin.temp.download');
    } */

}
