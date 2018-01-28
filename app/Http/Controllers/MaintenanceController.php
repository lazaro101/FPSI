<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;
use App\JobCategory;
use App\JobType;
use App\Skill;
use App\SpecificSkill;
use Response;

class MaintenanceController extends Controller
{
    public function postJob(Request $request) {
    	if ($request->type == "new") {
    		$jobcategory = JobCategory::find($request->jobcategory);
	    	$jobtype = JobType::find($request->jobtype);
	    	$job = new Job();

	    	$job->JOBNAME = $request->jobname;
	    	$job->jobcategory()->associate($jobcategory);
	    	$job->jobtype()->associate($jobtype);
	    	$job->save();

	    	if ($request->skilllist != null) {
	    		foreach ($request->skilllist as $data) {
		    		$skill = Skill::find($data);
		    		$specificskill = new SpecificSkill;
		    		$specificskill->job()->associate($job);
		    		$specificskill->skill()->associate($skill);
		    		$specificskill->save();
		    	}
	    	}
    	} else {
    		$jobcategory = JobCategory::find($request->jobcategory);
	    	$jobtype = JobType::find($request->jobtype);
    		$job = Job::find($request->jobid);

    		$job->JOBNAME = $request->jobname;
	    	$job->jobcategory()->associate($jobcategory);
	    	$job->jobtype()->associate($jobtype);
	    	$job->save();

	    	SpecificSkill::where('Job_id', $request->jobid)->delete();
	    	if ($request->skilllist != null) {
	    		foreach ($request->skilllist as $data) {
		    		$skill = Skill::find($data);
		    		$specificskill = new SpecificSkill;
		    		$specificskill->job()->associate($job);
		    		$specificskill->skill()->associate($skill);
		    		$specificskill->save();
		    	}
	    	}
    	}

    	return Response::json($job);
    }

    public function postRemoveJob(Request $request) {
    	$job = Job::find($request->jobid)->delete();

    	return Response::json($job);
    }
}
