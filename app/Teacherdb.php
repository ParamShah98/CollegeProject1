<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacherdb extends Model
{
    protected $fillable = array('email','teacher_code','department','college');
}
