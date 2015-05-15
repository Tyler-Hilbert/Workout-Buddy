<?php

class MajorMuscleController extends \BaseController {

	public function create()
	{
		return View::make('majormuscle');
	}

	public function store() {
		$rules = array(
	        'major_muscle'			=> 'required',                 
	    );

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails()) {
	        return Redirect::to('majormuscle');
	    } else {
		    $majorMuscle = new MajorMuscle();
			$majorMuscle->name = Input::get('major_muscle');
			$majorMuscle->save();
			return Redirect::route('home');
	    }
	}

	/**
	  * Is called up by ajax when creating a view. 
	  * returns an input select of seconday muscles for the primary muscle passed
	  */
	public function secondarymuscle() {
		$formGroup = Form::label('secondary_muscle', 'Secondary Muscle', ['class' => 'control-label']);
		$secondaryMuscle = SecondaryMuscle::where('major', Input::get('major_muscle'))->orderBy('name', 'asc')->lists('name','id');
		$formGroup .= Form::select('secondary_muscle', $secondaryMuscle);
		return $formGroup;
	}
}
