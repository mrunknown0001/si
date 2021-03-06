<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    public function student()
    {
    	return $this->belongsTo('App\User', 'student_id' , 'user_id')->orderBy('lastname');
    }

    public function grade()
    {
    	return $this->belongsTo('App\GradeLevel', 'grade_level', 'id');
    }

    public function block()
    {
    	return $this->belongsTo('App\ClassBlock', 'section', 'id');
    }

    public function data()
    {
        return $this->belongsTo('App\StudentData', 'student_id', 'student_id');
    }
    
}
