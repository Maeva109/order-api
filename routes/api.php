<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [\App\Http\Controllers\API\AuthController::class, 'logout']);
    });

    Route::apiResource('books', \App\Http\Controllers\API\BooksController::class);

    Route::post('register', [\App\Http\Controllers\API\AuthController::class, 'register']);
    Route::post('login', [\App\Http\Controllers\API\AuthController::class, 'login'])->name('login');
});