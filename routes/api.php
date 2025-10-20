<?php

use App\Http\Controllers\API\V1\AuthentcationController;
use App\Http\Controllers\API\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Authentaction Route
Route::post('/login', [AuthentcationController::class, 'login']);
Route::post('/register', [AuthentcationController::class, 'register']);

Route::middleware('auth:sanctum')->group(function(){
    // Profile Routes
    Route::post('/logout', [AuthentcationController::class, 'logout']);
    Route::get('/profile', [AuthentcationController::class, 'profile']);

    // User Management Routes
    Route::controller(UserController::class)->group(function(){
        Route::get('/users','index');
        Route::get('/users/{user}','show');
        Route::post('/users','store');
        Route::put('/users/{user}','update');
        Route::delete('/users/{user}','destroy');

    });
});
