<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App;

class AdminController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');

		// Check for the right roles to access these pages
		if (!\Entrust::hasRole(['admin', 'superadmin'])) {
	        abort(403, 'Unauthorized access - you do not have the necessary role to see this page.');
	    }
	}

	public function index()
	{
		// \Alert::add('error', 'Your message has NOT been sent.');
		return view("admin/dashboard", $this->data);
	}
}
