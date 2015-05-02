@extends('layout')

@section('content')
	<div class="container">
		<h1>Create Exercise</h1>
		<div class="well well-sm">
			{{ Form::open(array('route' => 'exercise.store')) }}
				<div class="form-group">
					{{ Form::label('exercise', 'Exercise name', ['class' => 'control-label']) }}
					{{ Form::text('exercise', null, ['class' => 'form-control input-lg']) }}
					@if ($errors->has('exercise')) <p class="help-block">{{ $errors->first('exercise') }}</p> @endif
				</div>
				<div class="form-group">
					{{ Form::submit('Create exercise', ['class' => 'btn btn-primary btn-lg']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop 