<?php

class TimedExerciseController extends \BaseController {

	public function create()
	{
		return View::make('timed_exercise');
	}

	public function store() {
		$rules = array(
	        'exercise'				=> 'required',  
	        'time'					=> 'required',              
	    );

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails()) {
	        $messages = $validator->messages();
	        return Redirect::to('timed_exersie')
	        	->withErrors($validator)
	        	->withInput();
	    } else {
		    $te = new TimedExercise();
			$te->exercise = Input::get('exercise');
			$te->time = Input::get("time");
			$te->save();

			$exercise = array('exercise' => $te->exercise, 'time' => $te->time);
			return json_encode($exercise);
	    }
	}
}
