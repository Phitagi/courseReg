<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
use App\Models\Course;

class Registration extends \Eloquent
{
    use HasFactory;

   public function student(){
		return $this->belongsTo('Student');
    }

    public function course(){
		return $this->belongsTo('Course');
	}
}
