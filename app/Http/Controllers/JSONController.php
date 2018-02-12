<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banks;
use App\BanksAllowed;
use App\Country;
use App\CountryReqs;
use App\Currency;
use App\Employer;
use App\FeeType;
use App\GenFees;
use App\GenReqs;
use App\GenSkills;
use App\Job;
use App\JobCategory;
use App\JobDocs;
use App\JobFees;
use App\JobOrder;
use App\JobSkills;
use App\JobType;
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
    	$skill = GenSkills::where('SKILLTYPE', 'Specific')->get();

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
