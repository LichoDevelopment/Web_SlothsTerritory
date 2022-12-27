<?php

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

Route::get('records/', 'API\RecordsController@index' );
Route::get('review', 'API\ReviewController@index' );
Route::post('review', 'API\ReviewController@create' );
Route::get('tour', 'API\TourController@info' );
Route::post('mail', 'API\MailController@send' );
