<?php

class Player extends \Eloquent {

	protected $fillable = ['user_id'];

	public $timestamps = false;

	public function user()
	{
		return $this->belongsTo('User');
	}
}