<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers\Client'], function () {
    Route::group(['namespace' => 'Admin'], function () {
        Route::get('/', 'UserController@login')->name('admin.login');
        Route::get('/register', 'UserController@register')->name('admin.register');
    });
});
