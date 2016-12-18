<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admintype extends Model
{
    public function admin ()
    {
        return $this->hasMany('App\Admin');
    }
    public function college ()
    {
    	return $this->belongsTo('App\College');
    }
}
