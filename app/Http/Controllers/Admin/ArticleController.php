<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CrudController;

use Illuminate\Http\Request;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CrudRequest as StoreRequest;
use App\Http\Requests\CrudRequest as UpdateRequest;

class ArticleController extends CrudController {

	public $crud = array(
						// what's the namespace for your entity's model
						"model" => "App\Models\Article",
						// what name will show up on the buttons, in singural (ex: Add entity)
						"entity_name" => "article",
						// what name will show up on the buttons, in plural (ex: Delete 5 entities)
						"entity_name_plural" => "articles",
						// what route have you defined for your entity? used for links.
						"route" => "admin/article",

						// *****
						// COLUMNS
						// *****
						//
						// Define the columns for the table view as an array:
						//
						"columns" => [
											[
												'name' => 'title',
												'label' => "The Title"
											],
											[
												'name' => 'slug',
												'label' => "The Slug"
											],
											[
												'name' => 'content',
												'label' => "The Content"
											],
											[
												// 1-n relationship
												'label' => "Category",
												'type' => 'select',
												'name' => 'category_id', // the db column for the foreign key
												'entity' => 'category', // the method that defines the relationship in your Model
												'attribute' => 'name', // foreign key attribute that is shown to user
												'model' => "App\Models\Category" // foreign key model
											],
											[
												// n-n relationship (with pivot table)
												'label' => "Tags",
												'type' => 'select_multiple',
												'name' => 'tags', // the method that defines the relationship in your Model
												'entity' => 'tags', // the method that defines the relationship in your Model
												'attribute' => 'name', // foreign key attribute that is shown to user
												'model' => "App\Models\Tag", // foreign key model
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
													'name' => 'title',
													'label' => 'Title',
													'type' => 'text',
													'placeholder' => 'Your title here'
												],
												[
													'name' => 'content',
													'label' => 'Content',
													'type' => 'wysiwyg',
													'placeholder' => 'Your textarea text here'
												],
												[
													'label' => "Category",
													'type' => 'select',
													'name' => 'category_id',
													'entity' => 'category',
													'attribute' => 'name',
													'model' => "App\Models\Category"
												],
												[
													'label' => "Tags",
													'type' => 'select_multiple',
													'name' => 'tags',
													'entity' => 'tag',
													'attribute' => 'name',
													'model' => "App\Models\Tag",
													'pivot' => true,
												],
											],
						//
						// or as a string:
						//
						// "fields" => "title,content",
						);

	public function store(StoreRequest $request)
	{
		parent::store_crud();
	}

	public function update(UpdateRequest $request)
	{
		parent::update_crud();
	}
}
