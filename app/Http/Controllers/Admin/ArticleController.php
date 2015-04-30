<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CrudController;

use Illuminate\Http\Request;

class ArticleController extends CrudController {

	public $model = "App\Models\Article";
	public $crud = array(
						"entity_name" => "article",
						"entity_name_plural" => "articles",
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
												'title' => "The Title"
											],
											[
												'name' => 'slug',
												'title' => "The Slug"
											],
											[
												'name' => 'content',
												'title' => "The Content"
											],
											[
												'title' => "Category",
												'type' => 'select',
												'name' => 'category_id',
												'entity' => 'category',
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
													'name' => 'title',
													'title' => 'Title',
													'type' => 'text',
													'placeholder' => 'Your title here'
												],
												[
													'name' => 'content',
													'title' => 'Content',
													'type' => 'wysiwyg',
													'placeholder' => 'Your textarea text here'
												],
												[
													'title' => "Category",
													'type' => 'select',
													'name' => 'category_id',
													'entity' => 'category',
													'attribute' => 'name',
													'model' => "App\Models\Category"
												],
											],
						//
						// or as a string:
						//
						// "fields" => "title,content",
						);

}
