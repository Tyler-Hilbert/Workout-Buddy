<?php

class CalcController extends \BaseController {
	public function show()
	{
		$athleteId = Input::get('athlete');
		$workoutId = Input::get('workout');
		$workout = Workout::where('workout', $workoutId)->where('athlete_id', $athleteId)->first();

		$reps = $workout->reps;
		$weight = $workout->weight;
		return $weight / (1.0278-(.0278*$reps));
	}

}
