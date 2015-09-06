<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dick\CRUD\CrudTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Page extends Model implements SluggableInterface {

	use CrudTrait;
	use SluggableTrait;

	protected $table = 'pages';
	protected $fillable = ['name', 'slug', 'content', 'extras', 'template'];
	protected $sluggable = [
        'build_from' => 'slug_or_name',
        'save_to'    => 'slug',
        'on_update'  => true,
        'unique'	 => true
    ];

    // The slug is created automatically from the "name" field if no slug exists.
    public function getSlugOrNameAttribute() {
    	if ($this->slug!='') return $this->slug;
    	return $this->name;
    }

}
