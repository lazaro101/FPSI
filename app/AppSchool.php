<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppSchool extends Model
{
    protected $table = 'appschool_t'; 
    public $timestamps = false; 

    public function app(){
    	return $this->belongsTo('App\App','APP_ID');
    }
}
