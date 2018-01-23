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
Route::post('/addCountry','AdminController@addCountry');

Route::get('/Maintenance/Currency','AdminController@MaintenanceCurrency');
Route::post('/addCurrency','AdminController@addCurrency');

Route::get('/Maintenance/Banks','AdminController@MaintenanceBanks');
Route::post('/addBanks','AdminController@addBanks');

Route::get('/Maintenance/AcceptedBanks','AdminController@MaintenanceAccBanks');
Route::post('/addAccBanks','AdminController@addAccBanks');

Route::get('/Maintenance/JobCategory','AdminController@MaintenanceJobCategory');
Route::post('/addJobCategory','AdminController@addJobCategory');

Route::get('/Maintenance/JobType','AdminController@MaintenanceJobType');
Route::post('/addJobType','AdminController@addJobType');

Route::get('/Maintenance/Job','AdminController@MaintenanceJob');
Route::post('/addJob','AdminController@addJob');


