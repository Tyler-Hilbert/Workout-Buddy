<?php

class AthletesController extends \BaseController {

	public function create()
	{
		return View::make('athlete');
	}

	public function store() {
		$rules = array(
	        'firstname'			=> 'required',   
	        'lastname'			=> 'required',                
	    );

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails()) {
	        $messages = $validator->messages();
	        return Redirect::to('athlete')
	        	->withErrors($validator)
	        	->withInput();
	    } else {
		    $athlete = new Athlete();
			$athlete->firstname = Input::get('firstname');
			$athlete->lastname = Input::get('lastname');
			$athlete->save();
			return Redirect::route('home');
	    }
	}
}
