<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // show all listings
    // we can get access to Request object on two-way
    // first is by dependence injection - Pass class Request to index
    // index(Request $request)
    // second - we can use helper - request()->query....
    public function index(Request $request)
    {
        // it also can be just $tags = $request->only('tag', 'search');
        // $tags = $request->only('tag');
        // $search = $request->only('search');
        //
        // $filters = [
        //   "tags" => $tags,
        //   "search" => $search,
        //  ];

        return view('listings.index', [
            'heading' => "Latest Listings",
            // methods ::all() and ::find() are valid methods of Listing
            // because Listing extends by Model class
            // "listings" => Listing::all(), // double :: because it's static method
            // built in method to get all sorted by the latest
            "listings" => Listing::filter($request->only('tag', 'search'))->get()
        ]);
    }

    // show single listing
    public function show(Listing $listing)
    {
        // $listing = Listing::find($id);

        // if ($listing) {
        // name convention nameoffolder.nameoffile
        return view('listings.show', [
            "listing" => $listing
        ]);
        // } else {
        //     abort('404');
        // }
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
//        dd($request);
    }
}
