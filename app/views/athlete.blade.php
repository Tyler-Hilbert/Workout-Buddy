@extends('layout')

@section('content')
	<div class="container">
		<h1>Create Athlete</h1>
		<div class="well well-sm">
			{{ Form::open(array('route' => 'athlete.store')) }}
				<div class="form-group">
					{{ Form::label('firstname', 'FirstName', ['class' => 'control-label']) }}
					{{ Form::text('firstname', null, ['class' => 'form-control input-lg']) }}
					@if ($errors->has('firstname')) <p class="help-block">{{ $errors->first('firstname') }}</p> @endif
				</div>
				<div class="form-group">
					{{ Form::label('lastname', 'LastName', ['class' => 'control-label']) }}
					{{ Form::text('lastname', null, ['class' => 'form-control input-lg']) }}
					@if ($errors->has('lastname')) <p class="help-block">{{ $errors->first('lastname') }}</p> @endif
				</div>
				<div class="form-group">
					{{ Form::submit('Create athlete', ['class' => 'btn btn-primary btn-lg']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop 