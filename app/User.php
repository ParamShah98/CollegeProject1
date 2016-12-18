<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','designation',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function student ()
    {
        return $this->hasOne('App\Student');
    }
    public function teacher ()
    {
        return $this->hasOne('App\Teacher');
    }
    public function admin ()
    {
        return $this->hasOne('App\Admin');
    }
}
