<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CrudController;

use Illuminate\Http\Request;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SettingRequest as StoreRequest;
use App\Http\Requests\SettingRequest as UpdateRequest;

class SettingCrudController extends CrudController {

	public $crud = array(
						"model" => "App\Models\Setting",
						"entity_name" => "setting",
						"entity_name_plural" => "settings",
						"route" => "admin/setting",

						"view_table_permission" => true,
						"add_permission" => false,
						"edit_permission" => true,
						"delete_permission" => false,

						"reorder" => false,
						"reorder_label" => "name",

						// *****
						// COLUMNS
						// *****
						"columns" => [
											[
												'name' => 'name',
												'label' => "Name"
											],
											[
												'name' => 'name',
												'label' => "Value"
											],
									],


						// *****
						// FIELDS
						// *****
						"fields" => [
												[
													'name' => 'name',
													'label' => 'Name',
													'type' => 'text',
													'placeholder' => 'Your category name here'
												],
											],
						);

	public function store(StoreRequest $request)
	{
		return parent::store_crud();
	}

	public function update(UpdateRequest $request)
	{
		return parent::update_crud();
	}
}
