<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Birth extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'birth';
    protected $primaryKey = 'id';
    protected $fillable = [
        'start_date','to_date'
    ];

    public static function createBirth($request){
        $data = new Birth();
        $data->start_date = $request->start_date;
        $data->to_date = $request->to_date;
        $data->save();

        return $data->id;
    }

}
