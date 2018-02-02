<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class GenFees extends Model
{
	// use SoftDeletes;
    protected $table = 'genfees_t';
    protected $primaryKey = 'FEE_ID';
    public $timestamps = false;
    // protected $dates = ['deleted_at'];

    public function jobtype() {
    	return $this->hasMany('App\FeeType', 'FEE_ID');
    }

}
