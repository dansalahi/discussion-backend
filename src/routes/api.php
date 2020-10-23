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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::prefix('v1/')->group(function () {

    // Authentication Routes.
    Route::prefix('/auth')->group(function () {
        Route::post('/register', 'Api\v1\Auth\AtuhController@register')->name('auth.register');
        Route::post('/login', 'Api\v1\Auth\AtuhController@login')->name('auth.login');
        Route::post('/logout', 'Api\v1\Auth\AtuhController@logout')->name('auth.logout');
    });

});
