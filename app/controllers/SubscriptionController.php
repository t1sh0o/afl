<?php

use AFL\Repositories\SubscriptionsReposotory;
use AFL\Repositories\PlayersRepository;


class SubscriptionController extends \BaseController {

	/**	
	 * @var Subscritions repository
	 */
	private $repository;
	
	public function __construct(SubscriptionsReposotory $repository)
	{
		$this->repository = $repository;

		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 * GET /subscription
	 *
	 * @return Response
	 */
	public function index()
	{
		$playerId = $this->getPlayerId(Auth::user()->id);
	
		$subscriptions = $this->repository->getAllPlayersSubscriptions($playerId);

		return View::make('user.subscriptions')->withSubscriptions($subscriptions);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /subscription
	 *
	 * @return Response
	 */
	public function store($matchId, $userId)
	{
		$playerId = $this->getPlayerId($userId);

		$subscriptionData = ['match_id' => $matchId, 'player_id' => $playerId];
		
		$this->repository->subscribe($subscriptionData);

		return Redirect::route('subsciptions_path');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /subscription/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$subs = $this->repository->findSubscriptionById($id);

		if($subs->delete($id)) {
			Flash::message('You will not be counted for this match!');

			return Redirect::back();
		}
		
		Flash::error('We were unable to unsubscribe you!');

		return Redirect::back();
	}


	/**
	 * returns players Id 
	 * 
	 * @param  int $userId 
	 * @return int         
	 */
	private function getPlayerId($userId)
	{
		$playersRepository = new PlayersRepository(new Player());

		return $playersRepository->getPlayerIdByUserId($userId);
	}

}