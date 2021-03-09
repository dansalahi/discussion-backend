<?php

use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\Api\v1\Threads\ThreadsController;

// Threads Routes
Route::namespace('Threads')->group(function () {
    Route::resource('threads', 'ThreadsController');
});




// Threads Routes
//Route::namespace('Threads')->prefix('/thread')->group(function () {
//    Route::get('/all', [ThreadsController::class, 'getAllThreads'])->name('threads.all');
//
//    Route::middleware(['can:thread management', 'auth:sanctum'])->group(function () {
//        Route::post('/store', [ThreadsController::class, 'store'])->name('thread.store');
//        Route::put('/update', [ThreadsController::class, 'update'])->name('thread.update');
//        Route::delete('/destroy', [ThreadsController::class, 'destroy'])->name('thread.destroy');
//    });
//
//});
