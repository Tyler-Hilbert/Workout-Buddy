<?php

class CalcController extends \BaseController {
	public function show()
	{
		$workout = Workout::first();
		$reps = $workout->reps;
		$weight = $workout->weight;
		return $weight / (1.0278-(.0278*$reps));
	}

}
