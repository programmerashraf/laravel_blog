<?php

Route::group(["prefix"=>"admin"],function(){

	Route::get("login", "LoginController@index")->name("login");
	Route::post("login", "LoginController@login");

    Route::group(['middleware' => 'firstUser'], function(){
        Route::get("install", "Installer@index")->name("install");
        Route::post("install/register", "Installer@register")->name("install.register");
    });

	Route::group(['middleware' => 'admin'], function() {

		Route::group(["prefix"=>"users"],function (){

			Route::get("/", "UsersController@index");
			Route::get("/create", "UsersController@create");
			Route::post("/create", "UsersController@store");
			Route::get("/delete/{id}", "UsersController@destroy");
			Route::get("/edit/{id}", "UsersController@edit");
			Route::post("/edit/{id}", "UsersController@update");

		});
	});

	Route::group(['middleware' => 'auth'], function() {

		Route::post("logout", "LoginController@logout");

		Route::get("/","DashboardController@index")->name("home");
		Route::get("settings", "DashboardController@settings");
		Route::post("settings", "DashboardController@update");
		Route::get("settings/password", "DashboardController@password");
		Route::post("settings/password", "DashboardController@passwordChange");
        Route::post("settings/image", "DashboardController@image");

		Route::group(["prefix"=>"posts"],function (){

			Route::get("/", "PostsController@index");
			Route::get("/create", "PostsController@create");
			Route::post("/create", "PostsController@store");
			Route::get("/delete/{id}", "PostsController@destroy");
			Route::get("/edit/{id}", "PostsController@edit");
			Route::post("/edit", "PostsController@update");
			
		});

		Route::group(["prefix"=>"categories"],function (){

			Route::get("/", "CategoryController@index");
			Route::get("/create", "CategoryController@create");
			Route::post("/create", "CategoryController@store");
			Route::get("/delete/{id}", "CategoryController@destroy");

		});

	}); 

});