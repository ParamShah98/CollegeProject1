<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentdb extends Model
{
    protected $fillable = array('email','student_code','department','college');
}
