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
						// "columns" => [
						// 					[
						// 						'name' => 'title',
						// 						'title' => "The Title"
						// 					],
						// 					[
						// 						'name' => 'slug',
						// 						'title' => "The Slug"
						// 					],
						// 					[
						// 						'name' => 'content',
						// 						'title' => "The Content"
						// 					],
						// 			],
						"columns" => "title,slug,content",
						"create_fields" => [
												[
													'name' => 'title',
													'title' => 'Title',
													'type' => 'text',
													'placeholder' => 'Your title here'
												],
												[
													'name' => 'content',
													'title' => 'Content',
													'type' => 'textarea',
													'placeholder' => 'Your textarea text here'
												],
											],
						// "create_fields" => "title,content",
						"update_fields" => "title,slug" 		// TODO: this does nothing right now and it should
						);

	public function index()
	{
		return $this->crudTable();
	}
}
