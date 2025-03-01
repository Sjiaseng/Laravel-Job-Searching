<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Models\Listing_Basic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use League\CommonMark\Extension\CommonMark\Node\Block\Heading;

// go to /hello and display the text
Route::get('/hello-test', function(){
    return 'Hello World';
});

// response (view in the network properties)
// (any item, status code, headers modification)
Route::get('/response-test', function(){
    return response('<h1>Hello World</h1>', 200)
        ->header('Content-Type','text/plain') //modification
        ->header('foo', 'bar'); // add new header
});

// wildcard (Passing Example)
Route::get('/posts-test/{id}', function($id){
    dd($id); // show whatever passed in or ddd($id) for debugging
    return response('Post ' . $id);
})->where('id', '[0-9]+'); //the id can only be numbers

// searching (example)
Route::get('/search-test', function(Request $request){
    //dd($request->name . ' ' . $request ->city);
    return $request->name . ' ' . $request ->city;
});

// command for api.php -> php artisan install:api

// start here

// Hardcoding the Lists
Route::get('/listings_blade', function(){
    return view('/bladefile_differences_sample/listings_blade',[
        'heading' => 'Latest Heading',
        'listings' => [
            [
                'id' => 1,
                'title' => 'Listing 1',
                'description' => 'Lorem Ipsum'
            ],
            [
                'id' => 2,
                'title' => 'Listing 2',
                'description' => 'Lorem Ipsum'
            ]
        ]
    ]);
});

// Example using the models from database through eloquent model
Route::get('/listings_noblade', function () {
    return view('/bladefile_differences_sample/listings_noblade',[
        'heading' => 'Lastest Listings',
        'listings' => Listing_Basic::all()        
    ]);
});

// single listing
Route::get('/listingstest/{id}', function($id){
    return view('/bladefile_differences_sample/singlelist' ,[
        'listing' => Listing_Basic::find($id)
    ]);
});

// connection testing
Route::get('/test-connection', function () {
    try {
        DB::connection()->getPdo();
        return "Database connection is successful!";
    } catch (\Exception $e) {
        return "Could not connect to the database. Error: " . $e->getMessage();
    }
});


// PROJECT STARTS ---------------------------------------------------------------------------------------

// Default Page

/*
Route::get('/', function(){
    return view('listings',[
        'heading' => 'Lastest Listings',
        'listings' => Listing::all()        
    ]);
});
*/

// Single Listing (First Way to Do)

/* 
Route::get('/listings/{id}', function($id){
    $listing = Listing::find($id);

    if($listing){
        return view('listing',[
            'listing' => $listing
        ]);
    }else{
        abort('404');
    }

});
*/

// Single Listing (Second Way) - Get Further Info via ID [Pressing - href]

/*
Route::get('/listings/{listing}', function(Listing $listing){
    return view('listing', [
        'listing' => $listing
    ]);
});
*/

// with controllers

// default page
Route::get('/', [ListingController::class, 'index'])->name("home");

// manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// store listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// show 1 listing details
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// store edited data
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// delete data
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// show register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// create new user
Route::post('/users', [UserController::class, 'store']);

// logout function
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// login function
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

