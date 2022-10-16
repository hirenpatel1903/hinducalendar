<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\admin\BaseController;
use App\Helpers\Helper;
use Illuminate\Support\Facades\URL;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $roles = Helper::getRoleArray(); 
            return view('admin.user.index',array('roles'=>$roles));
        }catch(\Exception $e){                  
            session()->flash('error',$e->getMessage());
            return redirect()->route('user.index');
        }
    }

    public static function postUsersList(Request $request){   
        return User::getUsers($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $data = User::getUserDetails($id);
            return view('admin.user.show',compact('data'));
        }catch(\Exception $e){                  
            session()->flash('error',$e->getMessage());
            return redirect()->route('user.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $data = User::find($id);
            return view('admin.user.edit',compact('data'));
        }catch(\Exception $e){                  
            session()->flash('error',$e->getMessage());
            return redirect()->route('user.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{       
            $validator = Validator::make($request->all(), [
                'name' => 'required',                
            ]);

            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }
            
            $data = User::find($id);
            $data->name = $request->name;
            $data->status = $request->status;
            $data->save();
            
            session()->flash('success',  trans('messages.userUpdate'));
            return redirect()->route('user.index');
        }catch(\Exception $e){                  
            session()->flash('error',$e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data = User::where('id',$id)->delete();
            return Response::json($data);
        }catch(\Exception $e){
            Log::error('UserController->destroy' . $e->getCode());
        } 
    }

    /* Get My profile */
    public function getMyProfile(){
        try{
            $data = User::getUserDetails(Auth::user()->id);
            return view('admin.user.myprofile',compact('data'));
        }catch(\Exception $e){                  
            session()->flash('error',$e->getMessage());
            return redirect()->route('myprofile');
        }
    }
    
    public function updateMyProfile(Request $request){
        try{       
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'profile_pic' => 'nullable|image|mimes:jpeg,bmp,png,jpg|max:15000'
            ]);

            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }
            
            User::updateMyProfile($request);
            
            session()->flash('success',  trans('messages.updatemyProfile'));
            return redirect()->route('myprofile');
        }catch(\Exception $e){                  
            session()->flash('error',$e->getMessage());
            return back()->withInput();
        }
    }
}
