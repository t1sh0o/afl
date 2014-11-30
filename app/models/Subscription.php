<?php

class Subscription extends \Eloquent {

	protected $fillable = ['match_id', 'player_id'];

	public $timestamps = false;

	public function match()
	{
		return $this->hasOne('Match', 'id', 'match_id');
	}

	public function player()
	{
		return $this->hasOne('Player');
	}

}