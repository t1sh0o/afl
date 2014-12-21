<?php namespace AFL\Services;

use AFL\Repositories\PlayersRepository;
use User, Auth, Flash;

Class RegistrationService {

	protected $playersRepository;

	public function __construct(PlayersRepository $playersRepository)
	{
		$this->playersRepository = $playersRepository;
	}

	public function register($data)
	{		
		$user = User::create($data);

		$this->playersRepository->createNewPlayer($user['id']);

		Auth::login($user);

		Flash::success('You have successfully registered in AFL site.<br/> Now you can subscribe to play with us.');
	}

}