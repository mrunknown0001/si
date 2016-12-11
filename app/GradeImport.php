<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeImport extends Model
{
    public function subject()
    {
    	return $this->belongsTo('App\Subject', 'subject_id', 'id');
    }

    public function level()
    {
    	return $this->belongsTo('App\GradeLevel', 'grade_level_id', 'id');
    }

    public function block()
    {
    	return $this->belongsTo('App\ClassBlock', 'block_id', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
