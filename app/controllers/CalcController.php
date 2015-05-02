<?php

header('Content-Type: application/json');

class CalcController extends \BaseController {
	public function show()
	{
		$athleteId = Input::get('athlete');
		$workouts = array();

		foreach (Exercise::lists('id') as $exerciseId) {
			$wk = Workout::where('exercise', $exerciseId)
							->where('athlete_id', $athleteId)
							->orderBy('workout_date', 'desc')
							->first();
			if (!is_null($wk)) {
				$exercise = array();
				$exercise['reps'] = $wk->reps;
				$exercise['weight'] = $wk->weight;
				$key = Exercise::where('id', $exerciseId)->first()->exercise;
				$workout[$key] = $exercise;
			}
		}
		return json_encode($workout);
	}

}
