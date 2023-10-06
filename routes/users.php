<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/login', [UserController::class, 'showLoginForm'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->name('users.login');
Route::post('/logout', [UserController::class, 'destroy'])->middleware('auth');
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/register/store', [UserController::class, 'store'])->name('users.store');
