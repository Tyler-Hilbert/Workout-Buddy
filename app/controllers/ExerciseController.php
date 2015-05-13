<?php

class ExerciseController extends \BaseController {

	public function create()
	{
		return View::make('exercise');
	}

	public function store() {
		$rules = array(
	        'exercise'			=> 'required', 
	        'primary'			=> 'required',
	        'secondary'			=> 'required'               
	    );

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails()) {
	        $messages = $validator->messages();
	        return Redirect::to('exercise')
	        	->withErrors($validator)
	        	->withInput();
	    } else {
		    $exercise = new exercise();
			$exercise->exercise = Input::get('exercise');
			$exercise->primary_muscle = Input::get('primary');
			$exercise->secondary_muscle = Input::get('secondary');
			$exercise->save();
			return Redirect::route('home');
	    }
	}
}
