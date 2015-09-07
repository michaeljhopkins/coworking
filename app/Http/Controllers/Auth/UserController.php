<?php namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use App\User as User;

class UserController extends Controller {

	/**
	 * Make sure the user is logged in.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('dashboard');
	}

	public function getChangePassword()
	{
		return view('auth/change_password', $this->data);
	}

	public function postChangePassword(Request $request)
	{
		if (!\Auth::validate(['email' => \Auth::user()->email,
							'password' => $request->input('old_password')]))
		{
		    \Alert::error(trans('auth.wrong_password'))->flash();
		    return redirect()->back();
		}

		// validation
		$validator = \Validator::make($request->all(), [
				'old_password' => 'required',
				'new_password' => 'required|confirmed|min:6',
			]);

		if ($validator->fails())
		{
		    // The given data did not pass validation
		    return redirect()->back()->withInput()->withErrors($validator->errors());
		}

		// change the password
		$user = User::findOrFail(\Auth::user()->id);
		$user->password = bcrypt($request->input('new_password'));
		$user->save();

		// set a success/error message
		\Alert::success(trans('auth.password_updated'))->flash();

		// redirect to the change password page
		return redirect()->back();
	}

	public function getAccountInfo()
	{
		$this->data['user'] = \Auth::user();

		return view('auth/account_info', $this->data);
	}

	public function postAccountInfo(Request $request)
	{
		// validate the name
		$validation_rules["name"] = "required|min:5";

		// if the email has changed, validate that too
		if (\Auth::user()->email != $request->input('email')) {
			$validation_rules["email"] = "required|email|min:5|unique:users";
		}

		$validator = \Validator::make($request->all(), $validation_rules);

		if ($validator->fails())
		{
		    // The given data did not pass validation
		    return redirect()->back()->withInput()->withErrors($validator->errors());
		}

		// update the info
		$user = User::findOrFail(\Auth::user()->id);
		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->save();

		// set a success/error message
		\Alert::success(trans('auth.information_updated'))->flash();

		// redirect to the edit personal info page
		return redirect()->back();
	}

}
