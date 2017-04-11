<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
	// Fillable fields
	public $fillable = ['name','status','type','category','note','image','phone','alt','email','web','title','address','address2','city','state','zip','country','fax','account','parent','refer','people','person_id'];

	// Define default states for database, TODO: Config or database table
	public $place_status = ['Inactive', 'Active'];
	public $place_type = ['Locale', 'Company', 'Lead', 'Partner', 'Vendor', 'Competitor', 'Not-A-Fit'];

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

	// Switch type
	public function getRealTypeAttribute($value) {
		$real_type = $this->attributes['type'];
		switch($real_type){
			case 0:
			return 'Locale';
			break;
			case 1:
			return 'Company';
			break;
			case 2:
			return 'Lead';
			break;
			case 3:
			return 'Partner';
			break;
			case 4:
			return 'Vendor';
			break;
			case 5:
			return 'Competitor';
			break;
			case 6:
			return 'Not-A-Fit';
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