<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

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

    public function parent_name()
    {
    	return $this->parent->name;
    }

}
