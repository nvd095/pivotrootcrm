<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Role extends Model
{
    //set many-to-many relationship between user and roles 
    public function users(){
        $this->belongsToMany('App\User','user_roles'); //role_id is the foreign key here
    }
}
