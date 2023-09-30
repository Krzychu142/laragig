<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        // validation in controller
        // $request->all() - will give back all incoming request's inputs
        // in validate pass the array with rules about data

//        dd($request->all());

        $formFields = $request->validate([
            'title' => 'required',
            // some properties can have more than 1 rule, than use []
            // Rule class :: methods, unique("nameOfTable" "nameOfColumn")
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        // to show error from validate we need to use @error('nameOfField') directive in view
        // inside this error to enderror we will have access to {{$message}}
        // @enderror

        // if we are here it means validation pass
        // to create new record in DB we need to user Listing::create()

        Listing::create($formFields);

        return redirect('/');
    }
}
