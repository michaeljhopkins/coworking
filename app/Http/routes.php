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
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function()
{
	Route::get('', 'AdminController@index');

	// Backup
	Route::get('backup', 'BackupController@index');
	Route::put('backup/create', 'BackupController@create');
	Route::get('backup/download/{file_name}', 'BackupController@download');
	Route::delete('backup/delete/{file_name}', 'BackupController@delete');

	// Logs
	Route::get('log', 'LogController@index');
	Route::get('log/preview/{file_name}', 'LogController@preview');
	Route::get('log/download/{file_name}', 'LogController@download');
	Route::delete('log/delete/{file_name}', 'LogController@delete');

	// Dick CRUD: Define the resources for the entities you want to CRUD.
	Route::resource('article', 'ArticleCrudController');
	Route::resource('category', 'CategoryCrudController');
	Route::resource('tag', 'TagCrudController');
	Route::resource('user', 'UserCrudController');
	Route::resource('role', 'RoleCrudController');
	Route::resource('permission', 'PermissionCrudController');

	// Language
	Route::get('language/texts/{lang?}/{file?}', 'LanguageCrudController@showTexts');
	Route::post('language/texts/{lang}/{file}', 'LanguageCrudController@updateTexts');
	Route::resource('language', 'LanguageCrudController');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
