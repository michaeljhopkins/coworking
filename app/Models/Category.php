<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel {

	protected $table = 'categories';
	protected $fillable = ['name', 'parent_id'];

	public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category');
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

}
