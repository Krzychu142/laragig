<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController; // remember about import
Route::post('/listing/store', [ListingController::class, 'store'])->name('listing.store');
Route::get('/listing/create', [ListingController::class, 'create'])->middleware('auth');
Route::get('/listing/manage', [ListingController::class, 'manage'])->middleware('auth');
Route::get('listing/{listing}/edit', [ListingController::class, 'edit'])->where('listing', '[0-9]+')->middleware('auth');
Route::put('listing/{listing}/update', [ListingController::class, 'update'])->where('listing', '[0-9]+')->name('listing.update');
Route::delete('listing/{listing}/delete', [ListingController::class, 'destroy'])->where('listing', '[0-9]+')->middleware('auth');
Route::get('/listing/{listing}', [ListingController::class, 'show'])->where('listing', '[0-9]+');
