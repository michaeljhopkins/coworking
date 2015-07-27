<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dick\CRUD\CrudTrait;

class Tag extends Model {

	use CrudTrait;

	protected $table = 'tags';
	protected $fillable = ['name'];

    public function articles()
    {
        return $this->hasMany('App\Models\Article', 'article_tag');
    }

}
