<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class WebController extends Controller
{
    public function dologin(Request $req){

    	if(Auth::attempt(['username'=> $req->username,'password'=> $req->password])){
          	return redirect('/Maintenance');
        }
        return redirect('/Login');

    }
    public function create(){
    	$id = DB::table('emp_t')->insertGetId([
    		'LNAME' => 'Almojuela',
    		'FNAME' => 'Danielle Elijah',
    		'MNAME' => 'Jainar',
			'GENDER' => 'Male',
			'BIRTHDATE' => '1997-10-12',
			'ADDRSS' => 'Makati City',
			'CONTACT' => '09989892720',
			'DEPTNAME' => 'Operations'
    	]);
    	DB::table('users')->insert([
    		'EMP_ID' => $id,
    		'username' => 'admin',
    		'password' => bcrypt('admin')
     	]);
     	return redirect('/Login');
    }
}
