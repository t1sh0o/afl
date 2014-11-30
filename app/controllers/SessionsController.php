<?php

use AFL\FormValidations\LoginForm;

class SessionsController extends \BaseController {

	private $loginFrom;

	public function __construct(LoginForm $loginFrom)
	{
		$this->loginFrom = $loginFrom;
	
		$this->beforeFilter('guest', ['except' => 'destroy']);
	}

	/**
	 * Show the form for login.
	 *
	 * @return view
	 */
	public function create()
	{
	 	return View::make('login');
	}


	/**
	 * Log an user in
	 *
	 * @return view
	 */
	public function store()
	{
		$userData = Input::only('username', 'password');

		$this->loginFrom->validate($userData);

		if ( ! Auth::attempt($userData)) {
			
			Flash::error('Invalid credentials. Please try again.');

			return Redirect::back()->withInput();
		}
		
		Flash::success('Welcome back ' . $userData['username'] . '!');
			
		return Redirect::intended('/');
	}

	/**
	 * Log an user out.
	 *
	 * @return mixed
	 */
	public function destroy()
	{
		Auth::logout();

		Flash::message('Bye bye!!!');

		return Redirect::home();
	}


}
