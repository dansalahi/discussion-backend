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
    include __DIR__ . '/v1/authRoutes.php';


    Route::namespace('Api\v1')->group(function () {

        // Channel Routes
        include __DIR__ . '/v1/channelsRoutes.php';


    });

});
