<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    protected $table = 'genfees_t';
    protected $primaryKey = 'FEE_ID';
    public $timestamps = false;

    public function jobtype() {
    	return $this->hasMany('App\FeeType', 'FEE_ID');
    }

}
