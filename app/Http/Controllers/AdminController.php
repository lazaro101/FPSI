<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\App;
use App\AppAddress;
use App\AppChildren;
use App\AppContact;
use App\AppDoc;
use App\AppPersonal;
use App\AppSchool;
use App\AppSkills;
use App\AppWorkEx;
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
    public function editJobOrder(Request $req){
        $gen = 0;
        foreach ($req->gender as $key => $value) {
            $gen += $value;
        }
        JobOrder::where('JORDER_ID',$req->id)->update([
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
        JobDocs::where('JORDER_ID',$req->id)->delete();
        foreach ($req->docreq as $key => $value) {
            JobDocs::insert([
                'JORDER_ID' => $req->id,
                'REQ_ID' => $value
            ]);
        }
        JobSkills::where('JORDER_ID',$req->id)->delete();
        foreach ($req->skills as $key => $value) {
            JobSkills::insert([
                'JORDER_ID' => $req->id,
                'PROFLEVEL' => $req->prof[$key],
                'SKILL_ID' => $value,
            ]);
        }
        JobFees::where('JORDER_ID',$req->id)->delete();
        foreach ($req->fee as $key => $value) {
            JobFees::insert([
                'JORDER_ID' => $req->id,
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
        $app = App::where('status',0)->get();
        return view('transactions.applicant', compact('app'));
    }
    public function getSkillGeneralAll(){
        $var = GenSkills::where('SKILLTYPE', 'General')->where('status',0)->get();
        return response()->json($var);
    }
    public function getApplicant(Request $req){
        $app = App::where('APP_ID',$req->id)->first();
        // $add = AppAddress::where('APP_ID',$req->id)->first();
        $sch = AppSchool::where('APP_ID',$req->id)->get();
        $skl = AppSkills::where('appskills_t.APP_ID',$req->id)->join('genskills_t','genskills_t.SKILL_ID','=','appskills_t.APP_ID')->get();
        $hist = AppWorkEx::where('APP_ID',$req->id)->get();
        $chld = AppChildren::where('APP_ID',$req->id)->get();
        $con = AppContact::where('APP_ID',$req->id)->get();
        $per = AppPersonal::where('APP_ID',$req->id)->first();
        return response()->json([$app,$sch,$skl,$hist,$chld,$con,$per]);
    }
    public function addApplicant(Request $req){
        $appid = App::insertGetId([
            'LNAME' => $req->lname ,
            'FNAME' => $req->fname ,
            'MNAME' => $req->mname ,
            'POSITION' => $req->position ,
            'GENDER' => $req->gender ,
            'CIVILSTAT' => $req->civilstatus ,
            'CONTACT' => $req->cnum ,
            // 'CITIZENSHIP' => $req-> ,
            'BIRTHDATE' => date_format(date_create($req->birthdate),'Y-m-d') ,
            'AGE' => date_diff(date_create(date_format(date_create($req->birthdate),'Y-m-d')), date_create('now'))->y ,
            'AHEIGHT' => $req->height ,
            'AWEIGHT' => $req->weight ,
            // 'APPSTATUS' => $req-> ,
        ]); 
        if (isset($req->schname)) {
            foreach ($req->schname as $key => $value) {
                AppSchool::insert([
                    'APP_ID' => $appid ,
                    'SCHOOLNAME' => $value ,
                    'SCHOOLTYPE' => $req->schlevel[$key] ,
                    'DEGREE' => $req->schdegree[$key] ,
                    'YRSTART' => substr($req->schyear[$key],0,4) ,
                    'YREND' => substr($req->schyear[$key],-4) ,
                ]);
            }
        }
        if (isset($req->sklname)) {
            foreach ($req->sklname as $key => $value) {
                AppSkills::insert([
                    'APP_ID' => $appid ,
                    'SKILL_ID' => $value ,
                    'PROFICIENCY' => $req->prof[$key] ,
                ]);
            }
        }
        if (isset($req->empl)) {
            foreach ($req->empl as $key => $value) {
                AppWorkEx::insert([
                    'APP_ID' => $appid ,
                    'COMPANY' => $value ,
                    'COMPANYADD' => $req->empladd[$key] ,
                    'POSITION' => $req->emplpos[$key] , 
                    'MONTHSTART' => substr($req->empldate[$key],0,2) , 
                    'YEARSTART' => substr($req->empldate[$key],3,4) , 
                    'MONTHEND' => substr($req->empldate[$key],10,2) , 
                    'YEAREND' => substr($req->empldate[$key],-4) , 
                ]);
            }
        }
        AppPersonal::insert([
            'APP_ID' => $appid,
            'NAMEOFFATHER' => $req->fathername ,
            'FAGE' => $req->fatherage ,
            'FOCCUPATION' => $req->fatheroccu ,
            'NAMEOFMOTHER' => $req->mothername ,
            'MAGE' => $req->motherage ,
            'MOCCUPATION' => $req->motheroccu ,
            'NAMEOFSPOUSE' => $req->spousename ,
            'SAGE' => $req->spouseage ,
            'SOCCUPATION' => $req->spouseoccu ,
        ]);
        if (isset($req->chrnname)) {
            foreach ($req->chrnname as $key => $value) {
                AppChildren::insert([
                    'APP_ID' => $appid ,
                    'CHILDNAME' => $value ,
                    'AGE' => date_diff(date_create(date_format(date_create($req->chrnage[$key]),'Y-m-d')), date_create('now'))->y ,
                    'BIRTHDATE' => date_format(date_create($req->chrnbday[$key]),'Y-m-d') , 
                ]);
            }
        }
        if (isset($req->emrname)) {
            foreach ($req->emrname as $key => $value) {
                AppContact::insert([
                    'APP_ID' => $appid ,
                    'CONTACTNAME' => $value , 
                    'CONTACTNUM' => $req->emrcontact[$key] , 
                ]);
            }
        }

        return redirect('/Transactions/Applicant');
    }
    public function editApplicant(Request $req){
        App::where('APP_ID',$req->id)->update([
            'LNAME' => $req->lname ,
            'FNAME' => $req->fname ,
            'MNAME' => $req->mname ,
            'POSITION' => $req->position ,
            'GENDER' => $req->gender ,
            'CIVILSTAT' => $req->civilstatus ,
            'CONTACT' => $req->cnum ,
            // 'CITIZENSHIP' => $req-> ,
            'BIRTHDATE' => date_format(date_create($req->birthdate),'Y-m-d') ,
            'AGE' => date_diff(date_create(date_format(date_create($req->birthdate),'Y-m-d')), date_create('now'))->y ,
            'AHEIGHT' => $req->height ,
            'AWEIGHT' => $req->weight ,
            // 'APPSTATUS' => $req-> ,
        ]); 
        if (isset($req->schname)) {
            AppSchool::where('APP_ID',$req->id)->delete();
            foreach ($req->schname as $key => $value) {
                AppSchool::insert([
                    'APP_ID' => $req->id ,
                    'SCHOOLNAME' => $value ,
                    'SCHOOLTYPE' => $req->schlevel[$key] ,
                    'DEGREE' => $req->schdegree[$key] ,
                    'YRSTART' => substr($req->schyear[$key],0,4) ,
                    'YREND' => substr($req->schyear[$key],-4) ,
                ]);
            }
        }
        if (isset($req->sklname)) {
            AppSkills::where('APP_ID',$req->id)->delete();
            foreach ($req->sklname as $key => $value) {
                AppSkills::insert([
                    'APP_ID' => $req->id ,
                    'SKILL_ID' => $value ,
                    'PROFICIENCY' => $req->prof[$key] ,
                ]);
            }
        }
        if (isset($req->employer)) {
            AppWorkEx::where('APP_ID',$req->id)->delete();
            foreach ($req->employer as $key => $value) {
                AppWorkEx::insert([
                    'APP_ID' => $req->id ,
                    'COMPANY' => $value ,
                    'COMPANYADD' => $req->empladd[$key] ,
                    'POSITION' => $req->emplpos[$key] , 
                    'MONTHSTART' => substr($req->empldate[$key],0,2) , 
                    'YEARSTART' => substr($req->empldate[$key],3,4) , 
                    'MONTHEND' => substr($req->empldate[$key],10,2) , 
                    'YEAREND' => substr($req->empldate[$key],-4) , 
                ]);
            }
        }
        AppPersonal::where('APP_ID',$req->id)->update([ 
            'NAMEOFFATHER' => $req->fathername ,
            'FAGE' => $req->fatherage ,
            'FOCCUPATION' => $req->fatheroccu ,
            'NAMEOFMOTHER' => $req->mothername ,
            'MAGE' => $req->motherage ,
            'MOCCUPATION' => $req->motheroccu ,
            'NAMEOFSPOUSE' => $req->spousename ,
            'SAGE' => $req->spouseage ,
            'SOCCUPATION' => $req->spouseoccu ,
        ]);
        if (isset($req->chrnname)) {
            AppChildren::where('APP_ID',$req->id)->delete();
            foreach ($req->chrnname as $key => $value) {
                AppChildren::insert([
                    'APP_ID' => $req->id ,
                    'CHILDNAME' => $value ,
                    'AGE' => date_diff(date_create(date_format(date_create($req->chrnage[$key]),'Y-m-d')), date_create('now'))->y ,
                    'BIRTHDATE' => date_format(date_create($req->chrnbday[$key]),'Y-m-d') , 
                ]);
            }
        }
        if (isset($req->emrname)) {
            AppContact::where('APP_ID',$req->id)->delete();
            foreach ($req->emrname as $key => $value) {
                AppContact::insert([
                    'APP_ID' => $req->id ,
                    'CONTACTNAME' => $value , 
                    'CONTACTNUM' => $req->emrcontact[$key] , 
                ]);
            }
        }

        return redirect('/Transactions/Applicant');
    }
    public function deleteApplicant(Request $req){
        App::where('APP_ID',$req->id)->update(['status' => 1]);
        return redirect('/Transactions/Applicant');
    }

    public function TransactionsApplicantMatching(){
        $employer = Employer::where('status',0)->get();
        $job = Job::where('status',0)->get();
        return view('transactions.applicantmatching',compact('employer','job'));
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
