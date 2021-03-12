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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('music',[\App\Http\Controllers\MusicController::class, 'getAllMusic']);
Route::get('music/{id}', [App\Http\Controllers\MusicController::class, 'getMusic']);
Route::post('music', [\App\Http\Controllers\MusicController::class, 'createMusic']);
Route::put('music/{id}', [\App\Http\Controllers\MusicController::class, 'updateMusic']);
Route::delete('music/{id}', [\App\Http\Controllers\MusicController::class, 'deleteMusic']);

Route::post('user', [\App\Http\Controllers\UserController::class, 'createUser']);
Route::get('user', [\App\Http\Controllers\UserController::class, 'loginUser']);

Route::get('log',[\App\Http\Controllers\UserController::class, 'testLog']);
