<?php

class AthletesController extends \BaseController {

	public function create()
	{
		return View::make('athlete');
	}

	public function store() {
		$athlete = new Athlete();
		$athlete->firstname = Input::get('firstname');
		$athlete->lastname = Input::get('lastname');
		$athlete->save();

		return Redirect::route('home');
	}
}
