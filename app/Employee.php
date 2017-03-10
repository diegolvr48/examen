<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
	protected $fillable = array('nombre','apaterno','amaterno');

	public function salary()
    {
        return $this->hasOne('App\Salary');
    }
}
