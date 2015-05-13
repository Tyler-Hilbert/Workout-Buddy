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
					{{ Form::label('primary', 'Primary Muscle Group', ['class' => 'control-label']) }}
						<?php
							$muscles = MuscleGroup::orderBy('muscle_group', 'asc')->lists('muscle_group','id');
							echo Form::select('primary_id', $muscles);
						?>
				</div>
				<div class="form-group">
					{{ Form::label('secondary', 'Secondary Muscle Group', ['class' => 'control-label']) }}
					{{ Form::select('secondary_id', $muscles) }}
				</div>
				<div class="form-group">
					{{ Form::submit('Create exercise', ['class' => 'btn btn-primary btn-lg']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop 