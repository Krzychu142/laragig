<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController; // remember about import
//use App\Models\Listing; // same naming as in Models/Listing.php
// Single listing
// that's how looks like route model binding
// it has build in "if else with abort if it doesn't exist"
// Route::get('/listing/{listing}', function (Listing $listing) {
// })->where('listing', '[0-9]+');
// ->name("name.of.route") - it's for form
Route::post('/listing/store', [ListingController::class, 'store'])->name('listing.store');
Route::get('/listing/create', [ListingController::class, 'create']);

Route::get('listing/{listing}/edit', [ListingController::class, 'edit'])->where('listing', '[0-9]+');
// it should be under create, create can be recognized as {listing}, our route is safe because we are checking this by ->where
Route::put('listing/{listing}/update', [ListingController::class, 'update'])->where('listing', '[0-9]+')->name('listing.update');
Route::delete('listing/{listing}/delete', [ListingController::class, 'destroy'])->where('listing', '[0-9]+');
Route::get('/listing/{listing}', [ListingController::class, 'show'])->where('listing', '[0-9]+');
