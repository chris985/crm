<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Fillable fields
    public $fillable = ['name','status','type','category','note','date','due','priority','parent','people','places'];

    // Define default states for database, TODO: Config or database table
    public $task_status = ['Closed', 'Open', 'In Progress', 'Hold', 'Waiting', 'Scheduled'];
    public $task_type = ['Task', 'Project', 'Event', 'Reminder'];

    // Each task can belong to one person
    public function people()
    {
        return $this->belongsToMany('App\Person');
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