<?php

class PlayersController extends \BaseController {

	public $player;

	public function __construct(Player $player)
	{
		$this->player = $player;
	}

	/**
	 * Get all users from the database
	 * 		
	 * @return view
	 */
	public function index()
	{
		$users = User::all();

		$users->load('player');

		return View::make('admin.users')->withUsers($users);
	}

	public function increaseSkills($id)
	{
		$player = $this->player->findOrFail($id);

		$player->skill++;

		$player->save();

		return Redirect::route('players_path');
	}


	public function decreaseSkills($id)
	{
		$player = $this->player->findOrFail($id);

		$player->skill--;

		$player->save();

		return Redirect::route('players_path');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /players/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /players
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /players/{id}
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
	 * GET /players/{id}/edit
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
	 * PUT /players/{id}
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
	 * DELETE /players/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}