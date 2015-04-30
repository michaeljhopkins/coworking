<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $table = 'articles';
	protected $fillable = ['slug', 'title', 'content'];

	public function category()
    {
        return $this->belongsTo('App\Models\Category', 'id');
    }

}
