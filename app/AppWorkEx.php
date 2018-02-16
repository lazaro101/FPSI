<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppWorkEx extends Model
{
    protected $table = 'appworkex_t'; 
    public $timestamps = false; 

    public function app(){
    	return $this->belongsTo('App\App','APP_ID');
    }
}
