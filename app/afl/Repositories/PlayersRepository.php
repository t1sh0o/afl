<?php namespace AFL\Repositories;

use Player;

class PlayersRepository {

	private $player;

	public function __construct(Player $player)
	{
		$this->player = $player;
	}

	/**
	 * returns the player's id by user's id
	 * 
	 * @param  int $userId user's id
	 * @return int         player's id
	 */
	public function getPlayerIdByUserId($userId)
	{
		$player = $this->player->where('user_id', $userId)->get()->first()->toArray();

		return $player['id'];
	}

	/**
	 * Creates new player
	 * 
	 * @param int $userId 
	 * @return player
	 */
	public function createNewPlayer($userId)
	{
		return $this->player->create(['user_id' => $userId]);
	}

	public function getAllPlayersWithUsernames()
	{
		return $this->player->all()->load('user')->toArray();
	}

	public function getPlayer($id)
	{
		return $this->player->findOrFail($id);
	}
}

