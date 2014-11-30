<?php

use AFL\FormValidations\RegistrationForm;

class RegistrationController extends \BaseController {

	/** 
	* @var RegistrationForm
	*/
	private $registrationForm;
	
	public function __construct(RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;
	
		$this->beforeFilter('guest', ['except' => 'index']);
	}

	/**
	 * Get all users from the database
	 * 		
	 * @return view
	 */
	public function index()
	{
		$users = User::all();

		$users->load('player');

		return View::make('admin.users')->withUsers($users);
	}

	/**
	* Show the form for registering a new user
	* GET /registration/create
	*
	* @return Response
	*/
	public function create()
	{
		return View::make('registration');
	}

	/**
	* Store a newly created user in the database
	* POST /registration
	*
	* @return Response
	*/
	public function store()
	{
		$userData = Input::only('username', 'password');

		$this->registrationForm->validate($userData);

		$user = User::create($userData);

		$player = Player::create(['user_id' => $user['id']]);

		Auth::login($user);

		Flash::success('You have successfully registered in AFL site.<br/> Now you can subscribe to play with us.');

		return Redirect::home();
	}
}