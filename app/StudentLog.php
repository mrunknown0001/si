<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentLog extends Model
{
    
    public function student()
    {
    	return $this->belongsTo('App\Users', 'student', 'id');
    }
}
