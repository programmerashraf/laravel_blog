<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        $this->validate($request,[
            "username"=>"required|min:2",
            "content"=>"required"
        ]);
        Comment::create($request->all());
        return redirect()->back();
    }
}
