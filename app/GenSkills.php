<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenSkills extends Model
{
    protected $table = 'genskills_t';
    protected $primaryKey = 'SKILL_ID';
    public $timestamps = false;

    public function specificskill() {
    	return $this->hasMany('App\SpecificSkill', 'SKILL_ID');
    }

    public function jobskills() {
    	return $this->hasMany('App\JobSkills', 'SKILL_ID');
    }

    public function appskills(){
    	return $this->hasMany('App\AppSkills','SKILL_ID');
    }
}
