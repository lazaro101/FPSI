<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobDocs extends Model
{
    protected $table = 'jobdocs_t'; 
    public $timestamps = false;

    public function joborder() {
    	return $this->belongsTo('App\JobOrder', 'JORDER_ID');
    }

    public function genreqs() {
    	return $this->belongsTo('App\GenReqs', 'REQ_ID');
    }
}
