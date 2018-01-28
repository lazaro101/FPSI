<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobCategory;
use App\JobType;
use App\Skill;
use App\Job;
use App\SpecificSkill;
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


    public function getJobOne(Request $request) {
        $job = Job::find($request->job);

        return Response::json($job);
    }

    public function getSpecificSkillOne(Request $request) {
        $specificskill = SpecificSkill::where('Job_id', $request->specificskill)->get();

        return Response::json($specificskill);
    }
}
