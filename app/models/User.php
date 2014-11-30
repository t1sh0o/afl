<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * Mass assigned variables
	 * 
	 * @var array
	 */
	protected $fillable = array('username', 'password');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * Save the password attribute hashed
	 * 
	 * @param string $password 
	 */
	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	/**
	 * Return if the user has administration rights
	 * 
	 * @return bool
	 */
	public function isAdmin()
	{
		return $this->is_admin;
	}

	public function player()
	{
		return $this->hasOne('Player');
	}

	public function isSubscribedFor($matchId)
	{
		return Subscription::where('match_id', $matchId)->where('player_id', $this->id)->get()->toArray() ? true : false;
	}
}
