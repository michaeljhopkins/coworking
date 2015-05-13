<?php namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
	/**
	 * Since this class does not extend BaseModel, we need to define isColumnNullable() on this model, too.
	 */
	public static function isColumnNullable($column_name) {
        $instance = new static; // create an instance of the model to be able to get the table name
        $answer = DB::select( DB::raw("SELECT IS_NULLABLE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='".$instance->getTable()."' AND COLUMN_NAME='".$column_name."' AND table_schema='".env('DB_DATABASE')."'") )[0];

        return ($answer->IS_NULLABLE == 'YES');
    }
}