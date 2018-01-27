<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecificSkill extends Model
{
    protected $table = 'specskills_t';

    public function job() {
    	return $this->belongsTo('App\Job', 'Job_id');
    }

    public function skill() {
    	return $this->belongsTo('App\Skill', 'Skill_id');
    }
}
