<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends BaseModel {
	protected $table = 'languages';

	protected $fillable = ['name', 'flag', 'abbr', 'active', 'default'];

	public $timestamps = false;
}
