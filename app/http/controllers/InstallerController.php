<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Storage;

class InstallerController extends Controller
{

/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
    $exists = Storage::disk('local')->exists('/installer/installed.txt');
    if($exists) {
        return view('common.updater')->with('success','Loading Updater'); // Load updater
    } else {
        return view('common.installer')->with('success','Loading Installer'); // Load installer
    };
}

public function install(Request $request)
{
    // Installer
    if($request->seed) {
        dd('checked');
        $exe = Artisan::call('migrate:refresh', [
            '--force --seed' => true]);
    } else {
        dd('not checked');
        $exe = Artisan::call('migrate', [
            '--force' => true]);
    };

    DB::table('users')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->pass),
        ]);
}

public function update()
{
    // Updater
}
}