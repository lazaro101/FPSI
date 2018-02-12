<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecificSkill extends Model
{
    protected $table = 'specskills_t';
    public $timestamps = false;

    public function job() {
    	return $this->belongsTo('App\Job', 'Job_id');
    }

    public function skill() {
    	return $this->belongsTo('App\GenSkills', 'Skill_id');
    }
}
