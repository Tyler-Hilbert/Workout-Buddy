<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => function()
{
	//return View::make('input');
	$athlete = Athlete::find(2);
	return $athlete;
}));

Route::get('athlete', ['as' => 'athlete.create', 'uses' => 'AthletesController@create']);
Route::post('athlete', ['as' => 'athlete.store', 'uses' => 'AthletesController@store']);

Route::get('workout', ['as' => 'workout.create', 'uses' => 'WorkoutsController@create']);
Route::post('workout', ['as' => 'workout.store', 'uses' => 'WorkoutsController@store']);

Route::get('calculator', ['as' => 'calculator.rm', 'uses' => 'HomeController@showCalc']);




