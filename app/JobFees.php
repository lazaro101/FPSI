<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobFees extends Model
{
    protected $table = 'jobfees_t'; 
    public $timestamps = false;

    public function joborder() {
    	return $this->belongsTo('App\JobOrder', 'JORDER_ID');
    }

    public function genfees() {
    	return $this->belongsTo('App\GenFees', 'FEE_ID');
    }
}
