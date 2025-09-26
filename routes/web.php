<?php

use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;



Route::view('/', 'index');
Route::get('users', [UsersController::class, 'index']);
Route::get('users/{user}/change-role', [UsersController::class, 'changeRole']);
Route::resource('roles', RolesController::class);



require __DIR__.'/auth.php';