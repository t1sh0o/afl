<?php

use AFL\FormValidations\RegistrationForm;
use AFL\Services\RegistrationService;

class RegistrationController extends \BaseController {

	/** 
	* @var RegistrationForm
	*/
	private $registrationForm;
	
	private $registrationService;

	public function __construct(RegistrationForm $registrationForm, RegistrationService $registrationService)
	{
		$this->registrationForm = $registrationForm;
	
		$this->registrationService = $registrationService;

		$this->beforeFilter('guest');
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

		$this->registrationService->register($userData);
		
		return Redirect::home();
	}
}