<?php

class SecondaryMuscleController extends \BaseController {

	public function create()
	{
		return View::make('secondarymuscle');
	}

	public function store() {
		$rules = array(
	        'secondary_muscle'			=> 'required',        
	        'major_muscle' 				=> 'required'         
	    );

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails()) {
	        return Redirect::to('SecondaryMuscle');
	    } else {
		    $secondaryMuscle = new SecondaryMuscle();
			$secondaryMuscle->name = Input::get('secondary_muscle');
			$secondaryMuscle->major = Input::get('major_muscle');
			$secondaryMuscle->save();
			return Redirect::route('home');
	    }
	}
}
