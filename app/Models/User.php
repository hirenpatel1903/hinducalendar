<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Str;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\URL;
use Crypt;
use Yajra\DataTables\DataTables;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Helpers\Helper;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Helpers;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /* Get User Details */
    public static function getUserDetails($id){
        $data = User::find($id);
        if($data){
            if(isset($data) && $data->profile_pic !=''){
                $data->profile_pic = Helper::displayProfilePath().$data->profile_pic;
            }
        }
        return $data;
    }

    public static function updateMyProfile($request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $profilelogoName = $data->profile_pic;
        if(isset($request->profile_pic) && $request->profile_pic !=''){

            /* Unlink Image */
            if(isset($data->profile_pic) && $data->profile_pic!=''){
                $imagePath = Helper::profileFileUploadPath().''.$data->profile_pic;
                if(file_exists($imagePath)){
                    unlink($imagePath);
                }
            }

            $profilelogo   = $request->profile_pic;
            $profilelogoName = 'Profile-'.time().'.'.$request->profile_pic->getClientOriginalExtension();
            $profilelogo->move(Helper::profileFileUploadPath(), $profilelogoName);
        }
        $data->profile_pic = $profilelogoName;
        $data->save();
        return self::getUserDetails($data->id);
    }

    /* User List */
    public static function getUsers($request){

        $user_data = User::leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->select('users.*', 'roles.name as role_name');

        if($request->order ==null){
            $user_data = $user_data->orderBy('id','desc');
        }


        $searcharray = array();
    	parse_str($request->fromValues,$searcharray);

        if(isset($searcharray) && !empty($searcharray)){
            if($searcharray['searchByRole'] !=''){
                    $user_data->where("roles.id",'=',$searcharray['searchByRole']);
            }
            if($searcharray['searchByStatus'] !=''){
                    $user_data->where("users.status",'=',$searcharray['searchByStatus']);
            }
        }

        return Datatables::of($user_data)
            ->addColumn('status', function ($data) {
            return Helper::Status($data);
        })
        ->addColumn('action', function ($data) {
            $editLink = URL::to('/').'/admin/user/'.$data->id.'/edit';
            $viewLink = URL::to('/').'/admin/user/'.$data->id;

            return Helper::Action($editLink,$data->id,$viewLink);
        })
        ->rawColumns(['status','action'])
        ->make(true);

    }

    public static function activeUserCount(){
        $query = User::where('status',config('const.statusActive'));
        return $query->count();
     }

    public static function user_register($request){
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->email_verified_at = Carbon::now();
        $data->role_id = config('const.roleUser');
        $data->status = $request->status;
        // $data->refer_code = IdGenerator::generate(['table' => 'users', 'length' =>8, 'prefix' =>config('const.referCodePrefix'),'field'=>'refer_code']);

        // $refercode_id =
        // if(isset($request->user_code)){
        //     $data->user_code = $request->user_code;
        // }

        $data->save();

        return $data->id;
    }
}
