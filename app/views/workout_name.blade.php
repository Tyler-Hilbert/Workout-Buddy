@extends('layout')

@section('content')
	<div class="container">
		<h1>Create Workout</h1>
		<div class="well well-sm">
			{{ Form::open(array('route' => 'workout_name.store')) }}
				<div class="form-group">
					{{ Form::label('workout', 'Workout', ['class' => 'control-label']) }}
					{{ Form::text('workout', null, ['class' => 'form-control input-lg']) }}
					@if ($errors->has('workout')) <p class="help-block">{{ $errors->first('workout') }}</p> @endif
				</div>
				<div class="form-group">
					{{ Form::submit('Create workout', ['class' => 'btn btn-primary btn-lg']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop 