<?php

use AFL\Repositories\PlayersRepository;

class PlayersController extends \BaseController {

	public $repository;

	public function __construct(Player $player, PlayersRepository $playersRepository)
	{
		$this->repository = $playersRepository;

		$this->beforeFilter('auth');
		$this->beforeFilter('admin');
	}

	/**
	 * Get all users from the database
	 * 		
	 * @return view
	 */
	public function index()
	{
		$players = $this->repository->getAllPlayersWithUsernames();
		
		return View::make('admin.players')->withPlayers($players);
	}

	/**
	 * Update player with $id with passed $skill
	 * @param int $id 
	 * @param int $skill 
	 * @return view
	 */
	public function update($id, $skill)
	{
		$player = $this->repository->getPlayer($id);

		$player->skill += $skill;

		if ($player->skillsInRange($player->skill)) {
			$player->save();
		}		

		return Redirect::route('players_path');
	}

}