<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Clear Cache */
Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('storage:link');
    return "All cache cleared!";
});

// Admin Console Start

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('customerhome');
Route::get('admin', [App\Http\Controllers\Auth\LoginController::class, 'admin_login']);
Route::get('admin/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('adminLogin');
Route::get('verification', [App\Http\Controllers\Auth\LoginController::class, 'verification']);
Auth::routes();

Route::post('resetpasswordemail', [App\Http\Controllers\Auth\ResetPasswordController::class, 'resetPasswordSendEmail'])->name('resetpasswordemail');
Route::get('forgot-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showPasswordResetForm']);
Route::post('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'resetPassword'])->name('passwordreset');
// Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('registration-confirmation/{token}/{type?}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'confirmation']);
Route::post('settimezone', [App\Http\Controllers\admin\HomeController::class, 'settimezone'])->name('settimezone');


Route::middleware('auth')->group(function(){

    Route::get('changepassword', [App\Http\Controllers\Auth\ResetPasswordController::class, 'changepassword'])->name('changepassword');
    Route::post('change-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'storeChangePassword'])->name('change.password');
    Route::get('myprofile', [App\Http\Controllers\admin\UserController::class, 'getMyProfile'])->name('myprofile');
    Route::post('updatemyprofile', [App\Http\Controllers\admin\UserController::class, 'updateMyProfile'])->name('updatemyprofile');

    Route::group(['prefix' => 'admin'], function() {

            Route::get('dashboard', [App\Http\Controllers\admin\HomeController::class, 'index'])->name('dashboard');

            /* User Section */
            Route::resource('user', \admin\UserController::class);
            Route::post('getusers', [App\Http\Controllers\admin\UserController::class, 'postUsersList'])->name('getusers');

            /* Birth Section */
            Route::resource('birth', \admin\BirthController::class);
            Route::post('getbirth', [App\Http\Controllers\admin\BirthController::class, 'postBirthList'])->name('getbirth');

            /* Hindu Calendar Section */
            Route::resource('hindu-calendar', \admin\HinduCalendarController::class);
            Route::post('gethinducalendar', [App\Http\Controllers\admin\HinduCalendarController::class, 'postCalendarList'])->name('getcalendar');
            Route::post('hindu-calendar/getlocation', [App\Http\Controllers\admin\HinduCalendarController::class, 'getlocation'])->name('getlocation');

            /* Setting Section */
            Route::get('setting', [App\Http\Controllers\admin\SettingController::class, 'edit'])->name('setting.edit');
            Route::post('setting/update', [App\Http\Controllers\admin\SettingController::class, 'update'])->name('setting.update');

    });
});
