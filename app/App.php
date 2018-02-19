<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{ 
    protected $table = 'app_t';
    protected $primaryKey = 'APP_ID';
    public $timestamps = false; 

    public function appchildren() {
    	return $this->hasMany('App\AppChildren', 'APP_ID');
    }
    public function appschool() {
    	return $this->hasMany('App\AppSchool', 'APP_ID');
    }
    public function appcontact() {
    	return $this->hasMany('App\AppContact', 'APP_ID');
    }
    public function apppersonal() {
    	return $this->hasMany('App\AppPersonal', 'APP_ID');
    }
    public function appskills() {
    	return $this->hasMany('App\AppSkills', 'APP_ID');
    }
    public function appworkex() {
    	return $this->hasMany('App\AppWorkEx', 'APP_ID');
    }
    public function appaddress() {
    	return $this->hasMany('App\AppAddress', 'APP_ID');
    }
}
