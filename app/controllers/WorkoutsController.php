<?php

class WorkoutsController extends \BaseController {

	public function create()
	{
		return View::make('workout');
	}

	public function store() {
		$rules = array(
	        'workout_date'		=> 'required',   
	        'weight'			=> 'required',        
	        'reps'				=> 'required', 
	        'exercise'			=> 'required', 
	        'athlete_id'		=> 'required',         
	    );

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails()) {
	    	$messages = $validator->messages();

	        return Redirect::to('workout')
	        	->withErrors($validator)
	        	->withInput();
	    } else {
		    $workout = new Workout();
			$workout->workout_date = Input::get('workout_date');
			$workout->weight = Input::get('weight');
			$workout->reps = Input::get('reps');
			$workout->exercise = Input::get('exercise');
			$workout->athlete_id = Input::get('athlete_id');
			$workout->save();

			return Redirect::route('home');
	    }
	}
}
