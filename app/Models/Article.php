<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends BaseModel {

	// the name of the table in your database
	protected $table = 'articles';
	// the columns in the database that can be filled by a user - if they're not here, create&update will ignore those columns
	protected $fillable = ['slug', 'title', 'content', 'status', 'category_id'];

	public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'article_tag');
    }

}
