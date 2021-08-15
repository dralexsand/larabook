<?php

use App\Http\Controllers\BlockController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\PollitemController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::name('demo.')->prefix('poll')->group(function () {
    Route::get('/', [TestController::class, 'index'])->name('list');
});

Route::resource('poll', PollController::class);
Route::resource('blocks', BlockController::class);
Route::resource('questions', QuestionController::class);
Route::resource('pollitems', PollitemController::class);

Route::get('/polls/{id}', [PollController::class, 'polls'])
    ->name('polls.items');

Route::get('/preview/{id}', [\App\Http\Controllers\PreviewController::class, 'show'])
    ->name('preview.show');

