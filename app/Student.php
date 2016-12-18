<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function user ()
    {
    	return $this->belongsTo('App\User');
    }
    public function feedback ()
    {
    	return $this->hasOne('App\Feedback');
    }
}
