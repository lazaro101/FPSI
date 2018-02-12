<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = 'employer_t';
    protected $primaryKey = 'EMPLOYER_ID';
    public $timestamps = false;

    public function country(){
    	return $this->belongsto('App\Country','COUNTRY_ID');
    }

    public function joborder(){
    	return $this->hasMany('App\JobOrder','EMPLOYER_ID');
    }
}
