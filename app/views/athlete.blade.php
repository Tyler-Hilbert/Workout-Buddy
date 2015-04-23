@extends('layout')

@section('content')
	<div class="container">
		<h1>Create Athlete</h1>
		<div class="well well-sm">
			{{ Form::open(array('route' => 'athlete.store')) }}
				<div class="form-group">
					{{ Form::label('firstname', 'FirstName', ['class' => 'control-label']) }}
					{{ Form::text('firstname', null, ['class' => 'form-control input-lg']) }}
				</div>
				<div class="form-group">
					{{ Form::label('lastname', 'LastName', ['class' => 'control-label']) }}
					{{ Form::text('lastname', null, ['class' => 'form-control input-lg']) }}
				</div>
				<div class="form-group">
					{{ Form::submit('Register', ['class' => 'btn btn-primary btn-lg']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop 