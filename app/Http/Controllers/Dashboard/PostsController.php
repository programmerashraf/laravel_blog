<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class PostsController extends Controller
{

    public function index(){
        if (!isAdmin()){
            $posts = auth()->user()->posts();
        }else {
            $posts = Post::with("comments");
        }
        $posts = $posts->orderBy("created_at", "desc")->paginate(15);
        return view("dashboard.posts.index", compact("posts"));
    }

    public function create(){
        $categories = Category::all();
        return view('dashboard.posts.create', compact("categories"));
    }

    public function store(CreatePostRequest $request){

        $filename = 'storage/images/posts/'.uniqid().'.'.$request->file("image")->getClientOriginalExtension();
        Image::make($request->file('image'))
            ->save($filename, 90);

        $article = auth()->user()->posts()->create([
            "title" => request('title'),
            "slug"  => Str::slug(request('title')),
            "body" => request('body'),
            "category_id" => request('category_id'),
            "image" => $filename
        ]);
        $article->tag(explode(",", $request->tags));
        return redirect("/admin/posts");
    }

    public function edit($id){
        $post = Post::find($id);
        if ($post->user == auth()->user()){
            return view("dashboard.posts.edit", compact("post"));
        }
        return redirect()->back();
    }

    public function update(UpdatePostRequest $request){
        $post = Post::find($request->input("id"));
        $post->update($request->all());
        return redirect("/admin/posts");;
    }

    public function destroy($id){
        $post = Post::find($id);
        if ($post->user == auth()->user() or isAdmin()){
            unlink($post->image);
            Post::destroy($id);
        }
        return redirect("/admin/posts"); 
    }
    
}
