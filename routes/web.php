<?php

//User route

Route::group(['namespace'=>'user'], function(){

	Route::get('/','HomeController@index')->name('home');

	Route::get('/post/{post?}', 'PostController@post')->name('post');

	Route::get('/post/tag/{tag}', 'HomeController@tag')->name('tag');
	Route::get('/post/category/{category}', 'HomeController@category')->name('category');

});

//Admin routes

Route::group(['namespace'=>'Admin'], function(){

	// Admin home route
	Route::get('admin/home', 'HomeController@index')->name('admin.home');

	// Post route
	Route::resource('admin/post', 'PostController');

	//User route

	Route::resource('admin/user', 'UserController');

	// Tag Route
	Route::resource('admin/tag', 'TagController');

	//Category route

	Route::resource('admin/category', 'CategoryController');

	//Admin Auth routes
	Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');

	Route::post('admin-login', 'Auth\LoginController@login');


	Route::resource('admin/role', 'RoleController');

	Route::resource('admin/permission', 'PermissionController');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
