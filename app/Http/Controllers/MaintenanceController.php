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
use DB;
use Response;

class MaintenanceController extends Controller
{
    public function __construct()
    { 
        $this->middleware('checklog');
    }

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
		    		$skill = GenSkills::find($data);
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
		    		$skill = GenSkills::find($data);
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

    
    public function MaintenanceDocReq(){
    	$data = GenReqs::where('status',0)->get();
    	return view('maintenance.docreq',['genreq' => $data]);
    }
    public function addDocreq(Request $req){
    	GenReqs::insert([
    		'REQNAME' => $req->reqname,
    		'ALLOCATION' => $req->alloc,
    		'Description' => $req->desc
    	]);

    	return redirect('/Maintenance/DocumentaryRequirements');
    }
    public function getDocreq(Request $req){
    	$var = GenReqs::where('REQ_ID',$req->id)->first();
    	return response()->json($var);
    }
    public function editDocreq(Request $req){
    	GenReqs::where('REQ_ID',$req->id)->update([
    		'REQNAME' => $req->reqname,
    		'ALLOCATION' => $req->alloc,
    		'Description' => $req->desc
    	]);
    	return redirect('/Maintenance/DocumentaryRequirements');
    }
    public function delDocreq(Request $req){
    	GenReqs::where('REQ_ID',$req->id)->update([
    		'status' => 1
    	]);
    	return redirect('/Maintenance/DocumentaryRequirements');
    }

    public function MaintenanceCountry(){
    	$req = GenReqs::where('ALLOCATION','Country')->where('status',0)->get();
    	$cnt = DB::table('country_t as ct')->leftjoin('countryreqs_t as crt','crt.COUNTRY_ID','=','ct.COUNTRY_ID')->select(DB::raw('count(crt.COUNTRY_ID) as nor, ct.COUNTRY_ID, ct.COUNTRYNAME'))->groupby('COUNTRY_ID','COUNTRYNAME')->where('ct.status',0)->get();
    	// $cnt = DB::table('country_t as ct')->leftjoin('countryreqs_t as crt','crt.COUNTRY_ID','=','ct.COUNTRY_ID')->leftjoin('genreqs_t as gt','gt.REQ_ID','=','crt.REQ_ID')->select(DB::raw('count(case when gt.status = 0 then 1 else null end) as nor, ct.COUNTRY_ID, ct.COUNTRYNAME'))->groupby('COUNTRY_ID','COUNTRYNAME')->where('ct.status',0)->get();
    	return view('maintenance.country',['genreq' => $req, 'cnt' => $cnt]);
    }
    public function addCountry(Request $req){
    	$cid = Country::insertGetId([
    		'COUNTRYNAME' => $req->countryname
    	]);
        if (isset($req->req)) {
            foreach ($req->req as $val) {
                CountryReqs::insert([
                    'COUNTRY_ID' => $cid,
                    'REQ_ID' => $val
                ]);
            }
        }
    	return redirect('/Maintenance/Country');
    }
    public function getCountry(Request $req){
    	$var = Country::where('COUNTRY_ID',$req->id)->first();
    	$var1 = CountryReqs::where('COUNTRY_ID',$req->id)->get();
    	return response()->json([$var,$var1]);
    }
    public function editCountry(Request $req){
    	Country::where('COUNTRY_ID',$req->id)->update([
    		'COUNTRYNAME' => $req->countryname
    	]);
    	CountryReqs::where('COUNTRY_ID',$req->id)->delete();
    	if (isset($req->req)) {
	    	foreach ($req->req as $val) {
	    		CountryReqs::insert([
	    			'COUNTRY_ID' => $req->id,
	    			'REQ_ID' => $val
	    		]);
	    	}
    	}
    	return redirect('/Maintenance/Country');
    }
    public function delCountry(Request $req){
    	Country::where('COUNTRY_ID',$req->id)->update([
    		'status' => 1
    	]);
    	return redirect('/Maintenance/Country');
    }

