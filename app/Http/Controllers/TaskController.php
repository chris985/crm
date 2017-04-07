<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use App\Person;
use App\Place;
use Intervention\Image\ImageServiceProvider;
use Illuminate\Support\Facades\Input;
use Image;

class TaskController extends Controller
{

/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
    $tasks = Task::orderBy('created_at','desc')->paginate(10); // Grab all tasks, paginate by 10
    return view('tasks.index', compact('tasks')); // Return the view
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
    $task = new Task; // New model instance
    $people = Person::pluck('name', 'id'); // Get people
    $places = Place::pluck('name', 'id'); // Get places
    return view('tasks.create', compact('task','people','places')); // Return the view
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/

public function store(Request $request)
{
    $this->validate($request, array( // Validation
        'name' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));
    $task = new Task; // New model instance
    $task->name = $request->name;
    $task->status = $request->status;
    $task->type = $request->type;
    $task->note = $request->note;
    $task->save(); // Save the task
    $person = $request->people; // Get associated People
    $task->people()->attach($person); // Save associated People
    $place = $request->places; // Get associated Places
    $task->places()->attach($place); // Save associated places
    return redirect()->route('tasks.index') // Return the view
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
    $task = Task::find($id); // Find the task
    return view('tasks.show', compact('task')); // Return the view
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
    $task = Task::find($id); // Find the task
    return view('tasks.edit', compact('task')); // Return the view
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
    $place = Task::find($id);
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
    $place->update();
    return redirect()->route('tasks.index')
    ->with('success','Task updated successfully');
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
    Task::find($id)->delete(); // Delete the task
    return redirect()->route('tasks.index') // Return the view
    ->with('success','Task deleted successfully');
}
}