<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index']); //http://127.0.0.1:8000/api/users?page=1
Route::get('/users/{user}', [UserController::class, 'show']); //http://127.0.0.1:8000/api/users/1
Route::post('/users', [UserController::class, 'store']); //http://127.0.0.1:8000/api/users