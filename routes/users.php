<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/logout', [UserController::class, 'destroy']);
Route::get('/register', [UserController::class, 'create']);
Route::post('/register/store', [UserController::class, 'store'])->name('users.store');
