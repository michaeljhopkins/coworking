<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Dick\CRUD\Http\Controllers\CrudController;

use Illuminate\Http\Request;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CrudRequest as StoreRequest;
use App\Http\Requests\CrudRequest as UpdateRequest;

class CategoryCrudController extends CrudController {

	public $crud = array(
						"model" => "App\Models\Category",
						"entity_name" => "category",
						"entity_name_plural" => "categories",
						"route" => "admin/category",
						"reorder" => true,
						"reorder_label" => "name",

						// *****
						// COLUMNS
						// *****
						//
						// Define the columns for the table view as an array:
						//
						"columns" => [
											[
												'name' => 'name',
												'label' => "Category Name"
											],
											[
												'label' => "Parent",
												'type' => 'select',
												'name' => 'parent_id',
												'entity' => 'parent',
												'attribute' => 'name',
												'model' => "App\Models\Category"
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
													'label' => 'Name',
													'type' => 'text',
													'placeholder' => 'Your category name here'
												],
												[
													'label' => "Parent",
													'type' => 'select',
													'name' => 'parent_id',
													'entity' => 'parent',
													'attribute' => 'name',
													'model' => "App\Models\Category"
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
