<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $fillable = array('user_id', 'admintype_id');
    public function admintype ()
    {
        return $this->belongsTo('App\Admintype');
    }
    public function user ()
    {
    	return $this->belongsTo('App\User');
    }
}
