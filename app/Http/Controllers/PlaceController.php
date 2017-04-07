<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Place;
use App\Task;
use App\Person;
use Intervention\Image\ImageServiceProvider;
use Illuminate\Support\Facades\Input;
use Image;

class PlaceController extends Controller
{

/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
    $places = Place::orderBy('name','asc')->paginate(10); // Collect from Database, paginate 10 per page
    return view('places.index', compact('places')); // Send to view
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
    $place = new Place; // New model
    $parents = Place::select(['name', 'id'])->get(); // Get any parents
    return view('places.create', compact('place','parents')); // Send to view
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/

public function store(Request $request)
{
    $this->validate($request, array( //Validation
        'name' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));
    $place  = new Place; // New Model Instandce
    $place->name = $request->name;
    $place->status = $request->status;
    $place->type = $request->type;
    $place->division = $request->division;
    $place->phone = $request->phone;
    $place->email = $request->email;
    $place->alt = $request->alt;
    $place->web = $request->web;
    $place->fax = $request->fax;
    $place->address = $request->address;
    $place->address2 = $request->address2;
    $place->city = $request->city;
    $place->state = $request->state;
    $place->zip = $request->zip;
    $place->country = $request->country;
    $place->note = $request->note;
    if($request->hasFile('image')){ // If a file was attached
        $image = $request->file('image'); // Get the image
        $filename = time() . '.' . $image->getClientOriginalExtension(); // Randomize the filename
        Image::make($image)->resize(160, 160)->save( public_path() . '\\media\\places\\'. $filename ); // Resize and save the file
        $place->image = $filename; // Save filename in database
        $place->save(); // Save the place
    };
    $people = $request->people; // Get any attached people
    $place->save(); // Save the place
    $place->people()->attach($people); // Attach people
    return redirect()->route('places.index') // Send to the view
    ->with('success','Item created successfully');
}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
    $place = Place::find($id); // Find the place
    return view('places.show', compact('place')); // Send to the view
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
    $place = Place::find($id); // Find the place
    $parents = Place::select(['name', 'id'])->get(); //Get all places
    return view('places.edit', compact('place', 'parents')); // Return the view
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
    $this->validate($request, array( // Validate
        'name' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));
    $place  = Place::find($id); // Find the place
    $place->name = $request->name;
    $place->status = $request->status;
    $place->type = $request->type;
    $place->division = $request->division;
    $place->phone = $request->phone;
    $place->email = $request->email;
    $place->alt = $request->alt;
    $place->web = $request->web;
    $place->fax = $request->fax;
    $place->address = $request->address;
    $place->address2 = $request->address2;
    $place->city = $request->city;
    $place->state = $request->state;
    $place->zip = $request->zip;
    $place->country = $request->country;
    $place->note = $request->note;
    $place->parent = $request->parent;
    if($request->hasFile('image')){ // If there is an image
        $image = $request->file('image'); // Get the image
        $filename = time() . '.' . $image->getClientOriginalExtension(); // Change the filename
        Image::make($image)->resize(160, 160)->save( public_path() . '\\media\\places\\'. $filename ); // Save the image
        $place->image = $filename; // Save the name in database
        $place->update(); // Update the place
    };
    $place->update(); // Update the place
    return redirect()->route('places.index') // Return the view
    ->with('success','Place updated successfully');
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
    Place::find($id)->delete(); // Delete the place
    return redirect()->route('places.index') // Return the view
    ->with('success','Place deleted successfully');
}
}