<?php namespace AFL\FormValidations;

use Laracasts\Validation\FormValidator;

class LoginForm extends FormValidator {

	/**
	 * Validation rules for registration form
	 * @var array
	 */
	public $rules = [
		'username' => 'required',
		'password' => 'required'
	];

}