<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Channels\ChannelsController;

// Channel Routes
Route::namespace('Channels')->prefix('/channel')->group(function () {
    Route::get('/all', [ChannelsController::class, 'getAllChannels'])->name('channels.all');

    Route::middleware(['can:channel management','auth:sanctum'])->group(function () {
        Route::post('/store', [ChannelsController::class, 'store'])->name('channel.store');
        Route::put('/update', [ChannelsController::class, 'update'])->name('channel.update');
        Route::delete('/destroy', [ChannelsController::class, 'destroy'])->name('channel.destroy');
    });

});
