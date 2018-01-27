<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;
use App\JobCategory;
use App\JobType;
use App\Skill;
use Response;

class MaintenanceController extends Controller
{
    public function postJob(Request $request) {
    	die($request->jobname);
    }
}
