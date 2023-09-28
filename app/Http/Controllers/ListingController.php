<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // show all listings
    public function index()
    {
        return view('listings.index', [
            'heading' => "Latest Listings",
            // methods ::all() and ::find() are valid methods of Listing
            // because Listing is extends by Model class 
            "listings" => Listing::all(), // double :: because it's static method
        ]);
    }

    // show single listing
    public function show(Listing $listing)
    {
        // $listing = Listing::find($id);

        // if ($listing) {
        // name convention nameoffolder.nameoffile
        return view('listing.show', [
            "listing" => $listing
        ]);
        // } else {
        //     abort('404');
        // }
    }
}
