<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppChildren extends Model
{
    protected $table = 'appchildren_t'; 
    public $timestamps = false; 

    public function app(){
    	return $this->belongsTo('App\App','APP_ID');
    }
}
