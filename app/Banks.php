<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    protected $table = 'banks_t';
    protected $primaryKey = 'BANK_ID';
    public $timestamps = false;

    public function banksallowed(){
    	return $this->hasMany('App\BanksAllowed','BANK_ID');
    }
}
