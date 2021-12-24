<?php

use Illuminate\Support\Facades\Route;
use Domain\User\Http\Controllers\UserController;

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

Route::group(['prefix' => '/v1', 'middleware' => ['cors']], function () {
    Route::prefix('/users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::get('/{userId}', [UserController::class, 'show']);
        Route::put('/{userId}', [UserController::class, 'update']);
        Route::patch('/{userId}', [UserController::class, 'update']);
        Route::delete('/{userId}', [UserController::class, 'destroy']);
    });
});
