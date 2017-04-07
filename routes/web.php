<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { // Dashboard, Index, Home Route
	return view('index'); 
})->name('index')->middleware('auth');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout'); // Logout
Route::group(['middleware' => 'auth'], function() //Protected Routes
{
	Route::resource('people','PersonController'); //People
	Route::resource('places','PlaceController'); // Places
});
Route::resource('tasks','TaskController'); // Tasks
Route::resource('money','MoneyController'); // Money
Route::get('globalsearch', 'SearchController@index'); //Search Page
Route::get('globalsearch-autocomplete', 'SearchController@autocomplete'); // Search Queries
Auth::routes(); // Auth

Route::get('install', 'InstallerController@index');
Route::post('install', 'InstallerController@install');
Route::get('update', 'InstallerController@index');
Route::post('update', 'InstallerController@update');