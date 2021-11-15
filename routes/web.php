<?php

use Illuminate\Support\Facades\Route;

//Auth Routes
require __DIR__ . '/auth.php';

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

// Frontend Route Area
Route::namespace('Frontend')
    ->name('frontend.')
    ->group(function () {

        // Home Page
        Route::get('/', 'HomeController')->name('home');

        // Vehicles Page
        Route::get('/vehicles', 'VehicleController@index')->name('vehicles');
        Route::get('/test', 'VehicleController@test');

        Route::get('/vehicles/{vehicle}/show', 'VehicleController@show')->name('vehicles.show');

    });

// Backend Route Area
Route::namespace('Backend')
    ->middleware(['auth'])
    ->prefix('admin')
    ->name('backend.')
    ->group(function () {
        Route::get('dashboard', 'DashboardController')->name('dashboard');
        Route::resource('vehicles', 'VehicleController');
    });


