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
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class SettingController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        try{
            $data = Setting::first();
            return view('admin.setting.edit',compact('data'));
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('setting.edit');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'api_key' => 'required',
            ]);

            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }

            $data = Setting::first();
            if(isset($data)){
                $data = Setting::updateOrCreate([
                    'id'   => $data->id,
                ],[
                    'user_id' => $request->user_id,
                    'api_key' => $request->api_key
                ]);
            }else{
                $data = Setting::createSetting($request);
            }

            session()->flash('success',  trans('messages.settingUpdate'));
            return redirect()->route('setting.edit');
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
       //
    }
}
