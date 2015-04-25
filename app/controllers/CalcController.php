<?php

class CalcController extends \BaseController {
	public function show()
	{
		$workout = Workout::first();
		$reps = 10;
		$weight = $workout->weight;
		return $weight * (1 + ($reps / 30));
	}

}
