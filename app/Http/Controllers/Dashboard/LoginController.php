<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

	public function __construct(){
		$this->middleware("guest")->except("logout");
	}

    public function index(){
    	return view("dashboard.login");
    }

    public function login(){
    	$this->validate(request(),[
    		"email"	=> "email|required",
    		"password"=>"required"
    	]);
    	if (auth()->attempt(request(['email','password']))) {
    		return redirect("/admin");
    	}
    	return redirect()->route('login');
    }

    public function logout(){
    	auth()->logout();
    	return redirect()->route('login');
    }
    
}
