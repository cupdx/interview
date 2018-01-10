<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
	
    public function gpa()
    {
        return $this->hasMany('App\Gpa');
    }

}
