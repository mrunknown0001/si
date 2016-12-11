<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectAssign extends Model
{
    public function subject()
    {
    	return $this->belongsTo('App\Subject');
    }

    public function block()
    {
    	return $this->belongsTo('App\ClassBlock');
    }

    public function level()
    {
    	return $this->belongsTo('App\GradeLevel');
    }
}
