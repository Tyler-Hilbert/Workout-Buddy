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
	return View::make('calculator');
}));


Route::get('athlete', ['as' => 'athlete.create', 'uses' => 'AthletesController@create']);
Route::post('athlete', ['as' => 'athlete.store', 'uses' => 'AthletesController@store']);


Route::get('workout', ['as' => 'workout.create', 'uses' => 'WorkoutsController@create']);
Route::post('workout', ['as' => 'workout.store', 'uses' => 'WorkoutsController@store']);


Route::get('exercise', ['as' => 'exercise.create', 'uses' => 'ExerciseController@create']);
Route::post('exercise', ['as' => 'exercise.store', 'uses' => 'ExerciseController@store']);

Route::get('timed_exercise', ['as' => 'timed_exercise.create', 'uses' => 'TimedExerciseController@create']);
Route::post('timed_exercise', ['as' => 'timed_exercise.store', 'uses' => 'TimedExerciseController@store']);

Route::get('majormuscle', ['as' => 'majormuscle.create', 'uses' => 'MajorMuscleController@create']);
Route::post('majormuscle', ['as' => 'majormuscle.store', 'uses' => 'MajorMuscleController@store']);
Route::post('getsecondarymuscles', 'MajorMuscleController@secondarymuscle');

Route::get('secondarymuscle', ['as' => 'secondarymuscle.create', 'uses' => 'SecondaryMuscleController@create']);
Route::post('secondarymuscle', ['as' => 'secondarymuscle.store', 'uses' => 'SecondaryMuscleController@store']);

Route::get('calculator', function() {
	return View::make('calculator');
});
Route::post('getworkout', 'CalcController@show');



