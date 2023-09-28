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
        // methods ::all() and ::find() are valid methods of Listing
        // because Listing is extends by Model class 
        "listings" => Listing::all(), // double :: because it's static method
    ]);
});

// Single listing
// thats how looks like route model binding
// it has build in "if else with abort if dosn't exist"
Route::get('/listing/{listing}', function (Listing $listing) {

    // $listing = Listing::find($id);

    // if ($listing) {
    return view('listing', [
        "listing" => $listing
    ]);
    // } else {
    //     abort('404');
    // }

})->where('id', '[0-9]+');
