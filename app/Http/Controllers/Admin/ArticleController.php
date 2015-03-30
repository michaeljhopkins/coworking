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
						"columns" => "title,slug", 			// TODO: this does nothing right now and it should
						"create_fields" => "title,slug", 	// TODO: this does nothing right now and it should
						"edit_fields" => "title,slug" 		// TODO: this does nothing right now and it should
						);
}
