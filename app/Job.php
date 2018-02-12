<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job_t';
    protected $primaryKey = 'JOB_ID';
    public $timestamps = false;

    public function jobcategory() {
    	return $this->belongsTo('App\JobCategory', 'CATEGORY_ID');
    }

    public function jobtype() {
    	return $this->belongsTo('App\JobType', 'JOBTYPE_ID');
    }

    public function specificskill() {
    	return $this->hasMany('App\SpecificSkill', 'Job_id');
    } 

    public function joborder() {
        return $this->hasMany('App\JobOrder', 'JOB_ID');
    }
}
