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
use App\Models\Birth;
use App\Models\Birth_Details;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use App\Astrologyapi\VedicRishiClient;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class BirthController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return view('admin.birth_details.index');
        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('birth.index');
        }
    }

    public static function getBirthAPI($birth_id){
        Birth_Details::truncate();
        $setting_details = Setting::orderby('id','DESC')->first();
        $birth_details = Birth::where('id',$birth_id)->first();

        // Date start_date to end_date
        $_start_date = $birth_details->start_date;
        $_to_date = $birth_details->to_date;

        $period = CarbonPeriod::create($_start_date, $_to_date);

        // Iterate over the period
        foreach ($period as $date) {
            echo $date->format('Y-m-d');
        }

        // Convert the period to an array of dates
        $dates = $period->toArray();

        dd($birth_details->start_date,$birth_details->to_date,$dates);
        // $start_date = Carbon::createFromFormat('Y-m-d', $birth_details->start_date);
        $to_date = Carbon::createFromFormat('Y-m-d', $birth_details->to_date);
        $userId = $setting_details->user_id;
        $apiKey = $setting_details->api_key;
        $data = array(
            'date' => $to_date->day,
            'month' => $to_date->month,
            'year' => $to_date->year,
            'hour' => 4,
            'minute' => 0,
            'latitude' => 23.022505,
            'longitude' => 72.571365,
            'timezone' => 5.5
        );

        $resourceName = "astro_details";
        $vedicRishi = new VedicRishiClient($userId, $apiKey);
        $responseData = $vedicRishi->call($resourceName, $data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

        $jsonData[] = json_decode($responseData);

        foreach($jsonData as $key=>$jsonDataEL){
            Birth_Details::create([
                'day' => $jsonDataEL->day ?? '',
                'tithi' => $jsonDataEL->Tithi ?? '',
                'yog' => $jsonDataEL->Yog ?? '',
                'nakshatra' => $jsonDataEL->Naksahtra ?? '',
                'karan' => $jsonDataEL->Karan ?? '',
                'sunrise' => $jsonDataEL->sunrise ?? '',
                'sunset' => $jsonDataEL->sunset ?? '',
            ]);
        }

        return $responseData;
    }

    public static function postBirthList(Request $request){

        $birth_details = Birth::orderby('id','DESC')->first();
        self::getBirthAPI($birth_details->id);

        return Birth_Details::getBirthDetails($request);
    }

    public function create(){
        return view('admin.birth_details.create');
    }

    public function store(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'start_date' => 'required',
                'to_date' => 'required',
            ]);

            if($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }

            $recordId = Birth::createBirth($request);
            if($recordId){
                session()->flash('success',  trans('messages.panchangCreated'));
            }else{
                session()->flash('error',  trans('messages.somethingWrong'));
            }

            return redirect()->route('birth.index');
       }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            return redirect()->route('birth.create')->withInput();
        }
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
    public function edit($id)
    {
        //
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
        //
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
