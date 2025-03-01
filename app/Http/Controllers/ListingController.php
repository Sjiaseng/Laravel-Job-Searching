<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    // Show all Listings
    public function index(){
        //dd(request('tag'));
        return view('listings.index', [
            'listings'=> Listing::latest()->filter(request(['tag', 'search']))->paginate(4) // filter will call scope from controller
        ]); // if not using paginate do switch to get()
    } 
    // paginate(number) -> auto show results & paging buttons
    // simplePaginate(number) -> paging buttons but only next & prev choices
    

    // Show Single Listing
    public function show(Listing $listing){
        return view('listings.show',[
            'listing' => $listing
        ]);
    }

    // Show Create Form
    public function create(){
        return view('listings.create');
    }

    
    // Store Data
    public function store(Request $request){
        //dd($request->all());
        //dd($request->file('logo')->store());

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'

        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); // add a logos folder in public path
        }

        $formFields['user_id'] = Auth::id();

        Listing::create($formFields);

        //Session::flash('message', 'Listing created Successfully!');

        return redirect('/')->with('message', 'Listing created Successfully!');
    }

    //Show edit form
    public function edit(Listing $listing){
        //dd($listing->title);
        return view('listings.edit', ['listing' => $listing]);
    }

    //Update data
    public function update(Request $request, Listing $listing){
        //dd($request->all());
        //dd($request->file('logo')->store());

        //make sure logged in user is owner
        if($listing->user_id != Auth::id()){
            abort(403, 'Unauthorized Access');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'

        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); // add a logos folder in public path
        }

        $listing->update($formFields);

        //Session::flash('message', 'Listing created Successfully!');

        return back()->with('message', 'Listing Updated Successfully!');
    }

    // Manage Listing
    public function manage(){
        // Retrieve listings for the authenticated user
        $listings = auth()->user()->listings()->get(); // It works
        return view('listings.manage', ['listings' => $listings]);
    }

    // Delete Listing
    public function destroy(Listing $listing){
        //make sure logged in user is owner
        if($listing->user_id != Auth::id()){
            abort(403, 'Unauthorized Access');
        }        
        $listing->delete();
        return redirect('/')-> with('message', 'Deleted Listing Successfully');
    }

}
