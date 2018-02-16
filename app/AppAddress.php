<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppAddress extends Model
{
    protected $table = 'appaddress_t'; 
    public $timestamps = false; 

    public function app(){
    	return $this->belongsTo('App\App','APP_ID');
    }
}
