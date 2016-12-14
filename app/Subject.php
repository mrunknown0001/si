<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function level()
    {
    	return $this->belongsTo('App\GradeLevel');
    }
}
