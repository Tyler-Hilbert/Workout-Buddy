@extends('layout')

@section('content')
	<div class="container">
		<h1>Create Secondary Muscle</h1>
		<div class="well well-sm">
			{{ Form::open(array('route' => 'secondarymuscle.store')) }}
				<div class="form-group">
					{{ Form::label('major_muscle', 'Major Muscle', ['class' => 'control-label']) }}
					<?php
						$major = MajorMuscle::orderBy('name', 'asc')->lists('name','id');
						echo Form::select('major_muscle', $major);
					?>
				</div>
				<div class="form-group">
					{{ Form::label('secondary_muscle', 'Secondary Muscle Name', ['class' => 'control-label']) }}
					{{ Form::text('secondary_muscle', null, ['class' => 'form-control input-lg']) }}
					@if ($errors->has('secondary_muscle')) <p class="help-block">{{ $errors->first('secondary_muscle') }}</p> @endif
				</div>
				<div class="form-group">
					{{ Form::submit('Create Secondary Muscle Group', ['class' => 'btn btn-primary btn-lg']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop 