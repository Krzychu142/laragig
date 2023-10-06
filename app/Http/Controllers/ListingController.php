<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
// for delete the old image
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    private function isUserOwner(Listing $listing): void
    {
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
    }

    private function listingValidation(Request $request, bool $isUpdate): array
    {
        $companyFieldRules = ['required'];

        if (!$isUpdate) {
            $companyFieldRules[] = Rule::unique('listings', 'company');
        }

        return $request->validate([
            'title' => 'required',
            'logo',
            'company' => $companyFieldRules,
            'location' => 'required',
            'website',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
    }

    public function index(Request $request)
    {
        return view('listings.index', [
            'heading' => "Latest Listings",
            "listings" => Listing::filter($request->only('tag', 'search'))->latest()->paginate(6)
        ]);
    }

    public function show(Listing $listing)
    {
        $current_user = auth()->user();
        $isOwner = $current_user && $listing->user_id == $current_user->id;

        return view('listings.show', [
            "listing" => $listing,
            "isOwner" => $isOwner
        ]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $formFields = $this->listingValidation($request, false);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store();
        }

        $formFields['user_id'] = auth()->user()->id;
        Listing::create($formFields);

        return redirect('/')->with('message', 'Job gig created correctly!');
    }

    public function edit(Listing $listing)
    {
        $this->isUserOwner($listing);
        return view('listings.edit', [
            "listing" => $listing
        ]);
    }

    public function update(Request $request, Listing $listing)
    {
        $this->isUserOwner($listing);
        $formFields = $this->listingValidation($request, true);

        $updates = [];
        foreach ($formFields as $key => $value) {
            if ($listing->$key != $value) {
                $updates[$key] = $value;
            }
        }

        if($request->hasFile('logo')){
            if ($listing->logo) {
                Storage::delete($listing->logo);
            }
            $updates['logo'] = $request->file('logo')->store();
        }

        if (!empty($updates)) {
            $listing->update($updates);
        }

        return back()->with('message', 'Job gig updated correctly!');
    }

    public function destroy(Listing $listing)
    {
        $this->isUserOwner($listing);

        if ($listing->logo) {
            Storage::delete($listing->logo);
        }

        $listing->delete();

        return redirect('/')->with('message', 'Job gig deleted!');
    }

    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listing]);
    }
}
