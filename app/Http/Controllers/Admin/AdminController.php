<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		// \Alert::add('error', 'Your message has NOT been sent.');
		return view("admin/dashboard", $this->data);
	}
}
