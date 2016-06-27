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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/manage', 'Manage\ManageController@index');

//Routes for managing projects
Route::get('/manage/projects', 'Manage\ProjectController@index');
Route::get('/manage/projects/create', 'Manage\ProjectController@create');
Route::post('/manage/projects', 'Manage\ProjectController@store');
Route::delete('manage/projects/{project}', 'Manage\ProjectController@destroy');