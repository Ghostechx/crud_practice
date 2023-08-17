<?php

use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('users', [UserController::class, 'index']);

// Route::post('/users', [UserController::class, 'create']);

Route::post('/users', [UserController::class, 'store']);

Route::get('/users/{user}', [UserController::class, 'show']);

Route::post('/users/{user}', [UserController::class, 'edit']);

Route::post('/users/{user}', [UserController::class, 'update']);

Route::post('/users/{user}', [UserController::class, 'destroy']);