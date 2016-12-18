<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    public function admintype ()
    {
    	return $this->hasOne('App\Admintype');
    }
}
