<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/json/jobcategory/all', 'JSONController@getJobCategoryAll');
Route::get('/json/jobtype/all', 'JSONController@getJobTypeAll');
Route::get('/json/skillspecific/all', 'JSONController@getSkillSpecificAll');

Route::get('/json/job/one', 'JSONController@getJobOne');
Route::get('/json/specificskill/one', 'JSONController@getSpecificSkillOne');

Route::post('/maintenance/job', 'MaintenanceController@postJob');
Route::post('/maintenance/remove/job', 'MaintenanceController@postRemoveJob');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create','WebController@create');
Route::get('/Login',function(){
	return view('login');
});
Route::post('/dologin','WebController@dologin');
Route::get('/logout',function(){
	Auth::logout();
	return redirect('/Login');
});

Route::get('/Dashboard','AdminController@Dashboard');

Route::get('/Maintenance/DocumentaryRequirements','MaintenanceController@MaintenanceDocReq');
Route::get('/getDocreq','MaintenanceController@getDocreq');
Route::post('/addDocreq','MaintenanceController@addDocreq');
Route::post('/editDocreq','MaintenanceController@editDocreq');
Route::post('/delDocreq','MaintenanceController@delDocreq');

Route::get('/Maintenance/Country','MaintenanceController@MaintenanceCountry');
Route::get('/getCountry','MaintenanceController@getCountry');
Route::post('/addCountry','MaintenanceController@addCountry');
Route::post('/editCountry','MaintenanceController@editCountry');
Route::post('/delCountry','MaintenanceController@delCountry');

Route::get('/Maintenance/Currency','MaintenanceController@MaintenanceCurrency');
Route::get('/getCurrency','MaintenanceController@getCurrency');
Route::post('/addCurrency','MaintenanceController@addCurrency');
Route::post('/editCurrency','MaintenanceController@editCurrency');
Route::post('/delCurrency','MaintenanceController@delCurrency');

Route::get('/Maintenance/Banks','MaintenanceController@MaintenanceBanks');
Route::get('/getBanks','MaintenanceController@getBanks');
Route::post('/addBanks','MaintenanceController@addBanks');
Route::post('/editBanks','MaintenanceController@editBanks');
Route::post('/delBanks','MaintenanceController@delBanks');

Route::get('/Maintenance/AcceptedBanks','MaintenanceController@MaintenanceAccBanks');
Route::get('/getAccBanks','MaintenanceController@getAccBanks');
Route::post('/addAccBanks','MaintenanceController@addAccBanks');
Route::post('/editAccBanks','MaintenanceController@editAccBanks');
Route::post('/delAccBanks','MaintenanceController@delAccBanks');

Route::get('/Maintenance/JobCategory','MaintenanceController@MaintenanceJobCategory');
Route::get('/getJobCategory','MaintenanceController@getJobCategory');
Route::post('/addJobCategory','MaintenanceController@addJobCategory');
Route::post('/editJobCategory','MaintenanceController@editJobCategory');
Route::post('/delJobCategory','MaintenanceController@delJobCategory');

Route::get('/Maintenance/JobType','MaintenanceController@MaintenanceJobType');
Route::get('/getJobType','MaintenanceController@getJobType');
Route::post('/addJobType','MaintenanceController@addJobType');
Route::post('/editJobType','MaintenanceController@editJobType');
Route::post('/delJobType','MaintenanceController@delJobType');

Route::get('/Maintenance/Job','MaintenanceController@MaintenanceJob');
Route::post('/addJob','AdminController@addJob');

Route::get('/Maintenance/Skills','MaintenanceController@MaintenanceSkills');
Route::get('/getSkills','MaintenanceController@getSkills');
Route::post('/addSkills','MaintenanceController@addSkills');
Route::post('/editSkills','MaintenanceController@editSkills');
Route::post('/delSkills','MaintenanceController@delSkills');

Route::get('/Maintenance/Fees','MaintenanceController@MaintenanceFees');
Route::get('/getFees','MaintenanceController@getFees');
Route::post('/addFees','MaintenanceController@addFees');
Route::post('/editFees','MaintenanceController@editFees');
Route::post('/delFees','MaintenanceController@delFees');


Route::get('/Transactions/Employer','AdminController@TransactionsEmployer');
Route::post('/addEmployer','AdminController@addEmployer');
Route::get('/getEmployer','AdminController@getEmployer');
Route::post('/editEmployer','AdminController@editEmployer');
Route::post('/delEmployer','AdminController@delEmployer');

Route::get('/Transactions/JobOrder','AdminController@TransactionsJobOrder');
Route::get('/getSkillFee','AdminController@getSkillFee');
Route::get('/getSymbol','AdminController@getSymbol');
Route::get('/getJob','AdminController@getJob');
Route::post('/addJobOrder','AdminController@addJobOrder');
Route::post('/editJobOrder','AdminController@editJobOrder');
Route::get('/getJobOrder','AdminController@getJobOrder');

Route::get('/Transactions/Applicant','AdminController@TransactionsApplicant');

Route::get('/Transactions/InitialInterview','AdminController@TransactionsInitialInterview');

Route::get('/Transactions/ApplicantMatching','AdminController@TransactionsApplicantMatching');

Route::get('/Transactions/InitialInterview','AdminController@TransactionsInitialInterview');

Route::get('/Transactions/FinalInterview','AdminController@TransactionsFinalInterview');

Route::get('/Transactions/DocumentsCollection','AdminController@TransactionsDocumentsCollection');

