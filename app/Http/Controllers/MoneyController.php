<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Money;
use Intervention\Image\ImageServiceProvider;
use Illuminate\Support\Facades\Input;
use Image;

class MoneyController extends Controller
{

/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
    $money = Money::orderBy('name','asc')->paginate(10); // Collect from database, 10 at a time sorted alphabetically
    return view('money.index', compact('money')); // Send to the view
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
    $money = new Money; // Create a new model
    return view('money.create', compact('money')); // Send it to the view
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

    $money  = new Money; // New Model 
    $money->name = $request->name;
    $money->status = $request->status;
    $money->type = $request->type;
    $money->division = $request->division;
    $money->phone = $request->phone;
    $money->email = $request->email;
    $money->alt = $request->alt;
    $money->web = $request->web;
    $money->fax = $request->fax;
    $money->address = $request->address;
    $money->address2 = $request->address2;
    $money->city = $request->city;
    $money->state = $request->state;
    $money->zip = $request->zip;
    $money->country = $request->country;
    $money->note = $request->note;

    if($request->hasFile('image')){ // If there is an image
        $image = $request->file('image'); // Get the imaeg
        $filename = time() . '.' . $image->getClientOriginalExtension(); // Randomize the image filename
        Image::make($image)->resize(160, 160)->save( public_path() . '\\media\\money\\'. $filename ); // Save it to the folder
        $money->image = $filename; // Save to database
        $money->save(); // Save the image
    };

    $people = $request->people;
    $money->save();
    $money->people()->attach($people);

    return redirect()->route('money.index')
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
    $money = Money::find($id);
    return view('money.show', compact('money'));
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
    $money = Money::find($id);
    return view('money.edit', compact('money'));
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

    $money  = Money::find($id);
    $money->name = $request->name;
    $money->status = $request->status;
    $money->type = $request->type;
    $money->division = $request->division;
    $money->phone = $request->phone;
    $money->email = $request->email;
    $money->alt = $request->alt;
    $money->web = $request->web;
    $money->fax = $request->fax;
    $money->address = $request->address;
    $money->address2 = $request->address2;
    $money->city = $request->city;
    $money->state = $request->state;
    $money->zip = $request->zip;
    $money->country = $request->country;
    $money->note = $request->note;

    if($request->hasFile('image')){
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(160, 160)->save( public_path() . '\\media\\money\\'. $filename );
        $money->image = $filename;
        $money->update();
    };

    $money->update();

    return redirect()->route('money.index')
    ->with('success','Money updated successfully');
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
    Money::find($id)->delete();
    return redirect()->route('money.index')
    ->with('success','Money deleted successfully');
}
}