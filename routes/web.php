<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::name('test.')->prefix('test')->group(function () {
    Route::get('/hello', [TasksController::class, 'hello'])->name('hello');
    Route::get('/lara', [TasksController::class, 'lara'])->name('lara');
    Route::get('/demo', [TasksController::class, 'demo'])->name('demo');
});


