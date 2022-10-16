<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use App\Models\Password_Resets;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    public function showPasswordResetForm($token){
        
        $tokenData = DB::table('password_resets')->where('token', $token)->first();
      
        if ( !$tokenData ) 
            return redirect()->to('/login');
			
        
        return view('auth.passwords.reset',array('token'=>$token));
    }
    
    public function resetPasswordSendEmail(Request $request){
	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        
        $user = User::where('email',$request->email)->first();
        if(!$user){
            session()->flash('error', trans('messages.notfoundEmail'));
			return redirect('password/reset'); 
		}

        $token = Crypt::encryptString($request->email);
        Password_Resets::updateOrCreate(
            [
                'email' => $request->email
            ], [
        'email' => $request->email,
        'token' => $token,
        'created_at' => Carbon::now()
        ])->forgotLink($token, $request->email);
		
		session()->flash('success', trans('messages.forgotPassword'));
		return redirect('password/reset'); 
    }
    
    public function resetPassword(Request $request,$token) {
        
        $password = $request->password;
        $tokenData = DB::table('password_resets') ->where('token', $token)->first();
      
        $user = User::where('email', $tokenData->email)->first();
        if ( !$user ) {
            session()->flash('error', trans('messages.InvalidResetPassword'));
            return redirect()->to('password/reset');
        }

        $user->password = Hash::make($password);
        $user->update();

        DB::table('password_resets')->where('email', $user->email)->delete();    
        session()->flash('success', trans('messages.passwordResetSuccess'));
        return redirect()->to('/login');
   }
   
   
    public function changePassword(){
        return view('auth.passwords.change');
    }
   
    public function storeChangePassword(Request $request){
        try{
            $validator = Validator::make($request->all(), [
               'currentpassword' => 'required',
               'password' => ['required'],
               'password_confirmation' => ['same:password'],
            ]);

            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }

            if(!Hash::check($request->currentpassword, auth()->user()->password)){
                session()->flash('error', trans('messages.currentPasdswordNotmatch'));
                return redirect()->route('changepassword');
            }

            $data = \App\Models\User::find(Auth::user()->id);
            $data->password = bcrypt($request->password);
            $data->save();

            session()->flash('success', trans('messages.passwordChanged'));
            return redirect()->route('changepassword');
        
        }catch(\Exception $e){                  
            session()->flash('error',$e->getMessage());
            return redirect()->route('changepassword')->withInput();
        }
    }
     
    /* Email Verifications */
    public function confirmation($token=''){
        try {
            
            $user = User::where(['email'=>Crypt::decryptString($token)])->WhereNull('email_verified_at')->update(['email_verified_at'=>Carbon::now()]);
            if($user){
                
                session()->flash('success', trans('messages.emailVerifySuccess'));
                if(isset(Auth::User()->id)){
                     return redirect()->route('login');
                }
                return redirect()->route('login');
                
            }else{
                session()->flash('error', trans('messages.emailAlreadyVerify'));
                if(isset(Auth::User()->id)){
                    return redirect()->route('login');
                }
                return redirect()->route('login');        
            }
        }
        catch (\Exception $e) {
            session()->flash('error', trans('messages.InvalidToken'));
            return redirect()->route('login');
        }
    }
}
