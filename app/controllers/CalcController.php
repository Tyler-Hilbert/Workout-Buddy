<?php

class CalcController extends \BaseController {

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return "D";
		$workout = Workout::first();
		$reps = 10;
		$weight = $workout->weight;

		return $weight * (1 + ($reps / 30));
	}


}
