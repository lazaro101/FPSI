<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeType extends Model
{
	protected $table = 'feetype_t';
    public $timestamps = false;

    public function genfees() {
    	return $this->belongsTo('App\GenFees', 'FEE_ID');
    }

    public function feetype(){
    	return $this->belongsTo('App\JobType', 'JOBTYPE_ID');
    }
}
