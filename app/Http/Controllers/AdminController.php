<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    		'ALLOCATION' => $req->allo,
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
    		'CURRENCY' => $req->currency,
    		'SYMBOL' => $req->symbol,
    	]);
    	return redirect('/Maintenance/Currency');
    }
    public function getCurrency(Request $req){
    	$var = DB::table('currency_t')->where('CUR_ID',$req->id)->first();
    	return response()->json($var);
    }
    public function editCurrency(Request $req){
    	DB::table('currency_t')->where('CUR_ID',$req->id)->update([
    		'CURRENCY' => $req->currency,
    		'SYMBOL' => $req->symbol
    	]);
    	return redirect('/Maintenance/Currency');
    }
    public function delCurrency(Request $req){
    	DB::table('currency_t')->where('CUR_ID',$req->id)->update([ 'status' => 1 ]);
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
}
