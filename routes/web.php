<?php
use Illuminate\Support\Facades\Route;
//use App\Models\Listing; // same naming as in Models/Listing.php
require __DIR__.'/listing.php';
require __DIR__ . '/users.php';
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// All listing
// replace this function {} with controller
// brackets [NameOfController::class, 'nameOfMethod']
Route::get('/', [App\Http\Controllers\ListingController::class, 'index']);

// to create a controller use php artisan make:controller NameOfController

// all controllers are in Http -> Controllers

// common resource routes:
// index - show all listings
// show - show single listing
// create - show form to create new listing
// store - store new listing
// edit - show form to edit listing
// update - update listing
// destroy - delete listing

// workflow to add new piece of functionality is ROUTE -> CONTROLLER -> VIEW
