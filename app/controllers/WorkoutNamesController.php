<?php

class WorkoutNamesController extends \BaseController {

	public function create()
	{
		return View::make('workout_name');
	}

	public function store() {
		$rules = array(
	        'workout'			=> 'required',                
	    );

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails()) {
	        $messages = $validator->messages();
	        return Redirect::to('workout')
	        	->withErrors($validator)
	        	->withInput();
	    } else {
		    $workoutName = new WorkoutName();
			$workoutName->workout = Input::get('workout');
			$workoutName->save();
			return Redirect::route('home');
	    }
	}
}
