<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public $fillable = ['name','status','type','note','image','email','phone','alt','web','title','first','last','place_id','place'];

    public function places()
    {
        return $this->belongsToMany('App\Place');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

        
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
}