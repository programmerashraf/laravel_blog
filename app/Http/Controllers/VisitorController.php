<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreVisitor;
use App\Visitor;

class VisitorController extends Controller
{
    public function login(){
    	return view('login');
    }

    public function register(){
    	return view('register');
    }

    public function session(Request $request){
    	$this->validate($request, [
    		"email"	=> "required",
    		"password"	=> "required"
    	]);
    	$visitor = Visitor::whereEmail($request->email)->first();
    	if (! $visitor) {
    		return redirect()->back()->withErrors(["error"=>"This email was not found"]);
    	}
    	if (! \Hash::check($request->password, $visitor->password)) {
    	    return redirect()->back()->withErrors(["error"=>"Incorrect password"]);
    	}
    	auth()->guard('visitor')->login($visitor);
    	return redirect('/');
    }

    public function store(StoreVisitor $request){
    	$visitor = Visitor::create($request->all());
    	auth()->guard('visitor')->login($visitor);
    	return redirect('/'); 
    }

    public function logout(){
    	auth()->guard('visitor')->logout();
    	return redirect('/login');
    }

}
