<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOrder extends Model
{
    protected $table = 'joborder_t';
    protected $primaryKey = 'JORDER_ID';
    public $timestamps = false;

    public function jobfees() {
    	return $this->hasMany('App\JobFees', 'JORDER_ID');
    }
    public function jobskills() {
    	return $this->hasMany('App\JobSkills', 'JORDER_ID');
    }
    public function jobdocs() {
    	return $this->hasMany('App\JobDocs', 'JORDER_ID');
    }
}
