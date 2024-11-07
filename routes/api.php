<?php

use App\Http\Controllers\API\ClickTrackingController;
use App\Http\Controllers\API\ConfiguracionTransporteController;
use App\Http\Controllers\API\DistanceController;
use App\Http\Controllers\API\RouteOptimizationController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('records/', 'API\RecordsController@index');
Route::get('review', 'API\ReviewController@index');
Route::post('review', 'API\ReviewController@create');
Route::get('tour', 'API\TourController@info');
Route::post('mail', 'API\MailController@send');
Route::post('/trackClick', [ClickTrackingController::class, 'trackClick']);

Route::get('/calculate-distance', [DistanceController::class, 'calculate'])->name('api.calculateDistance');
Route::post('/calculate-distance', [DistanceController::class, 'calculate'])->name('api.calculateDistance');
Route::get('/optimized-route', [RouteOptimizationController::class, 'generateOptimizedRoute']);
Route::get('/getTransportPriceWeb', [ConfiguracionTransporteController::class, 'index'])->name('api.getTransportPriceWeb');
Route::get('/getAvailableTransportPlacesWeb/{scheduleId}/{date}', [ConfiguracionTransporteController::class, 'getAvailableTransportPlaces'])->name('api.getAvailableTransportPlacesWeb');
