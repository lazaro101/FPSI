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

    public function MaintenanceGeneralRequirements(){
    	$data = DB::table('genreqs_t')->get();
    	return view('maintenance.genreq',['genreq' => $data]);
    }
    public function addGenreq(Request $req){
    	DB::table('genreqs_t')->insert([
    		'REQNAME' => $req->reqname,
    		'ALLOCATION' => $req->alloc,
    		'Description' => $req->desc
    	]);

    	return redirect('/Maintenance/GeneralRequirements');
    }

    public function MaintenanceCountry(){
    	$req = DB::table('genreqs_t')->get();
    	$cnt = DB::table('country_t as ct')->get();
    	// die(); ->leftjoin('countryreqs_t as crt','crt.COUNTRY_ID','=','ct.COUNTRY_ID')
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

    public function MaintenanceCurrency(){
    	return view('maintenance.currency');
    }

    public function MaintenanceBanks(){
    	$bank = DB::table('banks_t')->get();
    	return view('maintenance.banks',['bank' => $bank]);
    }
    public function addBanks(Request $req){
    	DB::table('banks_t')->insert([
    		'BANKNAME' => $req->bankname
    	]);
    	return redirect('/Maintenance/Banks');
    }

    public function MaintenanceAccBanks(){
    	$country = DB::table('country_t')->get();
    	$banks = DB::table('banks_t')->get();
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
}
