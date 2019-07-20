<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($name){
        $posts = Post::withAllTags($name)->paginate(15);
        return view("tag", compact("posts"))->with(["tag"=>$name]);
    }
}
