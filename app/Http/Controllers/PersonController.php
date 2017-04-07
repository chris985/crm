<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Person;
use App\Task;
use App\Place;
use Intervention\Image\ImageServiceProvider;
use Illuminate\Support\Facades\Input;
use Image;
use Storage;
Use DB;

class PersonController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
    $people = Person::orderBy('last','asc')->paginate(10); // Collect from database, 10 at a time sorted alphabetically
    return view('people.index', compact('people')); // Send it to the view
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
    $person = new Person; // New model
    $places = Place::pluck('name', 'id'); // Grab the places
    return view('people.create', compact('person','places')); // Send it to the view
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/

public function store(Request $request)
{
    $this->validate($request, array(
        'first' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'places' => 'array',
        ));
    $person = new Person($request->except(['places','image'])); // Grab the request
    $person->name = $request->first . ' ' . $request->last; // Set the person name
    if($request->hasFile('image')){ // If an image is attached
        $image = $request->file('image'); // Get the imae
        $filename = time() . '.' . $image->getClientOriginalExtension(); // Randomize filename
        Image::make($image)->resize(160, 160)->save( public_path() . '../../storage/app/people/'. $filename ); // Save the file
        $person->image = $filename; // Set the filename in database
    };
    $person->save(); // Save the item
    $places = $request->input('places', []); // Get associated places
    $person->places()->sync($places); // Save associated places
    return redirect()->route('people.index') // Send it to the view
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
    $person = Person::find($id); // Grab the item
    return view('people.show', compact('person')); // Send it to the view
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
    $person = Person::find($id); // Find the item
    $places = Place::pluck('name', 'id')->toArray(); // Grab from the database
    $selected = $person->places->pluck('id')->toArray(); // Grab the already associated places
    return view('people.edit', compact('person', 'places','selected')); // Send it to the view
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
    $this->validate($request, array(
        'first' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'places' => 'array',
        )
    );
    $person = Person::find($id);
    $person->first = $request->first;
    $person->last = $request->last;
    $person->name = $request->first . ' ' . $request->last;
    $person->status = $request->status;
    $person->type = $request->type;
    $person->category = $request->category;
    $person->note = $request->note;
    if(isset($request->delete)) { // If delete checkbox is checked
        if(!empty($person->image)) { // And there is an image file to delete
                $file_path = public_path() . '../../storage/app/people/'. $person->image; // Set path to image
                unlink($file_path); // Delete existing image
                $person->image = NULL; // Delete db link
            }
    } else { // If delete is not checked, check if we need to process images
        if($request->hasFile('image')){ // If an image is attached
            if(empty($person->image)) { // And there currently is no image assigned
                $image = $request->file('image'); // Grab image file
                $filename = time() . '.' . $image->getClientOriginalExtension(); // Randomize filename
                //Image::make($image)->resize(160, 160)->save( public_path() . '\\media\\people\\'. $filename ); // Save the file
                Image::make($image)->resize(160, 160)->save( public_path() . '../../storage/app/people/'. $filename ); // Save the file
                $person->image = $filename; // Save filename in db
            } else { // If already has an image
                $file_path = public_path() . '../../storage/app/people/'. $person->image; // Set path to image
                unlink($file_path); // Delete existing image
                $image = $request->file('image'); // Set path
                $filename = time() . '.' . $image->getClientOriginalExtension(); // Randomize filename
                Image::make($image)->resize(160, 160)->save( public_path() . '../../storage/app/people/'. $filename ); // Save new file
                $person->image = $filename; // Save new filename in db
            }
        }
    }
    $person->phone = $request->phone;
    $person->alt = $request->alt;
    $person->email = $request->email;
    $person->web = $request->web;
    $person->title = $request->title;
    $person->prefix = $request->prefix;
    $person->category = $request->category;
    $person->refer = $request->refer;
    $person->account = $request->account;
    $person->update(); // Save Changes
    $places = $request->input('places', []); // Grab associated places
    $person->places()->sync($places); // Save associated places
    return redirect()->route('people.index') // Send to the view
    ->with('success','Person updated successfully');
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
    Person::find($id)->delete(); // Delete that id
    return redirect()->route('people.index') // Send to the view
    ->with('success','Person deleted successfully');
}
}