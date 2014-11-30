<?php

class PagesController extends \BaseController {

	/**
	 * Display home page.
	 *
	 * @return Response
	 */
	public function home()
	{
		return View::make('pages.home');
	}

}
