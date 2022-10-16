<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Helpers\Helper;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Helpers;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class Birth_Details extends Authenticatable {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'birth_details';
    protected $primaryKey = 'id';
    protected $fillable = [
        'date','hindu_month','month_planet','vaar','paksha','tithi','yog','nakshatra','moon_rashi','rashi_planet','moon_varna','sun_rashi','karan','sunrise','sunset','Aries','Taurus','Gemini','Cancer','Leo','Virgo','Libra','Scorpio','Sagittarius','Capricorn','Aquarius','Pisces'
    ];

    /* Birth Details List */
    public static function getBirthDetails($request){

        $user_data = Birth_Details::orderBy('id')->get();

        return Datatables::of($user_data)
        ->addColumn('action', function ($data) {
            $editLink = '';
            $viewLink = '';
            // $viewLink = URL::to('/').'/admin/birth/'.$data->id;

            return Helper::Action($editLink,'',$viewLink);
        })
        ->rawColumns(['action'])
        ->make(true);

    }
}
