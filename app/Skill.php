<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'genskills_t';
    protected $primaryKey = 'SKILL_ID';

    public function specificskill() {
    	return $this->hasMany('App\SpecificSkill', 'Skill_id');
    }
}
