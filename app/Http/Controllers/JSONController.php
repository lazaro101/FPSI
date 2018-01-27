<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobCategory;
use App\JobType;
use App\Skill;
use Response;

class JSONController extends Controller
{
    public function getJobCategoryAll() {
    	$jobcategory = JobCategory::get();

    	return Response::json($jobcategory);
    }

    public function getJobTypeAll() {
    	$jobtype = JobType::get();

    	return Response::json($jobtype);
    }

    public function getSkillSpecificAll() {
    	$skill = Skill::where('SKILLTYPE', 'Specific')->get();

    	return Response::json($skill);
    }
}
