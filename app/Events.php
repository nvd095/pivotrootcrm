<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Events extends Model
{
    //set many-to-many relationship between user and roles 
    public function usersEvent(){
        $this->belongsToMany('App\User','manage_events'); //role_id is the foreign key here
    }
}
