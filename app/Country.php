<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country_t';
    protected $primaryKey = 'COUNTRY_ID';
    public $timestamps = false;

    // public function employer(){
    // 	return $this->belongsTo('App\Employer');
    // }
    public function currency(){
    	return $this->belongsTo('App\Currency','COUNTRY_ID');
    }
}