    public function MaintenanceCurrency(){
    	$cur = DB::table('currency_t as c')->where('c.status',0)->join('country_t as ct','ct.COUNTRY_ID','=','c.COUNTRY_ID')->get();
        $cty = Country::where('status',0)->get();
    	return view('maintenance.currency',['cur' => $cur, 'cty' => $cty]);
    }
    public function addCurrency(Request $req){
    	DB::table('currency_t')->insert([
    		'CURRENCYNAME' => $req->currency,
            'SYMBOL' => $req->symbol,
    		'COUNTRY_ID' => $req->country,
    	]);
    	return redirect('/Maintenance/Currency');
    }
    public function getCurrency(Request $req){
    	$var = DB::table('currency_t')->where('CURRENCY_ID',$req->id)->first();
    	return response()->json($var);
    }
    public function editCurrency(Request $req){
    	DB::table('currency_t')->where('CURRENCY_ID',$req->id)->update([
    		'CURRENCYNAME' => $req->currency,
    		'SYMBOL' => $req->symbol,
            'COUNTRY_ID' => $req->country,
    	]);
    	return redirect('/Maintenance/Currency');
    }
    public function delCurrency(Request $req){
    	DB::table('currency_t')->where('CURRENCY_ID',$req->id)->update([ 'status' => 1 ]);
    	return redirect('/Maintenance/Currency');
    }

    public function MaintenanceBanks(){
    	$bank = DB::table('banks_t')->where('status',0)->get();
    	return view('maintenance.banks',['bank' => $bank]);
    }
    public function addBanks(Request $req){
    	DB::table('banks_t')->insert([
    		'BANKNAME' => $req->bankname
    	]);
    	return redirect('/Maintenance/Banks');
    }
    public function getBanks(Request $req){
    	$var = DB::table('banks_t')->where('BANK_ID',$req->id)->first();
    	return response()->json($var);
    }
    public function editBanks(Request $req){
    	DB::table('banks_t')->where('BANK_ID',$req->id)->update([ 'BANKNAME' => $req->bankname]);
    	return redirect('/Maintenance/Banks');
    }
    public function delBanks(Request $req){
    	DB::table('banks_t')->where('BANK_ID',$req->id)->update([ 'status' => 1]);
    	return redirect('/Maintenance/Banks');
    }

    public function MaintenanceAccBanks(){
    	$country = Country::where('status',0)->get();
    	$banks = DB::table('banks_t')->where('status',0)->get();
    	$accbanks = DB::table('banksallowed_t as bt')->join('country_t as ct','ct.COUNTRY_ID','=','bt.COUNTRY_ID')->select(DB::raw('count(ct.COUNTRY_ID) as bank, ct.COUNTRY_ID, ct.COUNTRYNAME'))->groupby('COUNTRYNAME','COUNTRY_ID')->get();
    	return view('maintenance.acceptedbanks',['cnt' => $country, 'bnk' => $banks, 'acbnk' => $accbanks]);
    }
    public function addAccBanks(Request $req){
    	foreach ($req->bank as $bnk) {
    		DB::table('banksallowed_t')->insert([
    			'COUNTRY_ID' => $req->country,
    			'BANK_ID' => $bnk
    		]);
    	}
    	return redirect('/Maintenance/AcceptedBanks');
    }

    public function getAccBanks(Request $req){
    	$var = DB::table('banksallowed_t')->where('COUNTRY_ID',$req->id)->get();
    	return response()->json($var);
    }
    public function editAccBanks(Request $req){

    }
    public function delAccBanks(Request $req){
    	DB::table('banksallowed_t')->where('COUNTRY_ID',$req->id)->delete();
    	return redirect('/Maintenance/AcceptedBanks');
    }

