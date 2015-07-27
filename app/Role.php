<?php namespace App;

use Zizaco\Entrust\EntrustRole;
use Dick\CRUD\CrudTrait;

class Role extends EntrustRole
{
    use CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'description'];

	public function permissions()
    {
        return $this->belongsToMany(\Config::get('entrust.permission'), 'permission_role');
    }
}