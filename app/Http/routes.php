<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@dashboard');

Route::get('/manage', 'Manage\ManageController@index');

//Routes for viewing projects
Route::get('/project/{project}', 'ProjectController@view');

//Routes for managing projects
Route::get('/manage/projects', 'Manage\ProjectController@index');
Route::get('/manage/projects/create', 'Manage\ProjectController@create');
Route::get('/manage/projects/{project}/edit', 'Manage\ProjectController@edit');
Route::put('/manage/projects/{project}', 'Manage\ProjectController@update');
Route::post('/manage/projects', 'Manage\ProjectController@store');
Route::delete('manage/projects/{project}', 'Manage\ProjectController@destroy');

//Routes for managing tags
Route::get('/manage/tags', 'Manage\TagController@index');
Route::get('/manage/tags/create', 'Manage\TagController@create');
Route::get('/manage/tags/{tag}/edit', 'Manage\TagController@edit');
Route::put('/manage/tags/{tag}', 'Manage\TagController@update');
Route::post('/manage/tags', 'Manage\TagController@store');
Route::delete('manage/tags/{tag}', 'Manage\TagController@destroy');


//Routes for managing users
Route::get('/manage/users', 'Manage\UserController@index');
Route::get('/manage/users/search', 'Manage\UserController@search');
Route::get('/manage/users/{user}/edit', 'Manage\UserController@edit');
Route::put('/manage/users/{user}', 'Manage\UserController@update');
Route::delete('manage/users/{user}', 'Manage\UserController@destroy');