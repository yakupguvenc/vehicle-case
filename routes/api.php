<?php

use Illuminate\Support\Facades\Route;

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


Route::namespace('Api')->middleware('auth:api')->group(function () {
    Route::get('vehicles', 'VehicleController@index');
    Route::get('vehicles/{id}/show', 'VehicleController@show');
});
