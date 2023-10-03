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
            // "listings" => Listing::filter($request->only('tag', 'search'))->get()
            // instead of get we can use paginate(numberPerPage)
            // You can also use simplePaginate to have just next and previous button
            // if we don't use tailwind we need to publish pagination provider
            // php artisan vendor:publish and pick the provider which You want
            // we will get access to vendor/pagination with some templates
            // then in AppServiceProvider in boot method we need to tape
            // Paginator::userBootstrapFive (sth like that, check dock).
            // by default latest() will order by created_at, but you can provide other column
            "listings" => Listing::filter($request->only('tag', 'search'))->latest()->paginate(6)
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
        // file('nameOfInputWithFile'), store() method will save this file by default in storage/app
        // in config folder is file call filesystem.php, there you will be able to change place where your files will be saved
        // by change configuration for, for example S3
        // $request->file('logo')->store();
        // validation in controller
        // $request->all() - will give back all incoming request's inputs
        // in validate pass the array with rules about data
        $formFields = $request->validate([
            'title' => 'required',
            'logo',
            // some properties can have more than 1 rule, than use []
            // Rule class :: methods, unique("nameOfTable" "nameOfColumn")
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store();
            // to make this file public remember to create a link php artisan storage:link
        }
        // to show error from validate we need to use @error('nameOfField') directive in view
        // inside this error to enderror we will have access to {{$message}}
        // @enderror

        // if we are here it means validation pass
        // to create new record in DB we need to user Listing::create()

        Listing::create($formFields);

        // flash is message ex. message created, it stored in memory for one-page load
        // it's mean, when you refresh page or go to other URL it will disappear
        // Session::flash('message', 'Test'); == session()->flash('message', 'Test');
        return redirect('/')->with('message', 'Job gig created correctly!');
    }

    public function edit(Listing $listing)
    {
        // so what we need to do here is create new view, and give this $listing to in and display
        return view('listings.edit', [
            "listing" => $listing
        ]);
    }
}
