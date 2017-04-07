<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Fillable fields
    public $fillable = ['name','status','type','category','note','date','due','priority','parent','people','places'];

    // Each task can belong to one person
    public function people()
    {
        return $this->belongsToMany('App\Person');
    }

    // Each task can belong to one place
    public function places()
    {
        return $this->belongsToMany('App\Place');
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
}