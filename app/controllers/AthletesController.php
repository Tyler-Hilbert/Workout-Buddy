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
	        'number'			=> 'required',
	        'grad_year'			=> 'required'               
	    );

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails()) {
	        return Redirect::to('athlete');
	    } else {
		    $athlete = new Athlete();
			$athlete->firstname = Input::get('firstname');
			$athlete->lastname = Input::get('lastname');
			$athlete->number = Input::get('number');
			$athlete->grad_year = Input::get('grad_year');
			$athlete->save();
			
			return json_encode(array('first' => $athlete->firstname,
								'last' => $athlete->lastname,
								'number' => $athlete->number,
								'gradYear' => $athlete->grad_year
			));
	    }
	}
}
