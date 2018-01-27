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

Route::get('/Maintenance/DocumentaryRequirements','AdminController@MaintenanceDocReq');
Route::get('/getDocreq','AdminController@getDocreq');
Route::post('/addDocreq','AdminController@addDocreq');
Route::post('/editDocreq','AdminController@editDocreq');
Route::post('/delDocreq','AdminController@delDocreq');

Route::get('/Maintenance/Country','AdminController@MaintenanceCountry');
Route::get('/getCountry','AdminController@getCountry');
Route::post('/addCountry','AdminController@addCountry');
Route::post('/editCountry','AdminController@editCountry');
Route::post('/delCountry','AdminController@delCountry');

Route::get('/Maintenance/Currency','AdminController@MaintenanceCurrency');
Route::get('/getCurrency','AdminController@getCurrency');
Route::post('/addCurrency','AdminController@addCurrency');
Route::post('/editCurrency','AdminController@editCurrency');
Route::post('/delCurrency','AdminController@delCurrency');

Route::get('/Maintenance/Banks','AdminController@MaintenanceBanks');
Route::get('/getBanks','AdminController@getBanks');
Route::post('/addBanks','AdminController@addBanks');
Route::post('/editBanks','AdminController@editBanks');
Route::post('/delBanks','AdminController@delBanks');

Route::get('/Maintenance/AcceptedBanks','AdminController@MaintenanceAccBanks');
Route::get('/getAccBanks','AdminController@getAccBanks');
Route::post('/addAccBanks','AdminController@addAccBanks');
Route::post('/editAccBanks','AdminController@editAccBanks');
Route::post('/delAccBanks','AdminController@delAccBanks');

Route::get('/Maintenance/JobCategory','AdminController@MaintenanceJobCategory');
Route::get('/getJobCategory','AdminController@getJobCategory');
Route::post('/addJobCategory','AdminController@addJobCategory');
Route::post('/editJobCategory','AdminController@editJobCategory');
Route::post('/delJobCategory','AdminController@delJobCategory');

Route::get('/Maintenance/JobType','AdminController@MaintenanceJobType');
Route::get('/getJobType','AdminController@getJobType');
Route::post('/addJobType','AdminController@addJobType');
Route::post('/editJobType','AdminController@editJobType');
Route::post('/delJobType','AdminController@delJobType');

Route::get('/Maintenance/Job','AdminController@MaintenanceJob');
Route::post('/addJob','AdminController@addJob');

Route::get('/Maintenance/Skills','AdminController@MaintenanceSkills');
Route::get('/getSkills','AdminController@getSkills');
Route::post('/addSkills','AdminController@addSkills');
Route::post('/editSkills','AdminController@editSkills');
Route::post('/delSkills','AdminController@delSkills');

Route::get('/Maintenance/Fees','AdminController@MaintenanceFees');
Route::post('/addFees','AdminController@addFees');

Route::get('/Transactions/Employer','AdminController@TransactionsEmployer');
Route::post('/addEmployer','AdminController@addEmployer');