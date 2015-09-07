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

Route::get('/', 'PublicController@index');
Route::get('home', 'Auth\UserController@index');

// Admin Interface Routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function()
{
	Route::get('', 'AdminController@index');

	// CRUD reorders
	Route::get('category/reorder', 'CategoryCrudController@reorder');
	Route::post('category/reorder', 'CategoryCrudController@saveReorder');

	// Dick CRUD: Define the resources for the entities you want to CRUD.
	Route::resource('article', 'ArticleCrudController');
	Route::resource('category', 'CategoryCrudController');
	Route::resource('tag', 'TagCrudController');
	Route::resource('user', 'UserCrudController');
	Route::resource('role', 'RoleCrudController');
	Route::resource('permission', 'PermissionCrudController');
	Route::resource('page', 'PageCrudController');

// Dick Page Manager routes
	Route::get('page/create/{template}', 'PageCrudController@create');
	Route::get('page/{id}/edit/{template}', 'PageCrudController@edit');

	// Language
	Route::get('language/texts/{lang?}/{file?}', 'LanguageCrudController@showTexts');
	Route::post('language/texts/{lang}/{file}', 'LanguageCrudController@updateTexts');
	Route::resource('language', 'LanguageCrudController');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'user' => 'Auth\UserController',
]);

// Dick Page Manager slugs
// NOTICE: Keep this at the end of the routes file.
// It will catch any slugs that have not been defined in the above routes and send it to PublicController@page.
// There, we check for the slug in the database. If it doesn't exist, we'll throw a 404.
// Route::get('{slug}', ['uses' => 'PublicController@page'])->where('slug', '([A-z\d-\/_.]+)?');
