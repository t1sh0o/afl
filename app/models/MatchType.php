<?php

class MatchType extends \Eloquent {

	protected $fillable = ['match_type', 'max_players'];

	public $timestamps = false;

	public function match()
	{
		return $this->belongsTo('Match', 'match_type_id');
	}

}