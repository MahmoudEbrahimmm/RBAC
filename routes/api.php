<?php

use App\Http\Controllers\API\V1\AuthentcationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Authentaction Route
Route::post('/login', [AuthentcationController::class, 'login']);
Route::post('/register', [AuthentcationController::class, 'register']);
Route::post('/logout', [AuthentcationController::class, 'logout']);
Route::post('/profile', [AuthentcationController::class, 'profile']);
