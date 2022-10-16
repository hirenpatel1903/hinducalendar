<?php

namespace App\Helpers;

use Request;
use App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use URL;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

class Helper {

    public static function res($data, $msg, $code) {
        $response = [
            'status' => $code == 200 ? true : false,
            'code' => $code,
            'msg' => $msg,
            'version' => '1.0.0',
            'data' => $data
        ];
        return response()->json($response, $code);
    }

    public static function success($data = [], $msg = 'Success', $code = 200) {
        return Helper::res($data, $msg, $code);
    }

    public static function fail($data = [], $msg = "Some thing wen't wrong!", $code = 203) {
        return Helper::res($data, $msg, $code);
    }

    public static function error_parse($msg) {
        foreach ($msg->toArray() as $key => $value) {
            foreach ($value as $ekey => $evalue) {
                return $evalue;
            }
        }
    }

    public static function active($param = "") {
        return Request::path() == $param ? 'active open' : '';
    }



    public static function Status($data) {
        if ($data->status == '1') {
            return '<button type="button" class="btn green btn-xs pointerhide cursornone">Active</button>';
        }else if($data->status == '2'){
            return '<button type="button" class="btn yellow-mint btn-xs pointerhide cursornone">Pending</button>';
        }
        else {
            return '<button type="button" class="btn red btn-xs pointerhide cursornone">InActive</button>';
        }
    }


    public static function Action($editLink = '', $deleteID = '', $viewLink = '') {
        if ($editLink)
            $edit = '<a href="' . $editLink . '" class="btn btn-xs green"> <i class="fa fa-edit"></i></a>';
        else
            $edit = '';

        if ($deleteID)
            $delete = '<a onclick="deleteValueSet(' . $deleteID . ')"  class="btn btn-xs red deleterecord"  data-toggle="modal" data-target="#exampleModal" >  <i class="fa fa-trash"></i></a>';
        else
            $delete = '';

        if ($viewLink)
            $view = '<a href="' . $viewLink . '" class="btn btn-xs blue"><i class="fa fa-eye"></i></a>';
        else
            $view = '';

        return $view . '' . $edit . '' . $delete .'';
    }

    /* Profile Image store data in folder */
    /* For Store Path Start */
    public static function profileFileUploadPath(){
       return storage_path('app/public/profilepic/');
    }


    /* For Store Path End */

    /* For Display Image */
    public static function displayProfilePath(){
        return URL::to('/').'/storage/profilepic/';
    }


    /* Product Image store data in folder */
    /* For Store Path Start */
    public static function ProductFileUploadPath(){
        return storage_path('app/public/productpic/');
     }


     /* For Store Path End */

     /* For Display Image */
     public static function displayProductPath(){
         return URL::to('/').'/storage/productpic/';
     }

    public static function getRoleArray(){
        return array(
                "1" => "Admin",
                "2" => "User",
            );
    }

    public static function getTimezone(){
        if(Session::get('customTimeZone') && Session::get('customTimeZone') !='')
            return Session::get('customTimeZone');
        else
            return "Europe/Berlin";
    }

    public static function displayDateTimeConvertedWithFormat($date,$format=''){
        if(!$format){
            $format= config('const.displayDateTimeFormatForAll');
        }

        $dt = new DateTime($date);
        $tz = new DateTimeZone(Helper::getTimezone()); // or whatever zone you're after

        $dt->setTimezone($tz);
        return $dt->format($format);
    }

    function areActiveRoutes(Array $routes, $output = "activenav")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) return $output;
        }
    }

    function getCurlReponse($userId, $apiKey, $resource, array $data, $language)
    {
        $apiEndPoint = "http://json.astrologyapi.com/v1";


        $serviceUrl = $apiEndPoint.'/'.$resource.'/';
        $authData = $userId.":".$apiKey;

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $serviceUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        $header[] = 'Authorization: Basic '. base64_encode($authData);
        /* Setting the Language of Response */
        if( $language != NULL ) {
            array_push( $header , 'Accept-Language: ' .$language );
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }
}
