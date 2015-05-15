<?php

class ExerciseController extends \BaseController {

	public function create()
	{
		return View::make('exercise');
	}

	public function store() {
		$rules = array(
	        'exercise'					=> 'required', 
	        'major_muscle'				=> 'required',            
	    );

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails()) {
	        $messages = $validator->messages();
	        return Redirect::to('exercise')
	        	->withErrors($validator)
	        	->withInput();
	    } else {
		    $exercise = new Exercise();
			$exercise->exercise = Input::get('exercise');
			$exercise->major_muscle = Input::get('major_muscle');
			$exercise->secondary_muscle = Input::get('secondary_muscle');
			$exercise->save();
			return Redirect::route('home');
	    }
	}
}
