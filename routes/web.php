<?php

use App\Http\Controllers\PollController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::name('demo.')->prefix('poll')->group(function () {
    Route::get('/', [TestController::class, 'index'])->name('list');
});

Route::resource('poll', PollController::class);

