<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentData extends Model
{
    
    public function student()
    {
    	return $this->belongsTo('App\Users', 'user_id', 'student_id');
    }
}
