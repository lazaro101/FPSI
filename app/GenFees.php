<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 

class GenFees extends Model
{ 
    protected $table = 'genfees_t';
    protected $primaryKey = 'FEE_ID';
    public $timestamps = false; 

    public function feetype() {
    	return $this->hasMany('App\FeeType', 'FEE_ID');
    }

    public function jobfees() {
    	return $this->hasMany('App\JobFees', 'FEE_ID');
    }

}
