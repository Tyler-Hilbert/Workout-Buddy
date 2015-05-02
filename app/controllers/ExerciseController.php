<?php

class ExerciseController extends \BaseController {

	public function create()
	{
		return View::make('exercise');
	}

	public function store() {
		$rules = array(
	        'exercise'			=> 'required',                
	    );

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails()) {
	        $messages = $validator->messages();
	        return Redirect::to('exersie')
	        	->withErrors($validator)
	        	->withInput();
	    } else {
		    $exercise = new exercise();
			$exercise->exercise = Input::get('exercise');
			$exercise->save();
			return Redirect::route('home');
	    }
	}
}
