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

// Payment Frequencies
Route::resource('paymentfrequencies','API\PaymentFrequencyController');

// Vehicle types
Route::resource('vehicletypes','API\VehicleTypeController');

// Vehicles
Route::put('vehicles/reset_counters','API\VehicleController@reset_counters')->name('vehicles.reset_counters');
Route::put('vehicles/reset_counter/{vehicle}','API\VehicleController@reset_counter')->name('vehicles.reset_counter');
Route::get('vehicles/generate_payment_report','API\VehicleController@generate_payment_report')->name('vehicles.generate_payment_report');
Route::resource('vehicles','API\VehicleController');

// Stays

Route::put('stays/end/{stay}','API\StayController@end')->name('stays.end');
Route::get('stays/stay_completed','API\StayController@stayCompleted')->name('stays.stay_completed');
Route::get('stays/stay_uncompleted','API\StayController@stayUncompleted')->name('stays.stay_uncompleted');
Route::resource('stays','API\StayController');