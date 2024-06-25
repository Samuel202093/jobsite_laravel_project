<?php

namespace App\Http\Controllers;

use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // it imports the rule constraint for unique names

$filters = [
    'search' => request('search')
];

class ListingController extends Controller
{

    //show all listing
    public function index(){
        // dd(Listings::latest()->filter(request(['search']))->paginate(3));
        return view('listings.index',[
            'listings'=> Listings::latest()->paginate(6), 
        ]);
    }

    public function search(){
        // dd(Listings::latest()->filter(request(['search'])));
        return view('listings.search',[
            'listings'=> Listings::latest()->filter(request(['search']))->paginate(6), 
        ]);
    }

    // show create list  
    public function create(){
        return view('listings.create');
    }

    // show single listing
    public function show(Listings  $listing){
        return view('listings.show',[
            'listing' => $listing
        ]);
    }

    // storing listing information in database
    public function store(Request $request){
        // validating the form fields in th server before submitting to database
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description' =>'required',
            'logo' => 'image|mimes:jpeg,png,jpg,svg,gif,avif|max:2048'
        ]);

        if ($request->hasFile('logo')) {
           $formFields['logo'] = $request->file('logo')->store('logos','public'); // this creates a logos folder to store the image file in public folder inside the storage folder.
        }

        $formFields['user_id'] = auth()->id(); // getting the user id from auth

        Listings::create($formFields); // inserting the form fields into the database using the create method
        return redirect('/')->with('message','listing created successfully!!'); // redirecting to the homepage and creating a flash message
    }

    // show the Edit Form
    public function edit(Listings $listing){
        return view('listings.edit', ['listings' => $listing]);
    }

    // update the listings
    public function update(Request $request, Listings $listing){
        // authenticating the logged in user
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized user');
        }
        // validating the form fields in th server before submitting to database
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description' =>'required',
            'logo' => 'image|mimes:jpeg,png,jpg,svg,gif,avif|max:2048'
        ]);

        if ($request->hasFile('logo')) {
           $formFields['logo'] = $request->file('logo')->store('logos','public'); // this creates a logos folder to store the image file in public folder inside the storage folder.
        }
        $listing->update($formFields); // updating the listing form field with the new listing

        return back()->with('message','listing updated successfully!!'); // redirecting to the homepage and creating a flash message
    }

    // delete the listings
    public function destroy(Listings $listing){
        // authenticating the logged in user
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized user');
        }
        $listing->delete();
        return redirect('/')->with('message','Listing deleted successfully!!'); // redirecting to the homepage and creating a flash message
    }

      // manage listings
      public function manage(){
        $user = auth()->user()->id; // getting the user_id from the auth
        $result = Listings::where('user_id',$user)->get(); // querying the Listings model with the user_id
        return view('listings.manage',[
            'listings'=> $result
        ]);
    }
    
}
