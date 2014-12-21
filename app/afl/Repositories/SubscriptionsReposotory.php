<?php namespace AFL\Repositories;

use Subscription;

class SubscriptionsReposotory {

	private $subscription;

	public function __construct(Subscription $subscription)
	{
		$this->subscription = $subscription;
	}

	public function findSubscriptionById($id)
	{
		return $this->subscription->findOrFail($id);
	}

	/**
	 * returns all player's subscriptions
	 * @param  int $playerId 
	 * @return subscriptions collection           
	 */
	public function getAllPlayersSubscriptions($playerId)
	{
		
		$subscriptions = $this->subscription->where('player_id', '=', $playerId)->get();

		$subscriptions->load('match');

		foreach ($subscriptions as $subscription) {
			$subscription['match']->load('matchType');
		}

		return $subscriptions;
	}

	/**
	 * Creates new subscription
	 * 
	 * @param array $data 
	 * @return subscription
	 */
	public function subscribe($data)
	{
		return $this->subscription->create($data);
	}
}