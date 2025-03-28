<?php

use App\Http\Controllers\Admin\CajaController;
use App\Http\Controllers\Admin\MovimientoCajaController;
use App\Http\Controllers\Admin\MovimientoInventarioController;
use App\Http\Controllers\Admin\ReporteController;
use App\Http\Controllers\AdminTransporteController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReservacionController;
use App\Http\Controllers\SalesAgentController;
use App\Http\Controllers\TicketController;
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

Route::post('/process-payment', 'PaymentController@processPayment');
Route::post('/process-payment-sdk', 'PaymentController@processPaymentSDK');
Route::post('/tours-api', 'TourController@getToursApi');
Route::get('/getPriceWeb/{id}', 'PrecioController@getPriceWeb');
Route::get('/getSchedulesWeb/{id}/{date}', 'HorarioController@getSchedulesWeb');
Route::get('/reservationWeb/{hash}', 'ReservacionController@getTilopayTransaction');
Route::put('/updateReservation/{hash}', 'ReservacionController@updateFromWeb');
Route::post('/get-tilopay-token', 'PaymentController@getTokenTilopay');



Route::get('/imprimir-ticket', 'ImpresionController@imprimirTicket')->name('imprimir.ticket');


Route::post('/print-ticket', [TicketController::class, 'printTicket']);
Route::middleware(['auth'])->group(function () {

    // Ruta para generar link de pago
    Route::get('/reservas/{id}/generar-link-pago', [PaymentController::class, 'createPaymentLink'])
        ->name('reservas.generar.link');
    // Ruta para generar link de pago vía AJAX
    Route::post('/reservas/generar-link-pago', [PaymentController::class, 'ajaxGeneratePaymentLink'])
        ->name('reservas.generar.link.ajax');

    Route::put('/reservas/{id}/toggle-pago', [ReservacionController::class, 'togglePago']);
    Route::put('/reservas/{id}/marcar-llego', [ReservacionController::class, 'marcarLlego'])->name('reservas.marcarLlego');

    Route::post('/admin/transport/assign', [AdminTransporteController::class, 'assignTransport'])->name('admin.transport.assign');

    Route::get('/transporte', [AdminTransporteController::class, 'index'])->name('admin.transporte');
    Route::get('/transporte/ruta', [AdminTransporteController::class, 'generarRuta'])->name('admin.transporte.ruta');


    Route::get('/precio', 'PrecioController@index')->name('admin.precio');
    Route::post('/precio', 'PrecioController@store');
    Route::put('/precio', 'PrecioController@update');
    Route::delete('/precio/{id}', 'PrecioController@destroy');

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
    });


    Route::get('/pagos', 'AdminController@consultarPagos')->name('admin.pagos');
    Route::get('/links-pagos', [PaymentController::class, 'consultarLinks'])->name('admin.links.pago');

    Route::get('/horario', 'HorarioController@index')->name('admin.horario');
    Route::post('/horario', 'HorarioController@store');
    Route::put('/horario/{id}', 'HorarioController@update');
    Route::delete('/horario/{id}', 'HorarioController@destroy');

    // Rutas de Productos (CRUD)
    Route::resource('productos', 'Admin\ProductoController')->names('productos');
    // Rutas de Movimientos de Inventario (CRUD)
    Route::resource('movimientos', 'Admin\MovimientoInventarioController')
        ->only(['index','edit','update','show','destroy'])
        ->names('movimientos');
    // Rutas separadas para "Venta de producto"
    Route::get('movimientos/venta/create', [MovimientoInventarioController::class, 'createVenta'])
         ->name('movimientos.venta.create');
    Route::post('movimientos/venta', [MovimientoInventarioController::class, 'storeVenta'])
         ->name('movimientos.venta.store');

    // Rutas separadas para "Agregar inventario"
    Route::get('movimientos/entrada/create', [MovimientoInventarioController::class, 'createEntrada'])
         ->name('movimientos.entrada.create');
    Route::post('movimientos/entrada', [MovimientoInventarioController::class, 'storeEntrada'])
         ->name('movimientos.entrada.store');


    // CRUD de Cajas
    Route::resource('cajas', 'Admin\CajaController')->names('cajas');
    // CRUD de Movimientos de Caja
    Route::resource('movimientos_caja', 'Admin\MovimientoCajaController')->names('movimientos_caja');

    Route::post('cajas/{caja}/cerrar', [CajaController::class, 'cerrarCaja'])->name('cajas.cerrar');

    Route::get('reportes', [ReporteController::class, 'index'])->name('reportes.index');
});




Route::post('/web-consulting-email', 'MensajesWebController@reply')->name('web.consulting.reply');

Route::get('/agentes-de-ventas', [SalesAgentController::class, 'index'])->name('sales_agents.index');
Route::get('/agentes-de-ventas/download/{name}', [SalesAgentController::class, 'download'])->name('sales_agents.download');

// require __DIR__.'/auth.php';