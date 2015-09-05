<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dick\CRUD\CrudTrait;

class Page extends Model {

	use CrudTrait;

	protected $table = 'pages';
	protected $fillable = ['name', 'slug', 'content', 'extras', 'template'];

}
