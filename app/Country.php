<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country_t';
    protected $primaryKey = 'COUNTRY_ID';
    public $timestamps = false;

    public function employer(){
    	return $this->hasMany('App\Employer','COUNTRY_ID');
    }
     
    public function currency(){
    	return $this->hasMany('App\Currency','COUNTRY_ID');
    }
    
    public function countryreqs(){
    	return $this->hasMany('App\CountryReqs','COUNTRY_ID');
    }

}
