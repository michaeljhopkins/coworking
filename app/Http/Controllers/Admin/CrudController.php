<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CrudController extends Controller {

	public $model = "\App\Models\Entity";
	public $crud = array(
						"entity_name" => "entry",
						"entity_name_plural" => "entries"
						);

	/**
	 * Display all rows in the database for this entity.
	 *
	 * @return Response
	 */
	public function crudTable()
	{
		// get all results for that entity
		$model = $this->model;
		$this->data['entries'] = $model::all();

		$this->_prepare_columns(); // checks that the columns are defined and makes sure the response is proper

		$this->data['crud'] = $this->crud;
		return view('crud/list', $this->data);
	}

	/**
	 * Show the form for creating inserting a new row.
	 *
	 * @return Response
	 */
	public function crudCreate()
	{
		// TODO: get the fields you need to show

		return view('crud/create', $this->data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function crudStore()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function crudPreview($id)
	{
		// get the info for that entry
		$model = $this->model;
		$this->data['entry'] = $model::find($id);

		return view('crud/show', $this->data);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function crudEdit($id)
	{
		// get the info for that entry
		$model = $this->model;
		$this->data['entry'] = $model::find($id);

		return view('crud/edit', $this->data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function crudUpdate($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function crudDelete($id)
	{
		//
	}


	/**
	 * ALIASES
	 *
	 * Used to make the CRUD Entity Controller work even if no methods are defined.
	 * Respects the Laravel resource url convention.
	 */
	public function index() 		{ return $this->crudTable(); }
	public function create()		{ return $this->crudCreate(); }
	public function store()			{ return $this->crudStore(); }
	public function show()			{ return $this->crudPreview(); }
	public function edit()			{ return $this->crudEdit(); }
	public function update()		{ return $this->crudUpdate(); }
	public function destroy()		{ return $this->crudDelete(); }



	/**
	 * COMMODITY FUNCTIONS
	 */

	// If it's not an array of array and it's a simple array, create a proper array of arrays for it
	public function _prepare_columns()
	{
		// if the columns aren't set, we can't show this page
		// TODO: instead of dying, show the columns defined as visible on the model
		if (!isset($this->crud['columns']))
		{
			abort(500, "CRUD columns are not defined.");
		}

		// if columns are defined as a string, transform them to a proper array
		if (!is_array($this->crud['columns']))
		{
			$current_columns_array = explode(",", $this->crud['columns']);
			$proper_columns_array = array();

			foreach ($current_columns_array as $key => $col) {
				$proper_columns_array[] = [
								'name' => $col,
								'title' => ucfirst($col) //TODO: also replace _ with space
							];
			}

			$this->crud['columns'] = $proper_columns_array;
		}
	}

}
