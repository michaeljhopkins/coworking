<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CrudController;
use Illuminate\Http\Request;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\UserRequest as StoreRequest;
use App\Http\Requests\UserRequest as UpdateRequest;

class UserCrudController extends CrudController {

	public $crud = array(
						"model" => "App\User",
						"entity_name" => "user",
						"entity_name_plural" => "users",
						"route" => "admin/user",

						// *****
						// COLUMNS
						// *****
						//
						// Define the columns for the table view as an array:
						//
						"columns" => [
											[
												'name' => 'name',
												'label' => "Name surname"
											],
											[
												'name' => 'email',
												'label' => "Email"
											],
											[
												// n-n relationship (with pivot table)
												'label' => "Roles",
												'type' => 'select_multiple',
												'name' => 'roles', // the method that defines the relationship in your Model
												'entity' => 'roles', // the method that defines the relationship in your Model
												'attribute' => 'display_name', // foreign key attribute that is shown to user
												'model' => "App\Role", // foreign key model
												'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
											],
									],
						//
						// or as a string:
						//
						// "columns" => "title,slug,content",


						// *****
						// CREATE FIELDS
						// *****
						//
						// Define the fields for the "Add new item" view as an array:
						//
						// "create_fields" => [
						// 						[
						// 							'name' => 'title',
						// 							'title' => 'Title',
						// 							'type' => 'text',
						// 							'placeholder' => 'Your title here'
						// 						],
						// 						[
						// 							'name' => 'content',
						// 							'title' => 'Content',
						// 							'type' => 'textarea',
						// 							'placeholder' => 'Your textarea text here'
						// 						],
						// 					],
						// or as a string:
						// "create_fields" => "title,content",


						// *****
						// UPDATE FIELDS
						// *****
						//
						// Define the fields for the "Edit item" view as an array:
						//
						// "update_fields" => [
						// 						[
						// 							'name' => 'title',
						// 							'title' => 'Title',
						// 							'type' => 'text',
						// 							'placeholder' => 'Your title here'
						// 						],
						// 						[
						// 							'name' => 'content',
						// 							'title' => 'Content',
						// 							'type' => 'textarea',
						// 							'placeholder' => 'Your textarea text here'
						// 						],
						// 					],
						// or as a string:
						// "update_fields" => "title,content"


						// *****
						// FIELDS ALTERNATIVE
						// *****
						//
						// Define both create_fields and update_fields in one array:
						//
						"fields" => [
												[
													'name' => 'name',
													'label' => 'Name Surname',
													'type' => 'text',
												],
												[
													'name' => 'email',
													'type' => 'email',
													'label' => "Email address"
												],
												[
													// n-n relationship (with pivot table)
													'label' => "Roles",
													'type' => 'select_multiple',
													'name' => 'roles', // the method that defines the relationship in your Model
													'entity' => 'roles', // the method that defines the relationship in your Model
													'attribute' => 'display_name', // foreign key attribute that is shown to user
													'model' => "App\Role", // foreign key model
													'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
												],
											],
						//
						// or as a string:
						//
						// "fields" => "title,content",
						);

	public function store(StoreRequest $request)
	{
		return parent::store_crud();
	}

	public function update(UpdateRequest $request)
	{
		return parent::update_crud();
	}
}
