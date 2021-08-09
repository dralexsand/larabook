<?php

use App\Http\Controllers\Api\v1\ReplyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ApiPollController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('polls')->prefix('polls')->group(function () {
    Route::get('/', [ApiPollController::class, 'index']);
    Route::get('/{id}', [ApiPollController::class, 'show'])->where(['id' => '[0-9]+']);
});

Route::apiResource('replies', ReplyController::class);

