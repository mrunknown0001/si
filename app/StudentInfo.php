<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    public function student()
    {
    	return $this->belongsTo('App\User', 'student_id' , 'user_id')->orderBy('lastname');
    }
    
}
