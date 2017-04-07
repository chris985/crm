<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{

/**
* Show the application layout.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
    return view('common.search'); // Return the search page
}

/**
* Show the application dataAjax.
*
* @return \Illuminate\Http\Response
*/
public function autocomplete(Request $request)
{
    $data = []; // Clear out query
    if($request->has('q')){ // If there is a new query
        $search = $request->q; // Get the search term
        $data = DB::table("people") // Search the database
        ->select("id","name")
        ->where('name','LIKE',"%$search%")
        ->get();
    }
    return response()->json($data); // Return a JSON response
}
}