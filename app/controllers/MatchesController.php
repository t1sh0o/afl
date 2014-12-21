<?php

use AFL\FormValidations\MatchForm;
use AFL\Repositories\MatchesRepository;

class MatchesController extends \BaseController {

	/** 
	* @var MatchForm
	*/
	private $matchForm;

	private $repository;
	
	public function __construct(MatchForm $matchForm, MatchesRepository $repository)
	{
		$this->matchForm = $matchForm;

		$this->repository = $repository;
	
		$this->beforeFilter('auth');
	}

	/**
	 * Display all matches.
	 *
	 * @return Response
	 */
	public function index()
	{
		$matchTypes = $this->repository->getAllMatchTypes();

		$matches = $this->repository->getAllMatchesWithTypes();

		return View::make('matches.index', compact('matches', 'matchTypes'));
	}

	/**
	 * Store a newly created match in the database
	 *
	 * @return Response
	 */
	public function store()
	{
		$matchData = Input::only('location', 'date');
		$matchData['match_type_id'] = Input::get('id');

		$this->matchForm->validate($matchData);

		$match = $this->repository->createMatch($matchData);

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
		$match = $this->repository->getMatchWithMatchType($id);

		$players = $this->repository->getSubscribedPlayers($id);

		return View::make('matches.show', compact('match', 'players', 'subscription'));
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
		$match = $this->repository->getMatch($id);

		if ($match->delete($id)) {
			Flash::success('Match was deleted');

			return Redirect::back(); 	
		}
	}

}