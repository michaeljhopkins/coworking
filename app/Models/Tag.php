<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends BaseModel {

	protected $table = 'tags';
	protected $fillable = ['name'];

    public function articles()
    {
        return $this->hasMany('App\Models\Article', 'articles_tags');
    }

}
