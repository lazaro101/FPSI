<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppContact extends Model
{
    protected $table = 'appcontact_t'; 
    public $timestamps = false; 

    public function app(){
    	return $this->belongsTo('App\App','APP_ID');
    }
}
