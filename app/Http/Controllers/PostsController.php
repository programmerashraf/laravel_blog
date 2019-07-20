<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index(){
    	$posts = Post::with("user")->latest()->paginate(10);
    	return view('posts', compact('posts'));
    }
    public function show($slug,$id){
        $post = Post::with("user")->find($id);
        return view("post", compact("post"));
    }
}
