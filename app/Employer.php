<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = 'employer_t';
    protected $primaryKey = 'EMPLOYER_ID';
    public $timestamps = false;

    // public function joborder(){
    // 	return $this->belongsto('App\JobOrder')
    // }
    public function country(){
    	return $this->belongsto('App\Country','COUNTRY_ID');
    }
}
