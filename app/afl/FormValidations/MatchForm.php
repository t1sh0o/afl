<?php namespace AFL\FormValidations;

use Laracasts\Validation\FormValidator;

class MatchForm extends FormValidator {

	/**
	 * Validation rules for registration form
	 * @var array
	 */
	public $rules = [
		'location' => 'required',
		'date' => 'required',
		'match_type_id' => 'required'
	];

}