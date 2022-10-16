<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id','api_key'
    ];

    public static function createSetting($request){
        $data = new Setting();
        $data->user_id = $request->user_id;
        $data->api_key = $request->api_key;
        $data->save();

        return $data->id;
    }

}
