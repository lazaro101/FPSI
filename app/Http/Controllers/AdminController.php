<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
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
    	foreach ($req->req as $val) {
    		DB::table('countryreqs_t')->insert([
    			'COUNTRY_ID' => $cid,
    			'REQ_ID' => $val
    		]);
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
    	$cur = DB::table('currency_t')->where('status',0)->get();
    	return view('maintenance.currency',['cur' => $cur]);
    }
    public function addCurrency(Request $req){
    	DB::table('currency_t')->insert([
    		'CURRENCYNAME' => $req->currency,
    		'SYMBOL' => $req->symbol,
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
        return view('maintenance.fees');
    }

    public function TransactionsEmployer(){
        return view('transactions.employer');
    }

    public function TransactionsJobOrder(){
        return view('transactions.joborder');
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
