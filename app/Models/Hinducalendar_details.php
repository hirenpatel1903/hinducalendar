<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hinducalendar_details extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'hinducalendar_details';
    protected $primaryKey = 'id';
    protected $fillable = [
        'date','sunrise','sunset','moonrise','moonset','vaara','nakshatra','tithi','karana','yoga'
    ];

    /* Hindu Calendar Details List */
    public static function getHinduCalendarDetails($request){

        $user_data = Hinducalendar_details::orderBy('id')->get();

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
