<?php

namespace App\Http\Controllers\Dashboard;

use App\Comment;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateSettingsRequest;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class DashboardController extends Controller
{
    public function index(){
        $data = [
            "posts"       => Post::all(),
            "users"       => User::all(),
            "comments"    => Comment::all(),
            "latestComment"=>  Comment::latest()->with('post')->first()
        ];
        return view("dashboard.index", compact("data"));
    }

    public function settings(){
        $user = auth()->user();
        return view("dashboard.settings", compact("user"));
    }

    public function password(){
        return view("dashboard.password");
    }

    public function update(UpdateSettingsRequest $request){
        if (authPasswordCheck($request->input("password"))){
            auth()->user()->update($request->except('password'));
            return redirect()->back()->with(["message"=>"You profile has been updated"]);
        }
        return redirect()->back()->withErrors(["error"=>"Incorrect password"]);
    }

    public function image(Request $request){
        $this->validate($request,[
            "image"=>"required|image"
        ]);
        $user = auth()->user();
        if (File::exists($user->image)){unlink($user->image);}
        $filename = 'storage/images/users/'.uniqid(auth()->user()->id).'.'.$request->file("image")->getClientOriginalExtension();
        $user->update($request->all());
        Image::make($request->file('image'))
            ->fit(200, 200)
            ->save($filename, 80);
        $user->image = $filename;
        $user->save();
        return redirect()->back()->with(["message"=>"You profile image has been updated"]);
    }

    public function passwordChange(UpdatePasswordRequest $request){
        if (! authPasswordCheck($request->input("current_password"))){
            return redirect()->back()->withErrors(["error"=>"incorrect password"]);
        }
        auth()->user()->update(["password"=>bcrypt(request("password"))]);
        return redirect("/admin")->with(["message"=>"You password has been updated"]);
    }
}
