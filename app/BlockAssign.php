<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockAssign extends Model
{
    public function adviser()
    {
    	return $this->belongsTo('App\User', 'co_admin', 'id');
    }

    public function blockname()
    {
    	return $this->belongsTo('App\ClassBlock', 'block', 'id');
    }

    public function leveltitle()
    {
    	return $this->belongsTo('App\GradeLevel', 'level', 'id');
    }
}
