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
        $joborder = JobOrder::where('status',0)->get();
        $emplyr = Employer::where('status',0)->get(); 
        $jobcat = JobCategory::where('status',0)->get();
        $docreq = GenReqs::where('status',0)->where('ALLOCATION','Job')->get();
        return view('transactions.joborder',compact('emplyr','jobs','jobcat','docreq','joborder'));
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
    public function addJobOrder(Request $req){
        $gen = 0;
        foreach ($req->gender as $key => $value) {
            $gen += $value;
        }
        $joid = JobOrder::insertGetId([
            'EMPLOYER_ID' => $req->employer ,
            'CATEGORY_ID' => $req->jobcat ,
            'JOB_ID' => $req->job ,
            'REQAPP' => $req->numemp ,
            'SALARY' => $req->salary ,
            'GENDER' => $gen ,
            'HEIGHTREQ' => $req->height ,
            'WEIGHTREQ' => $req->weight ,
            'CNTRCTSTART' => date_format(date_create($req->contract),"Y-m-d"),
        ]);
        foreach ($req->docreq as $key => $value) {
            JobDocs::insert([
                'JORDER_ID' => $joid,
                'REQ_ID' => $value
            ]);
        }
        foreach ($req->skills as $key => $value) {
            JobSkills::insert([
                'JORDER_ID' => $joid,
                'PROFLEVEL' => $req->prof[$key],
                'SKILL_ID' => $value,
            ]);
        }
        foreach ($req->fee as $key => $value) {
            JobFees::insert([
                'JORDER_ID' => $joid,
                'FEE_ID' => $value,
                'AMOUNT' => $req->amount[$key]
            ]);
        }

        return redirect('/Transactions/JobOrder');
    }
    public function getJobOrder(Request $req){
        $jorder = JobOrder::where('JORDER_ID',$req->joid)->first();
        $docreq = JobDocs::where('JORDER_ID',$req->joid)->get();
        $skills = JobSkills::where('JORDER_ID',$req->joid)->get();
        $fees = JobFees::where('JORDER_ID',$req->joid)->get();
        return response()->json([$jorder,$docreq,$skills,$fees]);
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
