<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BanksAllowed extends Model
{
    protected $table = 'banksallowed_t';
    public $timestamps = false;

    public function banks(){
    	return $this->belongsTo('App\Banks','BANK_ID');
    }
    
}
