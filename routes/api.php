<?php

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

// Authentication Routes
Route::group(['namespace' => 'Api'], function() {
    Route::post('/register', 'ClientController@register');
    Route::post('/login', 'ClientController@login');
});
