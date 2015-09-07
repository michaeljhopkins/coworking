<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dick\CRUD\CrudTrait;

class Language extends Model {

	use CrudTrait;

	protected $table = 'languages';

	protected $fillable = ['name', 'flag', 'abbr', 'active', 'default'];

	public $timestamps = false;
}
