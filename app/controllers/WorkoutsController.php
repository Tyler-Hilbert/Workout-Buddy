<?php

class WorkoutsController extends \BaseController {

	public function create()
	{
		return View::make('workout');
	}

	public function store() {
		$rules = array(
	        'workout_date'		=> 'required',   
	        'athlete_id'		=> 'required',         
	    );

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails()) {
	        return Redirect::to('workout')
	        	->withErrors($validator)
	        	->withInput();
	    } else {

	    	$input = Input::except('_token');
	    	$date = Input::get('workout_date');
	    	$athlete = Input::get('athlete_id');
	    	

	    	$workouts = array(array()); // format : [workout-exercise-number][exercise]


			$cols = array("weight", "reps", "exercise"); // The columns in the workout table that you want to pull data for

			// Populate workouts
			foreach ($input as $key => $value) {
				foreach ($cols as $col) {
					if(strpos($key, $col) !== FALSE) {
						$index = substr($key, strlen($col)); 
						$workouts[$index][$col] = $value;
						break;
					}
				}
			}

			// Run validation check
			foreach ($workouts as $key => $value) {
				foreach ($cols as $col) {
					$rules[$col . $key] = 'required';
				}
			}

			$validator = Validator::make(Input::all(), $rules);

			if ($validator->fails()) {
				return Redirect::to('workout')->withInput();
			}


			// Save records
			foreach($workouts as $workoutRecord) {
				$workout = new Workout();
				$workout->workout_date = $date;
			   	$workout->athlete_id = $athlete;
			   	$workout->weight = $workoutRecord['weight'];
			   	$workout->reps = $workoutRecord['reps'];
			   	$workout->exercise = $workoutRecord['exercise'];
			   	$workout->save();
			}



			return Redirect::route('home');
		}

	}
}
