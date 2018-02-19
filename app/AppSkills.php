<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppSkills extends Model
{
    protected $table = 'appskills_t'; 
    public $timestamps = false; 

    public function app(){
    	return $this->belongsTo('App\App','APP_ID');
    }

    public function genskills(){
    	return $this->belongsTo('App\GenSkills','SKILL_ID');
    }
}
