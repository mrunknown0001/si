<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function subject()
    {
    	return $this->belongsTo('App\Subject');
    }

    public function student()
    {
    	return $this->belongsTo('App\User','student_id', 'user_id');
    }
}
