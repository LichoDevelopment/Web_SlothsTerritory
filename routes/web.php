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
    Route::get('/registro', 'RegistroController@index')->name('admin.registro');
    Route::put('/reservacionEliminada/{id}', 'ReservacionController@updateEstadoEliminado'); 
    
    
    Route::get('/agregar_reserva', 'AdminController@agregarReserva')->name('reservas.agregar');
    Route::get('/editar_reserva/{id}', 'AdminController@editarReserva')->name('reservas.editar');
    Route::get('/ver_reserva/{id}', 'AdminController@verReserva')->name('reservas.ver');
    Route::get('/agencias', 'AdminController@agencias')->name('admin.agencias');
    Route::get('/tours', 'AdminController@tours')->name('admin.tours');
    Route::post('/enviarCorreo/{id}', 'AdminController@enviarCorreo')->name('admin.correo');
    
    Route::post('/reservacion', 'ReservacionController@store')->name('reserva.guardar');
    Route::put('/reservacion/{id}', 'ReservacionController@update')->name('reserva.actualizar');
    Route::put('/reservacionEstado/{id}', 'ReservacionController@updateEstado');
    Route::get('/eliminadas', 'ReservacionController@eliminadas')->name('reservas.eliminadas');
    
    Route::get('/agencia', 'AgenciaController@index')->name('admin.agencia');
    Route::post('/agencia', 'AgenciaController@store');
    Route::put('/agencia/{id}', 'AgenciaController@update');

    Route::get('/precios_tour/{agenciaid}/{tourid}', 'AgenciaController@precios_tour')->name('precios.tour');
    Route::get('/capacidad_maxima/{hora}', 'HorarioController@capacidad_maxima');
    Route::get('/cantidad_actual/{hora}', 'HorarioController@cantidad_actual');

    Route::delete('/reservacion/{id}', 'ReservacionController@destroy');
    Route::middleware(['admin'])->group(function () {

        Route::get('/tour', 'TourController@index')->name('admin.tour');
        Route::post('/tour', 'TourController@store');
        Route::put('/tour/{id}', 'TourController@update');
        Route::delete('/tour/{id}', 'TourController@destroy');
    
        Route::delete('/agencia/{id}', 'AgenciaController@destroy');
        
        Route::get('/precio', 'PrecioController@index')->name('admin.precio');
        Route::post('/precio', 'PrecioController@store');
        Route::put('/precio/{id}', 'PrecioController@update');
        Route::delete('/precio/{id}', 'PrecioController@destroy');
    });


    Route::get('/carusel', 'ImagenCaruselController@index')->name('admin.carusel');
    Route::post('/carusel', 'ImagenCaruselController@upload');
    Route::delete('/carusel/{id}', 'ImagenCaruselController@destroy');
    Route::post('/carusel/all', 'ImagenCaruselController@all');
    
    // Route::post('/agencia', 'AgenciaController@store');
    // Route::put('/agencia', 'AgenciaController@update');
    
    Route::get('/horario', 'HorarioController@index')->name('admin.horario');
    Route::post('/horario', 'HorarioController@store');
    Route::put('/horario/{id}', 'HorarioController@update');
    Route::delete('/horario/{id}', 'HorarioController@destroy');



    // Route::resource('agencias', 'AgenciasController');
});

/**Public routes */

Route::redirect('/', '/en');
Route::redirect('/privacy-policy', '/es/terms-conditions');
Route::redirect('/terms-conditions', '/es/terms-conditions');

Route::group(['prefix'=>'{locale}', 'where'=> ['locale'=> 'es|en']],function () use ($router) {
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/privacy-policy', 'HomeController@privacy')->name('privacy-policy');
    Route::get('/terms-conditions', 'HomeController@terms')->name('terms-conditions');
});

Route::get('/mensaje', 'MensajesWebController@index')->name('admin.mensaje');
Route::post('/mensaje', 'MensajesWebController@store')->name('mensaje.guardar');


