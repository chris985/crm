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
    $places = Place::orderBy('name','asc')->paginate(10);
    return view('places.index', compact('places'));
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
    $place = new Place;
    $parents = Place::select(['name', 'id'])->get();

    return view('places.create', compact('place','parents'));
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
        'name' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));

    $place  = new Place;
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

    if($request->hasFile('image')){
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(160, 160)->save( public_path() . '\\media\\places\\'. $filename );
        $place->image = $filename;
        $place->save();
    };

    $people = $request->people;
    $place->save();
    $place->people()->attach($people);

    return redirect()->route('places.index')
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
    $place = Place::find($id);
    return view('places.show', compact('place'));
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
    $place = Place::find($id);
    $parents = Place::select(['name', 'id'])->get();
    return view('places.edit', compact('place', 'parents'));
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
        'name' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));

    $place  = Place::find($id);
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
    
    if($request->hasFile('image')){
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(160, 160)->save( public_path() . '\\media\\places\\'. $filename );
        $place->image = $filename;
        $place->update();
    };

    $place->update();

    return redirect()->route('places.index')
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
    Place::find($id)->delete();
    return redirect()->route('places.index')
    ->with('success','Place deleted successfully');
}
}