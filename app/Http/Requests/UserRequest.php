<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends CrudRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		// only allow creates if the user is logged in
		return \Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|min:3|max:255',
			'email' => 'required|email|min:3|max:255',
		];
	}

}
