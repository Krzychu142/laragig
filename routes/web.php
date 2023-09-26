<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing; // same naming as in Models/Listing.php

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
Route::get('/', function () {
    return view('listings', [
        'heading' => "Latest Listings",
        "listings" => Listing::all(), // double :: because it's static method
    ]);
});

// Single listing
Route::get('/listing/{id}', function($id){
    return view('listing', [
        'heading' => "Latest Listings",
        "listing" => Listing::find($id)
    ]);
})->where('id', '[0-9]+');