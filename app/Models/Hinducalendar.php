<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hinducalendar extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'hinducalendar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'start_date','to_date','ayanamsa','location','result_type'
    ];

    public static function createHinducalendar($request){
        $data = new Hinducalendar();
        $data->start_date = $request->start_date;
        $data->to_date = $request->to_date;
        $data->ayanamsa = $request->ayanamsa;
        $data->location = $request->coordinates;
        $data->result_type = 'basic';
        $data->save();

        return $data->id;
    }

}
