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

	public function __construct()
	{
		$this->data['crud'] = $this->crud;
	}

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

		$this->_validate_columns(); //TODO

		// show only the chosen columns
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

	// TODO: check the columns definition.
	// If it's not an array of array and it's a simple array, create a proper array of arrays for it
	public function _validate_columns()
	{
		//
	}

}
