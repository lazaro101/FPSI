<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currency_t';
    protected $primaryKey = 'CURRENCY_ID';
    public $timestamps = false;

    public function country(){
    	return $this->belongsTo('App\Country','COUNTRY_ID');
    }
}
