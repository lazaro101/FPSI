<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

class AdminController extends Controller
{
    public function __construct()
    { 
        $this->middleware('checklog');
    }

    public function Dashboard(){
    	return view('dashboard');
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
        $docreq = GenReqs::where('status',0)->where('ALLOCATION','Job')->get();
        return view('transactions.joborder',compact('emplyr','jobs','jobcat','docreq'));
    }
    public function getSkillFee(Request $req){
        $sp = SpecificSkill::where('JOB_ID',$req->jid)->select('SKILL_ID')->get();
        $spec = GenSkills::whereIn('SKILL_ID',$sp);
        $skill = GenSkills::where('status',0)->where('SKILLTYPE','General')->union($spec)->where('status',0)->get();
        $jtid = Job::where('JOB_ID',$req->jid)->first();
        $fid = FeeType::where('JOBTYPE_ID',$jtid->JOBTYPE_ID)->select('FEE_ID')->get();
        $fee = GenFees::whereIn('FEE_ID',$fid)->where('status',0)->get();
        return response()->json([$skill,$fee]);
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

    public function TransactionsApplicant(){
        return view('transactions.applicant');
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
