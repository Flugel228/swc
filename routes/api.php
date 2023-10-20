<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers\API'], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::post('/register', 'UserController@register');
        Route::post('/login', 'UserController@login');
    });

    Route::group(['prefix' => 'events'], function () {
        Route::get('/', 'EventController@index');
        Route::post('/', 'EventController@store');
        Route::delete('/{event}', 'EventController@destroy');
        Route::post('{event}/participants', 'EventController@addParticipant');
        Route::post('{event}/participants/delete', 'EventController@deleteParticipant');
    });
});
