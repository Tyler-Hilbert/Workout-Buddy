<?php

header('Content-Type: application/json');

class CalcController extends \BaseController {
	public function show()
	{
		$athleteId = Input::get('athlete');
		$date = Input::get('date');

		foreach (Exercise::lists('id') as $exerciseId) {
			$wk = Workout::where('exercise', $exerciseId)
							->where('athlete_id', $athleteId)
							->where('workout_date', '<=', $date)
							->orderBy('workout_date', 'desc')
							->first();
			if (!is_null($wk)) {
				$exercise = array();
				$exercise['reps'] = $wk->reps;
				$exercise['weight'] = $wk->weight;
				$exercise['date'] = $wk->workout_date;
				$key = Exercise::where('id', $exerciseId)->first()->exercise;
				$workout[$key] = $exercise;
			}
		}
		if (!empty($workout)) {
			return json_encode($workout);
		} else {
			return;
		}
	}

}
