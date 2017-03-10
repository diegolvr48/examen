<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model {
	protected $fillable = array('employee_id','fecha_nacimiento','ingreso');
}
