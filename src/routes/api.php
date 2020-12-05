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


Route::prefix('v1/')->group(function () {

    // Authentication Routes.
    Route::prefix('/auth')->group(function () {
        Route::post('/register', 'Api\v1\Auth\AuthController@register')->name('auth.register');
        Route::post('/login', 'Api\v1\Auth\AuthController@login')->name('auth.login');
        Route::get('/user', 'Api\v1\Auth\AuthController@user')->name('auth.user');
        Route::post('/logout', 'Api\v1\Auth\AuthController@logout')->name('auth.logout');
    });


    Route::namespace('Api\v1\Channels')->prefix('/channel')->group(function () {
        Route::get('/all', 'ChannelsController@getAllChannels')->name('channels.all');
        Route::post('/store', 'ChannelsController@store')->name('channel.store');
        Route::put('/update', 'ChannelsController@update')->name('channel.update');
    });

});
