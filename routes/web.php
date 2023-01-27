<?php

use App\Http\Controllers\SalesAgentController;
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
    Route::get('/', 'HomeController@admin')->name('admin.index');
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


    // Route::get('/carusel', 'ImagenCaruselController@index')->name('admin.carusel');
    // Route::post('/carusel', 'ImagenCaruselController@upload');
    // Route::delete('/carusel/{id}', 'ImagenCaruselController@destroy');
    // Route::post('/carusel/all', 'ImagenCaruselController@all');
    
    // Route::post('/agencia', 'AgenciaController@store');
    // Route::put('/agencia', 'AgenciaController@update');
    
    Route::get('/horario', 'HorarioController@index')->name('admin.horario');
    Route::post('/horario', 'HorarioController@store');
    Route::put('/horario/{id}', 'HorarioController@update');
    Route::delete('/horario/{id}', 'HorarioController@destroy');

    // Route::prefix('galeria')->group(function () {
    //     Route::get('/', 'GaleriaController@index')->name('admin.galeria');
    //     Route::post('/', 'GaleriaController@upload')->name('admin.galeria.crear');
    //     Route::get('/tipos', 'GaleriaController@getTypos')->name('admin.galeria.tipos');
    //     Route::delete('/{id}', 'GaleriaController@destroy')->name('admin.galeria.eliminar');
    // });

    // DESACTIVADO HASTA QUE KEILOR DIGA.
    // Route::prefix('combos')->group(function () {        
    //     Route::get('/ver', 'ComboController@index')->name('admin.combos.index');
    //     Route::get('/ver/{id}', 'ComboController@show')->name('admin.combos.show');
    //     Route::get('/create', 'ComboController@create')->name('admin.combos.create');
    //     Route::post('/', 'ComboController@store')->name('admin.combos.store');
    //     Route::post('/update/{id}', 'ComboController@update')->name('admin.combos.update');
    //     Route::delete('/{id}', 'ComboController@destroy')->name('admin.combos.delete');
    // });

    // Route::prefix('site-sections')->group(function () {        
    //     Route::get('/ver', 'SiteSectionController@index')->name('admin.site.sections.index');
    //     Route::get('/ver/{id}', 'SiteSectionController@show')->name('admin.site.sections.show');
    //     Route::post('/', 'SiteSectionController@store')->name('admin.site.sections.store');
    //     Route::get('/edit/{id}', 'SiteSectionController@show')->name('sections.edit');
    //     Route::put('/', 'SiteSectionController@update')->name('admin.site.sections.update');
    //     Route::delete('/{id}', 'SiteSectionController@destroy')->name('admin.site.sections.delete');
    // });

    // Route::resource('agencias', 'AgenciasController');
});

/**Public routes */

// Route::redirect('/', '/en');
// Route::redirect('/privacy-policy', '/es/terms-conditions');
// Route::redirect('/terms-conditions', '/es/terms-conditions');
// Route::redirect('/combo', '/es/combo');

// Route::group(['prefix'=>'{locale}', 'where'=> ['locale'=> 'es|en']],function () use ($router) {
//     Route::get('/', 'HomeController@home')->name('home');
//     Route::get('/privacy-policy', 'HomeController@privacy')->name('privacy-policy');
//     Route::get('/terms-conditions', 'HomeController@terms')->name('terms-conditions');
//     Route::get('/combo', 'ComboController@combos')->name('combos');
// });

// Route::get('/mensaje', 'MensajesWebController@index')->name('admin.mensaje');
// Route::post('/mensaje', 'MensajesWebController@store')->name('mensaje.guardar');

// Route::get('/mensajesLeidos', 'MensajesWebController@leidos')->name('admin.mensajesLeidos');
// Route::delete('/mensaje/{id}', 'MensajesWebController@destroy');



Route::post('/web-consulting-email', 'MensajesWebController@reply')->name('web.consulting.reply');

Route::get('/agentes-de-ventas', [SalesAgentController::class, 'index'])->name('sales_agents.index');
Route::get('/agentes-de-ventas/download/{name}', [SalesAgentController::class, 'download'])->name('sales_agents.download');