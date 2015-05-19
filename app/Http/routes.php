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

Route::get('/', 'WelcomeController@index');
Route::get('home', 'Admin\AdminController@index');

// Admin Interface Routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
	Route::get('dashboard', 'Admin\AdminController@index');
	Route::get('backup', 'Admin\BackupController@index');
	Route::get('backup/create', 'Admin\BackupController@create');
	Route::get('backup/download/{file_name}', 'Admin\BackupController@download');
	Route::delete('backup/delete/{file_name}', 'Admin\BackupController@delete');

	// Dick CRUD: Define the resources for the entities you want to CRUD.
	Route::resource('article', 'Admin\ArticleCrudController');
	Route::resource('category', 'Admin\CategoryCrudController');
	Route::resource('tag', 'Admin\TagCrudController');
	Route::resource('user', 'Admin\UserCrudController');
	Route::resource('role', 'Admin\RoleCrudController');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);