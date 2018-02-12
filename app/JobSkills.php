<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobSkills extends Model
{
    protected $table = 'jobskills_t'; 
    public $timestamps = false;

    public function joborder() {
    	return $this->belongsTo('App\JobOrder', 'JORDER_ID');
    }

    public function genskills() {
    	return $this->hasMany('App\GenSkills', 'SKILL_ID');
    }
}
