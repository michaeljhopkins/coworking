<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Dick\CRUD\Http\Controllers\CrudController;

use Illuminate\Http\Request;

// VALIDATION: change the requests to match your own file names if you need form validation
use Dick\CRUD\Http\Requests\CrudRequest as StoreRequest;
use Dick\CRUD\Http\Requests\CrudRequest as UpdateRequest;

class MenuItemCrudController extends CrudController {

	public $crud = array(
						"model" => "App\Models\MenuItem",
						"entity_name" => "menu item",
						"entity_name_plural" => "menu items",
						"route" => "admin/menu-item",
						"reorder" => true,
						"reorder_label" => "name",

						// *****
						// COLUMNS
						// *****
						//
						// Define the columns for the table view as an array:
						//
						"columns" => [
											[
												'name' => 'name',
												'label' => "Menu item text"
											],
											[
												'label' => "Parent",
												'type' => 'select',
												'name' => 'parent_id',
												'entity' => 'parent',
												'attribute' => 'name',
												'model' => "App\Models\MenuItem"
											],
									],

						// *****
						// FIELDS
						// *****
						//
						// Define both create_fields and update_fields in one array:
						//
						"fields" => [
											[
												'name' => 'name',
												'label' => "Menu item text"
											],
											[
												'label' => "Parent",
												'type' => 'select',
												'name' => 'parent_id',
												'entity' => 'parent',
												'attribute' => 'name',
												'model' => "App\Models\MenuItem"
											],
											[
											    'name' => 'type',
											    'label' => "Type",
											    'type' => 'page_or_link'
											],
									],
						);

	public function store(StoreRequest $request)
	{
		return parent::storeCrud();
	}

	public function update(UpdateRequest $request)
	{
		return parent::updateCrud();
	}
}
