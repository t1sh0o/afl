<?php

class Match extends \Eloquent {

	protected $fillable = ['date', 'match_type_id', 'location'];

	public $timestamps = false;

	public function matchType()
	{
		return $this->hasOne('MatchType', 'id', 'match_type_id');
	}

	public function subscription()
	{
		return $this->hasMany('Subscription');
	}
}