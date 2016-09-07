<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'ForumController@index');

Auth::routes();

Route::get('/forum', 'ForumController@index');

Route::get('/user/{id}/{name}', 'UserController@showProfile');

Route::get('/forum/{id}/{name}', 'ForumController@show');

Route::get('/topic/new/{id}', 'TopicController@createForm')->middleware('auth');
Route::post('/topic/new', 'TopicController@create')->middleware('auth');;

Route::get('/topic/update/{id}', 'TopicController@updateForm')->middleware('auth');
Route::post('/topic/update', 'TopicController@update')->middleware('auth');
Route::get('/topic/delete/{id}', 'TopicController@delete')->middleware('auth');
Route::get('/topic/{id}/{name}', 'TopicController@show')->name('topic');

Route::get('/post/new/{id}', 'PostController@createForm')->middleware('auth');
Route::post('/post/new', 'PostController@create')->middleware('auth');
Route::get('/post/update/{id}', 'PostController@updateForm')->middleware('auth');
Route::post('/post/update', 'PostController@update')->middleware('auth');
Route::get('/post/delete/{id}', 'PostController@delete')->middleware('auth');

// Admin
Route::get('/admin', 'Admin\DashboardController@index');
Route::get('/admin/forum', 'Admin\ForumController@index');
Route::get('/admin/forum/delete/{id}', 'Admin\ForumController@delete');
Route::get('/admin/forum/create', 'Admin\ForumController@create');
Route::get('/admin/forum/update/{id}', 'Admin\ForumController@updateForm');
Route::post('/admin/forum/update', 'Admin\ForumController@update');
Route::get('/admin/user', 'Admin\UserController@index');