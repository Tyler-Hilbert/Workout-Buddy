@extends('layout')

@section('content')
	<div class="container">
		<h1>Create Workout</h1>
		<div class="well well-sm">
			{{ Form::open(array('route' => 'workout.store')) }}
				<div class="form-group">
					{{ Form::label('workout_date', 'Workout Date', ['class' => 'control-label']) }}
					{{ Form::input('date', 'workout_date') }}					
				</div>
				<div class="form-group">
					{{ Form::label('weight', 'Weight', ['class' => 'control-label']) }}
					{{ Form::text('weight', null, ['class' => 'form-control input-lg']) }}
				</div>
				<div class="form-group">
					{{ Form::label('reps', 'Reps', ['class' => 'control-label']) }}
					{{ Form::text('reps', null, ['class' => 'form-control input-lg']) }}
				</div>
				<div class="form-group">
					{{ Form::label('workout', 'Workout', ['class' => 'control-label']) }}
					{{ Form::text('workout', null, ['class' => 'form-control input-lg']) }}
				</div>
				<div class="form-group">
					{{ Form::label('athlete_id', 'AthleteId', ['class' => 'control-label']) }}
					{{ Form::text('athlete_id', null, ['class' => 'form-control input-lg']) }}
				</div>
				<div class="form-group">
					{{ Form::submit('Register', ['class' => 'btn btn-primary btn-lg']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop 