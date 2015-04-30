<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $table = 'articles';
	protected $fillable = ['slug', 'title', 'content', 'category_id'];

	public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

}
