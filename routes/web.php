<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('appointment', 'DoctorAppointmentController');

Route::resource('test-name', 'TestListController');

Route::group(['prefix' => '/doctor', 'middleware' => 'auth'], function () {
    Route::get('/', 'DoctorController@index');
    Route::resource('/appointment', 'DoctorAppointmentController');
});

Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index');
    Route::resource('/district', 'DistrictController');
    Route::resource('/thana', 'ThanaController');
    Route::resource('/hospital', 'HospitalController');
    Route::resource('/test', 'TestController');
    Route::resource('/medicine', 'MedicineController');
    Route::resource('/doctor', 'DoctorController');
    Route::view('/customers', 'support.customers');
    Route::view('/videos', 'support.videos');
});
