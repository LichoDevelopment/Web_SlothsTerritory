<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AgenciasController;
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


/**Admin routes */

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', 'HomeController@admin')->name('admin.index');
    Route::get('/sales', 'HomeController@sales')->name('admin.sales');
    
    Route::get('/agregar_reserva', 'AdminController@agregarReserva')->name('reservas.agregar');
    Route::get('/agencias', 'AdminController@agencias')->name('admin.agencias');
    Route::get('/tours', 'AdminController@tours')->name('admin.tours');
    
    Route::post('/reservacion', 'ReservacionController@store');
    Route::put('/reservacion', 'ReservacionController@update');
    
    Route::post('/tour', 'TourController@store');
    Route::put('/tour', 'TourController@update');
    
    Route::post('/precio', 'PrecioController@store');
    Route::put('/precio', 'PrecioController@update');
    
    Route::post('/agencia', 'AgenciaController@store');
    Route::put('/agencia', 'AgenciaController@update');
    
    Route::post('/horario', 'HorarioController@store');
    Route::put('/horario', 'HorarioController@update');

    Route::resource('agencias', 'AgenciasController');
});

/**Public routes */

Route::redirect('/', '/es');
Route::prefix('/{locale}')->group(function () {

    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/privacy-policy', 'HomeController@privacy')->name('privacy-policy');
    Route::get('/terms-conditions', 'HomeController@terms')->name('terms-conditions');
});


