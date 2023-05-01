<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone' , 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','api_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role){
        if(is_string($role)){
            return $this->roles->contains('name',$role);
        }
        // return $this->roles;
        return $role->intersect($this->roles)->count();
    }

    public function isAdmin(){
        // dd($this->hasRole('فروشنده'));
        // $is_manager = $this->hasRole('manager');
        // dd($is_manager);
        // return ($this->level=='admin' ? true : false) && ($this->hasRole('manager'));
        return count($this->roles)>0 ? true : false; 
        // return false;
    }

    public function isManager(){
        return $this->level=='admin' ? true : false;
    }

}
