<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PhoneAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController; 

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

Route::get('/', function () {
    return view('layouts.app');
});



//Route::delete('registers/destroy', 'RegisterController@massDestroy')->name('registers.massDestroy');
Route::resource('/registers', RegisterController::class);
Route::get('registers/division/district/{id}', [RegisterController::class, 'getDistrict']);
Route::get('registers/district/upazila/{id}', [RegisterController::class, 'getUpazila']);
Route::get('registers/upazila/center/{id}', [RegisterController::class, 'getCenter']);
Route::post('registers/store', [RegisterController::class, 'store'])->name('registers.store');

Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function () {
    //Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('', [DashboardController::class, 'showDashboard'])->name('dashboard');
});


//Route::get('/operator', [App\Http\Controllers\Operator\DashboardController::class, 'index'])->name('Operator.dashboard'); 

Route::group(['as'=>'operator.','prefix' => 'operator','namespace'=>'operator'], function () {
    Route::view('', 'operator.dashboard')->name('dashboard');
    //Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('phone-auth', [PhoneAuthController::class, 'index'])->name('phone-auth');
