<?php

class SubscriptionController extends \BaseController {

	private $subscription;

	public function __construct(Subscription $subscription)
	{
		$this->subscription = $subscription;

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
		$player_id = $this->getPlayersId(Auth::user()->id);

		$subscriptions = $this->subscription->where('player_id', '=', $player_id)->get();

		$subscriptions->load('match');

		foreach ($subscriptions as $subscription) {
			$subscription['match']->load('matchType');
		}

		return View::make('user.subscriptions')->withSubscriptions($subscriptions);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /subscription/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /subscription
	 *
	 * @return Response
	 */
	public function store($match_id, $user_id)
	{
		$player_id = $this->getPlayersId($user_id);

		$subscriptionData = compact('match_id', 'player_id');
		
		$this->subscription->create($subscriptionData);

		return Redirect::route('subsciptions_path');
	}

	/**
	 * Display the specified resource.
	 * GET /subscription/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /subscription/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /subscription/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
		$subs = $this->subscription->findOrFail($id);

		if($subs->delete($id)) {
			Flash::message('You will not be counted for this match!');

			return Redirect::back();
		}

		return 'not ok' . $id;
	}

	public function getPlayersId($userId)
	{
		$player = Player::where('user_id', $userId)->first();

		return $player['id'];
	}

}