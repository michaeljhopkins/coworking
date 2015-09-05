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
Route::get('home', 'HomeController@index');

// Admin Interface Routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
	Route::get('', 'Admin\AdminController@index');

	// CRUD reorders
	Route::get('category/reorder', 'Admin\CategoryCrudController@reorder');
	Route::post('category/reorder', 'Admin\CategoryCrudController@saveReorder');

	// Dick CRUD: Define the resources for the entities you want to CRUD.
	Route::resource('article', 'Admin\ArticleCrudController');
	Route::resource('category', 'Admin\CategoryCrudController');
	Route::resource('tag', 'Admin\TagCrudController');
	Route::resource('user', 'Admin\UserCrudController');
	Route::resource('role', 'Admin\RoleCrudController');
	Route::resource('permission', 'Admin\PermissionCrudController');
	Route::resource('page', 'Admin\PageCrudController');

	// TODO: move these in the Dick\PageManager package
	Route::get('page/create/{template}', 'Admin\PageCrudController@create');
	Route::get('page/{id}/edit/{template}', 'Admin\PageCrudController@edit');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'user' => 'Auth\UserController',
]);
