<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	// Fillable fields
	public $fillable = ['name','status','type','category','note','image','phone','alt','email','web','title','refer','first','last','prefix','suffix','account','place_id','place'];

	// Define default states for database, TODO: Config or database table
	public $person_status = ['Inactive', 'Active'];
	public $person_type = ['Unspecified', 'Contact', 'Client', 'Prospect', 'Partner', 'Vendor', 'Competitor', 'Not-A-Fit'];
	
    // Each person can be at many places
	public function places()
	{
		return $this->belongsToMany('App\Place');
	}

    //  Each person can have many tasks, but each task can only belong to one person
	public function tasks()
	{
		return $this->hasMany('App\Task');
	}

    // Switch Status
	public function getRealStatusAttribute($value) {
		$real_status = $this->attributes['status'];
		switch($real_status){
			case 0:
			return 'Inactive';
			break;
			case 1:
			return 'Active';
			break;
		}
	}

	// Switch Type
	public function getRealTypeAttribute($value) {
		$real_type = $this->attributes['type'];
		switch($real_type){
			case 0:
			return 'Unspecified';
			break;
			case 1:
			return 'Contact';
			break;
			case 2:
			return 'Client';
			break;
			case 3:
			return 'Prospect';
			break;
			case 4:
			return 'Partner';
			break;
			case 5:
			return 'Vendor';
			break;
			case 6:
			return 'Competitor';
			break;
			case 7:
			return 'Not-A-Fit';
			break;
		}
	}
}