    public function MaintenanceJobCategory(){
        $jobcategory = DB::table('jobcategory_t')->where('status',0)->get();
        return view('maintenance.jobcategory',['jobcategory' => $jobcategory]);
    }
    public function addJobCategory(Request $req){
        DB::table('jobcategory_t')->insert([
            'CATEGORYNAME' => $req->categoryname
        ]);
        return redirect('/Maintenance/JobCategory');
    }
    public function getJobCategory(Request $req){
        $var = DB::table('jobcategory_t')->where('CATEGORY_ID',$req->id)->first();
        return response()->json($var);
    }
    public function editJobCategory(Request $req){
        DB::table('jobcategory_t')->where('CATEGORY_ID',$req->id)->update([ 'CATEGORYNAME' => $req->categoryname]);
        return redirect('/Maintenance/JobCategory');
    }
    public function delJobCategory(Request $req){
        DB::table('jobcategory_t')->where('CATEGORY_ID',$req->id)->update([ 'status' => 1]);
        return redirect('/Maintenance/JobCategory');
    }

    public function MaintenanceJobType(){
        $jobtype = DB::table('jobtype_t')->where('status',0)->get();
        return view('maintenance.jobtype',['jobtype' => $jobtype]);
    }
    public function addJobType(Request $req){
        DB::table('jobtype_t')->insert([
            'TYPENAME' => $req->typename
        ]);
        return redirect('/Maintenance/JobType');
    }
    public function getJobType(Request $req){
        $var = DB::table('jobtype_t')->where('JOBTYPE_ID',$req->id)->first();
        return response()->json($var);
    }
    public function editJobType(Request $req){
        DB::table('jobtype_t')->where('JOBTYPE_ID',$req->id)->update([ 'TYPENAME' => $req->typename]);
        return redirect('/Maintenance/JobType');
    }
    public function delJobType(Request $req){
        DB::table('jobtype_t')->where('JOBTYPE_ID',$req->id)->update([ 'status' => 1]);
        return redirect('/Maintenance/JobType');
    }

    public function MaintenanceJob(){
        $jobs = Job::get();
        return view('maintenance.job', compact('jobs'));
    }

    public function MaintenanceSkills(){
        $data = DB::table('genskills_t')->where('status',0)->get();
        return view('maintenance.skills',['genskills' => $data]);
    }
    public function addSkills(Request $req){
        DB::table('genskills_t')->insert([
            'SKILLNAME' => $req->skillname,
            'SKILLTYPE' => $req->skilltype,
        ]);

        return redirect('/Maintenance/Skills');
    }
    public function getSkills(Request $req){
        $var = DB::table('genskills_t')->where('SKILL_ID',$req->id)->first();
        return response()->json($var);
    }
    public function editSkills(Request $req){
        DB::table('genskills_t')->where('SKILL_ID',$req->id)->update([
            'SKILLNAME' => $req->skillname,
            'SKILLTYPE' => $req->skilltype,
        ]);
        return redirect('/Maintenance/Skills');
    }
    public function delSkills(Request $req){
        DB::table('genskills_t')->where('SKILL_ID',$req->id)->update([
            'status' => 1
        ]);
        return redirect('/Maintenance/Skills');
    }

    public function MaintenanceFees(){
        $fees = GenFees::where('status',0)->get();
        $jtype = JobType::where('status',0)->get();
        return view('maintenance.fees',compact('jtype','fees'));
    }
    public function addFees(Request $req){
        $fid = GenFees::insertGetId([
            'FEENAME' => $req->feename,
        ]);
        foreach ($req->jtype as $key => $value) {
            FeeType::insert([
                'FEE_ID' => $fid,
                'JOBTYPE_ID' => $value,
            ]);
        }

        return redirect('/Maintenance/Fees');
    }
    public function getFees(Request $req){
        $var = GenFees::find($req->id);
        $var1 = FeeType::where('FEE_ID',$req->id)->get();
        return response()->json([$var,$var1]);
    }
    public function editFees(Request $req){
        GenFees::where('FEE_ID',$req->id)->update([
            'FEENAME' => $req->feename,
        ]);
        FeeType::where('FEE_ID',$req->id)->delete();
        foreach ($req->jtype as $key => $value) {
            FeeType::insert([
                'FEE_ID' => $req->id,
                'JOBTYPE_ID' => $value,
            ]);
        }
        return redirect('/Maintenance/Fees');
    }
    public function delFees(Request $req){
        GenFees::where('FEE_ID',$req->id)->update([ 'status' => 1 ]);
        return redirect('/Maintenance/Fees');
    }

}
