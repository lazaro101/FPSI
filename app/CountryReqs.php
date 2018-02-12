<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryReqs extends Model
{
    protected $table = 'countryreqs_t';
    public $timestamps = false;

    public function country(){
    	return $this->belongsTo('App\Country','COUNTRY_ID');
    }

    public function genreqs(){
    	return $this->belongsTo('App\GenReqs','REQ_ID');
    }
    
    
}
