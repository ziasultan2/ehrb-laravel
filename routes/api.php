<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/register'], function () {
    Route::post('user', 'Auth\UserAuthController@signup');
});


Route::group(['prefix' => '/login'], function () {
    Route::post('user', 'Auth\UserAuthController@login');
});

// Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function ()
Route::group(['prefix' => '/user', 'middleware' => 'auth:api'], function () {
    Route::resource('appointment', 'AppointmentController');
    Route::get('hospital/{latitude}/{longitude}', 'HospitalController@show');
    Route::get('ambulance/{latitude}/{longitude}', 'AmbulanceController@show');
    Route::get('blood/{thana}', 'BloodController@show');
    Route::get('test/{id}', 'TestController@show');
    Route::get('medicine/{id}', 'MedicationController@show');
    Route::resource('department', 'MedicalDepartmentController');
    Route::resource('district', 'DistrictController');
});
