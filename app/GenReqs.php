<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenReqs extends Model
{
    protected $table = 'genreqs_t';
    protected $primaryKey = 'REQ_ID';
    public $timestamps = false; 

    public function countryreqs() {
    	return $this->hasMany('App\CountryReqs', 'REQ_ID');
    }

    public function jobdocs() {
    	return $this->hasMany('App\JobDocs', 'REQ_ID');
    }
}
