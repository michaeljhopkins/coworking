<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dick\CRUD\CrudTrait;

class MenuItem extends Model {

	use CrudTrait;

	protected $table = 'menu_items';
	protected $fillable = ['name', 'type', 'link', 'page_id', 'parent_id'];

	public function parent()
    {
        return $this->belongsTo('App\Models\MenuItem', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\MenuItem');
    }

    public function page()
    {
        return $this->belongsTo('App\Models\Page', 'page_id');
    }

    public function url() {
        switch ($this->type) {
            case 'external_link':
                return $this->link;
                break;

            case 'internal_link':
                return url($this->link);
                break;

            default: //page_link
                return url($this->page->slug);
                break;
        }
    }

}
