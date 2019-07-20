<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
    	$categories = Category::orderBy("created_at", "desc")->paginate(15);
    	return view("dashboard.categories.index", compact("categories"));
    }

    public function create(){
    	return view('dashboard.categories.create');
    }

    public function show($name){
        $category = Category::where('name',$name)->first();
        $posts = $category->posts;
        return view("category", compact("category"))->with(["posts"=>$posts]);
    }

    public function store(Request $request){
        $this->validate($request, ['name' => 'required|unique:categories']);
        $article = Category::create($request->all());
        return redirect("/admin/categories");
    }
    public function destroy($id){
        Category::destroy($id);
        return redirect("/admin/categories"); 
    }
}
