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

	// Dick CRUD: Define the resources for the entities you want to CRUD.
	CRUD::resource('article', 'ArticleCrudController');
	CRUD::resource('category', 'CategoryCrudController');
	CRUD::resource('tag', 'TagCrudController');
	CRUD::resource('user', 'UserCrudController');
	CRUD::resource('role', 'RoleCrudController');
	CRUD::resource('permission', 'PermissionCrudController');
	CRUD::resource('page', 'PageCrudController');

	// Dick Page Manager admin routes
	Route::get('page/create/{template}', 'PageCrudController@create');
	Route::get('page/{id}/edit/{template}', 'PageCrudController@edit');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'user' => 'Auth\UserController',
]);


/*
|--------------------------------------------------------------------------
| Page Manager public slugs
|--------------------------------------------------------------------------
| Multi-language
|
| NOTICE: Keep this at the end of the routes file.
| Catches any slugs that have not been defined in the above routes and sends the user to PublicController@page
*/

Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ /* 'localeSessionRedirect', */ 'localizationRedirect' ]
],
function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('{slug}', ['uses' => 'PublicController@page'])->where('slug', '([A-z\d-\/_.]+)?');
});
