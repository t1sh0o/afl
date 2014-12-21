<?php namespace AFL\Repositories;

use Match, MatchType, Subscription, User;

class MatchesRepository {

	private $match;

	public function __construct(Match $match)
	{
		$this->match = $match;
	}

	public function getAllMatchesWithTypes()
	{
		$matches = $this->match->all();

		return $matches->load('matchType');
	}

	public function getMatch($id)
	{
		return $this->match->findOrFail($id);
	}

	public function getMatchWithMatchType($id)
	{
		$match = $this->match->findOrFail($id);
	
		return $match->load('matchType');
	}	

	public function createMatch($data)
	{
		return $this->match->create($data);
	}

	public function getAllMatchTypes()
	{
		return MatchType::lists('match_type', 'id');
	}


	public function getSubscribedPlayers($matchId)
	{
		$subscriptions = Subscription::where('match_id', $matchId)->get(['player_id']);
		
		if( ! $subscriptions->toArray()) {
			return null;
		}

		$players = $subscriptions->load('player');	

		$player_ids = [];

		foreach ($players as $player) {
			$player_ids[] += $player['player']['user_id'];
		}

		return User::whereIn('id',  $player_ids)->get();
	}

}

