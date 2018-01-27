<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $table = 'jobtype_t';
    protected $primaryKey = 'JOBTYPE_ID';

    public function job() {
    	return $this->hasMany('App\Job', 'CATEGORY_ID');
    }
}
