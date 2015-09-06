<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Dick\CRUD\Http\Controllers\CrudController;
use Illuminate\Http\Request;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\RoleRequest as StoreRequest;
use App\Http\Requests\RoleRequest as UpdateRequest;

class RoleCrudController extends CrudController {

	public $crud = array(
						"model" => "App\Role",
						"entity_name" => "role",
						"entity_name_plural" => "roles",
						"route" => "admin/role",

						// *****
						// COLUMNS
						// *****
						//
						// Define the columns for the table view as an array:
						//
						"columns" => [
											[
												'name' => 'name',
												'type' => 'text',
												'label' => "Key"
											],
											[
												'name' => 'display_name',
												'type' => 'text',
												'label' => "Name"
											],
											[
												'name' => 'description',
												'type' => 'text',
												'label' => "Description"
											],
											[
												// n-n relationship (with pivot table)
												'label' => "Permissions",
												'type' => 'select_multiple',
												'name' => 'permissions', // the method that defines the relationship in your Model
												'entity' => 'permissions', // the method that defines the relationship in your Model
												'attribute' => 'display_name', // foreign key attribute that is shown to user
												'model' => "App\Permission", // foreign key model
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
													'type' => 'text',
													'label' => "Key",
													'disabled' => 'disabled'
												],
												[
													'name' => 'display_name',
													'type' => 'text',
													'label' => "Name"
												],
												[
													'name' => 'description',
													'label' => "Description",
													'type' => 'text'
												],
												[
													// n-n relationship (with pivot table)
													'label' => "Permissions",
													'type' => 'select2_multiple',
													'name' => 'permissions', // the method that defines the relationship in your Model
													'entity' => 'permissions', // the method that defines the relationship in your Model
													'attribute' => 'display_name', // foreign key attribute that is shown to user
													'model' => "App\Permission", // foreign key model
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
		return parent::storeCrud();
	}

	public function update(UpdateRequest $request)
	{
		return parent::updateCrud();
	}
}
