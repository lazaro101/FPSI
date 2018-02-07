<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\GenFees;
use App\FeeType;
use App\JobType;
use App\JobCategory;
use App\Skill;
use App\Country;
use App\Employer;
use App\Currency;

use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('checklog');
    }

    public function Dashboard(){
    	return view('dashboard');
    }

    public function MaintenanceDocReq(){
    	$data = DB::table('genreqs_t')->where('status',0)->get();
    	return view('maintenance.docreq',['genreq' => $data]);
    }
    public function addDocreq(Request $req){
    	DB::table('genreqs_t')->insert([
    		'REQNAME' => $req->reqname,
    		'ALLOCATION' => $req->alloc,
    		'Description' => $req->desc
    	]);

    	return redirect('/Maintenance/DocumentaryRequirements');
    }
    public function getDocreq(Request $req){
    	$var = DB::table('genreqs_t')->where('REQ_ID',$req->id)->first();
    	return response()->json($var);
    }
    public function editDocreq(Request $req){
    	DB::table('genreqs_t')->where('REQ_ID',$req->id)->update([
    		'REQNAME' => $req->reqname,
    		'ALLOCATION' => $req->alloc,
    		'Description' => $req->desc
    	]);
    	return redirect('/Maintenance/DocumentaryRequirements');
    }
    public function delDocreq(Request $req){
    	DB::table('genreqs_t')->where('REQ_ID',$req->id)->update([
    		'status' => 1
    	]);
    	return redirect('/Maintenance/DocumentaryRequirements');
    }

    public function MaintenanceCountry(){
    	$req = DB::table('genreqs_t')->where('ALLOCATION','Country')->where('status',0)->get();
    	$cnt = DB::table('country_t as ct')->leftjoin('countryreqs_t as crt','crt.COUNTRY_ID','=','ct.COUNTRY_ID')->select(DB::raw('count(crt.COUNTRY_ID) as nor, ct.COUNTRY_ID, ct.COUNTRYNAME'))->groupby('COUNTRY_ID','COUNTRYNAME')->where('ct.status',0)->get();
    	// $cnt = DB::table('country_t as ct')->leftjoin('countryreqs_t as crt','crt.COUNTRY_ID','=','ct.COUNTRY_ID')->leftjoin('genreqs_t as gt','gt.REQ_ID','=','crt.REQ_ID')->select(DB::raw('count(case when gt.status = 0 then 1 else null end) as nor, ct.COUNTRY_ID, ct.COUNTRYNAME'))->groupby('COUNTRY_ID','COUNTRYNAME')->where('ct.status',0)->get();
    	return view('maintenance.country',['genreq' => $req, 'cnt' => $cnt]);
    }
    public function addCountry(Request $req){
    	$cid = DB::table('country_t')->insertGetId([
    		'COUNTRYNAME' => $req->countryname
    	]);
        if (isset($req->req)) {
            foreach ($req->req as $val) {
                DB::table('countryreqs_t')->insert([
                    'COUNTRY_ID' => $cid,
                    'REQ_ID' => $val
                ]);
            }
        }
    	return redirect('/Maintenance/Country');
    }
    public function getCountry(Request $req){
    	$var = DB::table('country_t')->where('COUNTRY_ID',$req->id)->first();
    	$var1 = DB::table('countryreqs_t')->where('COUNTRY_ID',$req->id)->get();
    	return response()->json([$var,$var1]);
    }
    public function editCountry(Request $req){
    	DB::table('country_t')->where('COUNTRY_ID',$req->id)->update([
    		'COUNTRYNAME' => $req->countryname
    	]);
    	DB::table('countryreqs_t')->where('COUNTRY_ID',$req->id)->delete();
    	if (isset($req->req)) {
	    	foreach ($req->req as $val) {
	    		DB::table('countryreqs_t')->insert([
	    			'COUNTRY_ID' => $req->id,
	    			'REQ_ID' => $val
	    		]);
	    	}
    	}
    	return redirect('/Maintenance/Country');
    }
    public function delCountry(Request $req){
    	DB::table('country_t')->where('COUNTRY_ID',$req->id)->update([
    		'status' => 1
    	]);
    	return redirect('/Maintenance/Country');
    }

    public function MaintenanceCurrency(){
    	$cur = DB::table('currency_t as c')->where('c.status',0)->join('country_t as ct','ct.COUNTRY_ID','=','c.COUNTRY_ID')->get();
        $cty = DB::table('country_t')->where('status',0)->get();
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
    		'SYMBOL' => $req->symbol
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
    	$country = DB::table('country_t')->where('status',0)->get();
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

    public function TransactionsEmployer(){
        $empyr = Employer::where('status',0)->get();
        $cty = Country::where('status',0)->get();
        return view('transactions.employer',compact('empyr','cty'));
    }
    public function addEmployer(Request $req){
        Employer::insert([
            'EMPLOYERNAME' => $req->empname,
            'LNAME' => $req->lname,
            'FNAME' => $req->fname,
            'MNAME' => $req->mname,
            'EMAIL' => $req->compemadd,
            'CONTACT' => $req->cnum,
            'LANDLINE' => $req->lnum,
            'COMPANYADD' => $req->compadd,
            // 'EMPSTATUS' => $req->,
            // 'REASONS' => $req->,
            // 'TDATE' => $req->,
            'COUNTRY_ID' => $req->cname,
        ]);
        return redirect('/Transactions/Employer');
    }
    public function getEmployer(Request $req){
        $var = Employer::where('EMPLOYER_ID',$req->id)->first();
        return response()->json($var);
    }
    public function editEmployer(Request $req){
        Employer::where('EMPLOYER_ID',$req->id)->update([
            'EMPLOYERNAME' => $req->empname,
            'LNAME' => $req->lname,
            'FNAME' => $req->fname,
            'MNAME' => $req->mname,
            'EMAIL' => $req->compemadd,
            'CONTACT' => $req->cnum,
            'LANDLINE' => $req->lnum,
            'COMPANYADD' => $req->compadd,
            // 'EMPSTATUS' => $req->,
            // 'REASONS' => $req->,
            // 'TDATE' => $req->,
            'COUNTRY_ID' => $req->cname,
        ]);
        return redirect('/Transactions/Employer');
    }
    public function delEmployer(Request $req){
        Employer::where('EMPLOYER_ID',$req->id)->update([
            'status' => 1,
            'TDATE' => date_format(date_create('now'),"Y-m-d"),
            'REASONS' => $req->reason,
        ]);
        return redirect('/Transactions/Employer');
    }

    public function TransactionsJobOrder(){
        // $skills = Skill::where('status',0)->get();
        $emplyr = Employer::where('status',0)->get();
        $jobs = Job::where('status',0)->get();
        $jobcat = JobCategory::where('status',0)->get();
        $docreq = DB::table('genreqs_t')->where('status',0)->where('ALLOCATION','Job')->get();
        return view('transactions.joborder',compact('emplyr','jobs','jobcat','docreq'));
    }
    public function getAllSkills(){
        $skill = Skill::where('status',0)->where('SKILLTYPE','Specific')->get();
        return response()->json($skill);
    }
    // public function getAllReq(){
    //     $req = DB::table('genreqs_t')->where('status',1)->get();
    //     return response()->json($req);
    // }
    public function getFeeJob(Request $req){
        // $fees = GenFees::where('status',0)->get();
        $jtid = Job::where('JOB_ID',$req->jobid)->first();
        $fees = FeeType::where('JOBTYPE_ID',$jtid->JOBTYPE_ID)->get(); 
        
        die();
        return response()->json($fees);
    }
    public function getSymbol(Request $req){
        $var = Employer::where('EMPLOYER_ID',$req->emplid)->first();
        $var1 = $var->country->COUNTRY_ID;
        $cur = Currency::where('COUNTRY_ID',$var1)->first();
        return response()->json($cur->SYMBOL);
    }
    public function getJob(Request $req){
        $var = Job::where('CATEGORY_ID',$req->ctgryid)->get();
        return response()->json($var);
    }

    public function TransactionsApplicantMatching(){
        return view('transactions.applicantmatching');
    }

    public function TransactionsInitialInterview(){
        return view('transactions.initialinterview');
    }

    public function TransactionsFinalInterview(){
        return view('transactions.finalinterview');
    }

    public function TransactionsDocumentsCollection(){
        return view('transactions.documentscollection');
    }
}
