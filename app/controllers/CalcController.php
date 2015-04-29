<?php

header('Content-Type: application/json');

class CalcController extends \BaseController {
	public function show()
	{
		$athleteId = Input::get('athlete');
		$workouts = array();

		foreach (WorkoutName::lists('id') as $workoutId) {
			$wk = Workout::where('workout', $workoutId)
							->where('athlete_id', $athleteId)
							->orderBy('workout_date', 'desc')
							->first();
							
			$workout = array();
			$workout['reps'] = $wk->reps;
			$workout['weight'] = $wk->weight;
			$key = WorkoutName::where('id', $workoutId)->first()->workout;
			$workouts[$key] = $workout;
		}
		return json_encode($workouts);
	}

}
