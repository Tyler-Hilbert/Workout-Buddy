@extends('layout')

@section('content')
	<div class="container">
		<h1>Create Major Muscle</h1>
		<div class="well well-sm">
			{{ Form::open(array('route' => 'majormuscle.store')) }}
				<div class="form-group">
					{{ Form::label('major_muscle', 'Major Muscle Name', ['class' => 'control-label']) }}
					{{ Form::text('major_muscle', null, ['class' => 'form-control input-lg']) }}
					@if ($errors->has('major_muscle')) <p class="help-block">{{ $errors->first('major_muscle') }}</p> @endif
				</div>
				<div class="form-group">
					{{ Form::submit('Create Major Muscle Group', ['class' => 'btn btn-primary btn-lg']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop 