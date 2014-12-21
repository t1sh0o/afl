<?php

use AFL\FormValidations\MatchForm;

class MatchesController extends \BaseController {

	/** 
	* @var MatchForm
	*/
	private $matchForm;
	
	public function __construct(MatchForm $matchForm)
	{
		$this->matchForm = $matchForm;
	
		$this->beforeFilter('auth');
	}

	/**
	 * Display all matches.
	 *
	 * @return Response
	 */
	public function index()
	{
		$matchTypes = MatchType::all()->toArray();

		foreach ($matchTypes as $matchType) {
			$types[$matchType['id']] = $matchType['match_type'];
		}

		$matches = Match::all();

		$matches->load('matchType');

		return View::make('matches', ['matches' => $matches, 'matchTypes' => $types]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /matches/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created match in the database
	 *
	 * @return Response
	 */
	public function store()
	{
		$matchData = Input::only('match_type_id', 'location', 'date');

		$this->matchForm->validate($matchData);

		$match = Match::create($matchData);

		Flash::success('New match was created!');

		return Redirect::refresh();
	}

	/**
	 * Display the specified resource.
	 * GET /matches/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$match = Match::findOrFail($id);

		$match->load('matchType');

		$players = $this->getSubscribedPlayers($id);

		return View::make('matches.show', compact('match', 'players'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /matches/{id}/edit
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
	 * PUT /matches/{id}
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
	 * DELETE /matches/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$match = Match::findOrFail($id);

		if ($match->delete($id)) {
			Flash::success('Match was deleted');

			return Redirect::back(); 	
		}
	}

	public function getSubscribedPlayers($matchId)
	{
		$subscriptions = Subscription::where('match_id', $matchId)->get();

		if( ! $subscriptions->toArray()) {
			return null;
		}

		$players = $subscriptions->load('player');	

		$player_ids = [];

		foreach ($players as $player) {
			array_push($player_ids, $player['player']['user_id']);
		}

		return User::whereIn('id',  $player_ids)->get();
	}

}