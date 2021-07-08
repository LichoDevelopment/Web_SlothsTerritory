<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgenciasController;
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

/**Public routes */
Route::get('/', 'HomeController@home')->name('home');
Route::get('/privacy-policy', 'HomeController@privacy')->name('privacy-policy');
Route::get('/terms-conditions', 'HomeController@terms')->name('terms-conditions');


/**Admin routes */

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', 'HomeController@admin')->name('admin.index');
    Route::get('/reservations', 'HomeController@reservations')->name('admin.reservations');
    Route::get('/sales', 'HomeController@sales')->name('admin.sales');
    
    Route::post('/reservation', 'ReservationController@store');
    Route::put('/reservation', 'ReservationController@update');
    
    Route::post('/tour', 'TourController@store');
    Route::put('/tour', 'TourController@update');
    
    Route::post('/agency', 'AgencyController@store');
    Route::put('/agency', 'AgencyController@update');
    
    Route::get('/schedule', 'ScheduleController@index');
    Route::post('/schedule', 'ScheduleController@store');
    Route::put('/schedule', 'ScheduleController@update');

    // Route::resource('agencias', AgenciasController::class);
});