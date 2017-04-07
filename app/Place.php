<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
	// Fillable fields
	public $fillable = ['name','status','type','note','image','phone','alt','email','web','title','address','address2','city','state','zip','country','fax','account','parent','people','person_id'];

	// Can have one parent 
    public function parent()
    {
        return $this->belongsTo('App\Place', 'parent');
    }

    // Can have many children
    public function children()
    {
        return $this->hasMany('App\Place', 'parent');
    }

	// A place can belong to many people
    public function people()
    {
        return $this->belongsToMany('App\Person');
    }

    // A place can have many tasks, but a task can only belong to place
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
    
    // Switch status
	public function getStatusAttribute($value) {
		$status = $this->attributes['status'];
		switch($status){
			case 0:
			return 'Inactive';
			break;
			case 1:
			return 'Active';
			break;
		}
	}

	// Switch type
	public function getTypeAttribute($value) {
		$type = $this->attributes['type'];
		switch($type){
			case 0:
			return 'Not-A-Fit';
			break;
			case 1:
			return 'Unspecified';
			break;
			case 2:
			return 'Contact';
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
		}
	}

	// Switch country
	public function getCountryAttribute($value) {
		$country = $this->attributes['country'];
		switch($country){
			case 124:
			return 'Canada';
			break;
			case 840:
			return 'United States';
			break;
		}
	}
}