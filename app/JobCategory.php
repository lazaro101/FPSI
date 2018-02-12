<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    protected $table = 'jobcategory_t';
    protected $primaryKey = 'CATEGORY_ID';
    public $timestamps = false;

    public function job() {
    	return $this->hasMany('App\Job', 'CATEGORY_ID');
    }
    public function joborder() {
    	return $this->hasMany('App\JobOrder', 'CATEGORY_ID');
    }
}
