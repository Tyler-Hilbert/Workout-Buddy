@extends('layout')

@section('content')
	<div class="container">
		<h1>Add Workout</h1>
		<div class="well well-sm">
			{{ Form::open(array('route' => 'workout.store')) }}
				<div class="form-group">
					{{ Form::label('workout_date', 'Workout Date', ['class' => 'control-label']) }}
					{{ Form::input('date', 'workout_date') }}
					@if ($errors->has('workout_date')) <p class="help-block">{{ $errors->first('workout_date') }}</p> @endif					
				</div>
				<div class="form-group">
					{{ Form::label('weight', 'Weight', ['class' => 'control-label']) }}
					{{ Form::text('weight', null, ['class' => 'form-control input-lg']) }}
					@if ($errors->has('weight')) <p class="help-block">{{ $errors->first('weight') }}</p> @endif
				</div>
				<div class="form-group">
					{{ Form::label('reps', 'Reps', ['class' => 'control-label']) }}
					{{ Form::text('reps', null, ['class' => 'form-control input-lg']) }}
					@if ($errors->has('reps')) <p class="help-block">{{ $errors->first('reps') }}</p> @endif
				</div>
				<div class="form-group">
					{{ Form::label('exercise', 'Exercise', ['class' => 'control-label']) }}
					<?php
						$workout = Exercise::orderBy('exercise', 'asc')->lists('exercise','id');
						echo Form::select('exercise', $workout);
					?>
					@if ($errors->has('exercise')) <p class="help-block">{{ $errors->first('exercise') }}</p> @endif
				</div>
				<div class="form-group">
					{{ Form::label('athlete', 'Athlete', ['class' => 'control-label']) }}
					<?php
						$athletes = Athlete::select('id', DB::raw('lastname || " " || firstname  AS full_name'))
									->orderBy('full_name', 'asc')
									->lists('full_name','id');

						echo Form::select('athlete_id', $athletes);
					?>
					@if ($errors->has('athlete_id')) <p class="help-block">{{ $errors->first('athlete_id') }}</p> @endif
				</div>
				<div class="form-group">
					{{ Form::submit('Add workout', ['class' => 'btn btn-primary btn-lg']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop 