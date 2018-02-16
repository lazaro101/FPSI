<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppPersonal extends Model
{
    protected $table = 'apppersonal_t'; 
    public $timestamps = false; 

    public function app(){
    	return $this->belongsTo('App\App','APP_ID');
    }
}
