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
use Illuminate\Database\Eloquent\Collection;

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

    public function merge(Collection $collection) {
        foreach ($collection as $item)
        {
            $this->items[$item->getKey()] = $item;
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
        $hour = Carbon::now('Asia/Kolkata')->format("H");
        $mintue = Carbon::now('Asia/Kolkata')->format("i");
        // Iterate over the period
        foreach ($period as $date) {
            $to_date = $date->format('Y-m-d');
            $to_date_day = $date->format('d');
            $to_date_month = $date->format('m');
            $to_date_year = $date->format('Y');

            $userId = $setting_details->user_id;
            $apiKey = $setting_details->api_key;
            $data = array(
                'date' => $to_date_day,
                'month' => $to_date_month,
                'year' => $to_date_year,
                'hour' => $hour,
                'minute' => $mintue,
                'latitude' => 23.022505,
                'longitude' => 72.571365,
                'timezone' => 5.3
            );

            // $resourceName = "advanced_panchang";    // subscribed plan api
            $resourceName = "astro_details";
            $vedicRishi = new VedicRishiClient($userId, $apiKey);

            // astro_details
            $PanchangData = $vedicRishi->call($resourceName, $data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

            // horo_chart
            $chartId = 'MOON';
            $HoroscopeData = $vedicRishi->getHoroChartById($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone'],$chartId);

            $jsonData_panchang = json_decode($PanchangData);
            $jsonData = json_decode($HoroscopeData);
            $jsonData[12] = $jsonData_panchang;

            // dd($jsonData);
            // dd(implode(',',$jsonData[0]->planet));
            // $jsonData = $responseData;
            // dd(preg_split('/(\s|-)/',$jsonData->Tithi));
            Birth_Details::create([
                'date' => $to_date ?? '-',
                'hindu_month' => $jsonData[12]->day ?? '-',
                'month_planet' => $jsonData[12]->day ?? '-',
                'vaar' => $jsonData[12]->day ?? '-',
                'paksha' => preg_split('/(\s|-)/',$jsonData[12]->Tithi)[0] ?? '-',
                'tithi' => preg_split('/(\s|-)/',$jsonData[12]->Tithi)[1] ?? '-',
                'yog' => $jsonData[12]->Yog ?? '-',
                'moon_rashi' => $jsonData[12]->moon_rashi ?? '-',
                'rashi_planet' => $jsonData[12]->rashi_planet ?? '-',
                'moon_varna' => $jsonData[12]->moon_varna ?? '-',
                'sun_rashi' => $jsonData[12]->sun_rashi ?? '-',
                'nakshatra' => $jsonData[12]->Naksahtra ?? '-',
                'karan' => $jsonData[12]->Karan ?? '-',
                'sunrise' => $jsonData[12]->sunrise ?? '-',
                'sunset' => $jsonData[12]->sunset ?? '-',
                $jsonData[0]->sign_name => implode(',',$jsonData[0]->planet) ?? '-',
                $jsonData[1]->sign_name => implode(',',$jsonData[1]->planet) ?? '-',
                $jsonData[2]->sign_name => implode(',',$jsonData[2]->planet) ?? '-',
                $jsonData[3]->sign_name => implode(',',$jsonData[3]->planet) ?? '-',
                $jsonData[4]->sign_name => implode(',',$jsonData[4]->planet) ?? '-',
                $jsonData[5]->sign_name => implode(',',$jsonData[5]->planet) ?? '-',
                $jsonData[6]->sign_name => implode(',',$jsonData[6]->planet) ?? '-',
                $jsonData[7]->sign_name => implode(',',$jsonData[7]->planet) ?? '-',
                $jsonData[8]->sign_name => implode(',',$jsonData[8]->planet) ?? '-',
                $jsonData[9]->sign_name => implode(',',$jsonData[9]->planet) ?? '-',
                $jsonData[10]->sign_name => implode(',',$jsonData[10]->planet) ?? '-',
                $jsonData[11]->sign_name => implode(',',$jsonData[11]->planet) ?? '-',
            ]);

        }

        return true;
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
