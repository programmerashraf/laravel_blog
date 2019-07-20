<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\InstallUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class Installer extends Controller
{
    public function index(){
        return view("dashboard.installer.register");
    }

    public function register(InstallUser $request) {
        $user = User::create($request->all());
        auth()->login($user);
        return redirect()->route("home");
    }
}
