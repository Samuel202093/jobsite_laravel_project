<?php


// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Models\Listings; //importing the listing model

// All listings route: calling the listing controller for the index class
Route::get('/', [ListingController::class, 'index']);

// Route for search page
Route::get('/search', [ListingController::class,'search']);

// Route to create a new Listing
Route::get('/listing/create',[ListingController::class,'create'])->middleware('auth');


// creating the store route to store listing data coming from the create page
Route::post('/listings ',[ListingController::class, 'store']
)->middleware('auth');


// creating editing routes to edit data coming from the edit page
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');


// updating routes to edit data coming from the Edit page(update listings)
Route::put('/listings/{listing}',[ListingController::class, 'update'])->middleware('auth');



// deleting route for listing
Route::delete('/listings/{listing}',[ListingController::class, 'destroy'])->middleware('auth');


// manage listings
Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');


// Single Listing route: using eloquent method to render a single list using the controller method
Route::get('/listing/{listing}',[ListingController::class,'show']);


// route for register page
Route::get('/register',[UserController::class,'create'])->middleware('guest');

// route for login page
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');


// create a new user
Route::post('/users',[UserController::class,'store']);


// Logout route
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');


// Login route
Route::post('/users/authenticate',[UserController::class,'authenticate']);










//using an eloquent method to render a single list using function

// Route::get('/listing/{listing}', function(Listings $listing){
//     // return view('listing',[
//     //     'listing' => $listing
//     // ]);
// });

// Route::get('/listing/{id}', function ($id){
//     // return Listing::find($id);
//     return view('listing', [
//         'listing' => Listings::find($id)
//     ]);
// });

// Route::get('/', function () {
//     return view('listings',[
//         'heading' => 'Latest Listings',
//         'listings'=> Listings::all()
           
//     ]);
// });

