<?php

class WorkoutsController extends \BaseController {

	public function create()
	{
		return View::make('workout');
	}

	public function store() {
		$workout = new Workout();
		$workout->workout_date = Input::get('workout_date');
		$workout->weight = Input::get('weight');
		$workout->reps = Input::get('reps');
		$workout->workout = Input::get('workout');
		$workout->athlete_id = Input::get('athlete_id');
		$workout->save();

		return Redirect::route('home');
	}
}
