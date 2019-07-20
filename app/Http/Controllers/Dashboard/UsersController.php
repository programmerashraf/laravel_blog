<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\CreateUser;
use App\Http\Requests\InstallUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(15);
        return view('dashboard.users.index', compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }


    public function store(CreateUser $request)
    {
        User::create($request->all());
        return redirect("/admin/users")->with(["message"=>"User created successfully"]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view("dashboard.users.edit", compact("user"));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            "admin"=>"required|boolean"
        ]);
        $id= $request->input("id");
        $user = User::find($id);
        $user->admin = $request->input("admin");
        $user->save();
        return redirect("/admin");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->id == $id){
            return redirect()->back();
        }
        $image = User::whereId($id)->first()->image;
        if (File::exists($image)){
            unlink($image);
        }
        User::destroy($id);
        return redirect("/admin/users")->with(["message"=>"User deleted successfully"]);
    }
}
