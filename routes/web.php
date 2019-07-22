<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "PostsController@index");
Route::get('/about', function (){
    return view("about");
});
Route::get('/contact', function (){
    return view("contact");
});

Route::get('/search', "SearchController@index");
Route::get('/post/{slug}/{id}', "PostsController@show");
Route::post("comment/create", "CommentController@store");

Route::get("category/{name}", "Dashboard\CategoryController@show");
Route::get("tag/{name}", "TagController@show");

Route::group(['middleware' => 'guest_visitor'], function() {
    Route::get("login", "VisitorController@login");
    Route::post("login", "VisitorController@session");
    Route::get("register", "VisitorController@register");
    Route::post("register", "VisitorController@store");
});

Route::group(['middleware' => 'visitor'], function() {
    Route::get("logout", "VisitorController@logout");
});

//Auth::Routes();

