<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Events;
use DB;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    //set many-to-many relationship between user and roles 
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
    }
    
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
    
    
     //set many-to-many relationship between user and roles 
    public function events()
    {
        return $this->belongsToMany('App\Events', 'manage_events', 'user_id', 'event_id');
    }
    
    public function hasAnyEvent($events)
    {
        if (is_array($events)) {
            foreach ($events as $event) {
                if ($this->hasEvent($event)) {
                    return true;
                }
            }
        } else {
            if ($this->hasEvent($events)) {
                return true;
            }
        }
        return false;
    }
    
    public function hasEvent($event)
    {
        if ($this->events()->where('event_name', $event)->first()) {
            return true;
        }
        return false;
    }
    
    public static function userEvent($user_id)
    {
        //if ($this->events()->contains('user_id', $user_id)) {
           
        //    return $this->events()->contains('user_id', $user_id);
        //
        $data = DB::table('manage_users')->where('user_id', $user_id);
        return $data;
    }
    
   
}
