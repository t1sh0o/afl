<?php namespace AFL\FormValidations;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator {

	/**
	 * Validation rules for registration form
	 * @var array
	 */
	public $rules = [
		'username' => 'required|unique:users',
		'password' => 'required|min:5'
	];

}