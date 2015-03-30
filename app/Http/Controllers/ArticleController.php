<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ArticleController extends CrudController {

	protected $model="Models\Article"; // TODO: this should do something
	public $crud = array(
						"entity_name" => "article",
						"entity_name_plural" => "articles"
						);

}
