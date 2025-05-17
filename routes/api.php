<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthorController;

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
    // Routes protégées (nécessitent une authentification)
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [\App\Http\Controllers\API\AuthController::class, 'logout']);
        Route::post('/authors', [AuthorController::class, 'store']);
        Route::put('/authors/{author}', [AuthorController::class, 'update']);
        Route::delete('/authors/{author}', [AuthorController::class, 'destroy']);
    });
    Route::get('books', [\App\Http\Controllers\API\BooksController::class, 'index'])-> middleware('auth:sanctum');
   // Route::apiResource('books', \App\Http\Controllers\API\BooksController::class);
// Routes publiques (accès sans authentification)
    Route::post('register', [\App\Http\Controllers\API\AuthController::class, 'register']);
    Route::post('login', [\App\Http\Controllers\API\AuthController::class, 'login'])->name('login');
    Route::get('/authors', [AuthorController::class, 'index']);
    Route::get('/authors/{author}', [AuthorController::class, 'show']);
});

    
  


  