<?php

class Player extends \Eloquent {

	protected $fillable = ['user_id'];

	public $timestamps = false;

	protected $maxSkills = 5;

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function skillsInRange($skill)
	{
		return $skill <= $this->maxSkills && $skill >= 0;
	}
}