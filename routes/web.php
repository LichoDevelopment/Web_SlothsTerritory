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

/**Public routes */

<<<<<<< HEAD
Route::redirect('/', '/es');
Route::prefix('/{locale}')->group(function () {
=======
Route::redirect('/', '/en');
>>>>>>> bb41a9fe42201f74ab0c83003a69b182ae660887

    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/privacy-policy', 'HomeController@privacy')->name('privacy-policy');
    Route::get('/terms-conditions', 'HomeController@terms')->name('terms-conditions');
});



/**Admin routes */

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', 'HomeController@admin')->name('admin.index');
    Route::get('/reservations', 'HomeController@reservations')->name('admin.reservations');
    Route::get('/sales', 'HomeController@sales')->name('admin.sales');
    
    Route::post('/reservacion', 'ReservacionController@store');
    Route::put('/reservacion', 'ReservacionController@update');
    
    Route::post('/tour', 'TourController@store');
    Route::put('/tour', 'TourController@update');
    
    Route::post('/agencia', 'AgenciaController@store');
    Route::put('/agencia', 'AgenciaController@update');
    
    Route::get('/horario', 'HorarioController@index');
    Route::post('/horario', 'HorarioController@store');
    Route::put('/horario', 'HorarioController@update');

    Route::resource('agencias', 'AgenciasController');
});