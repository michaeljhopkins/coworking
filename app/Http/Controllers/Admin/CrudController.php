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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all results for that entity
		$model = $this->model;
		$this->data['entries'] = $model::all();

		// TODO: populate the datatable with real information
		return view('crud/list', $this->data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// TODO: get the fields you need to show

		return view('crud/create', $this->data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
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
	public function edit($id)
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
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
