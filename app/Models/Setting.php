<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dick\CRUD\CrudTrait;

class Setting extends Model {

	use CrudTrait;

	protected $table = 'settings';
	protected $fillable = ['value'];

}
