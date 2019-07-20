<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $this->validate($request,[
            "s"=>"required"
        ]);
        $posts = Post::withAnyTag($request->input("s"))
                        ->orWhere("title", "LIKE", $request->input("s")."%")
                        ->orWhere("title", "LIKE", $request->input("s")."%")
                        ->orWhere("title", "LIKE", "%".$request->input("s")."%")
                        ->orderBy("created_at", "desc")
                        ->paginate(15);
        return view("search", compact("posts"))->with(["search"=>$request->input("s")]);
    }
}
