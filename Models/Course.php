<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Registration;
class Course extends \Eloquent
{
    use HasFactory;

    public function registrations(){
		return $this->hasMany('Registration');
    }

    public function students(){
		return $this->belongsTo('Student');
	}
}
