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
					{{ Form::label('major', 'Major Muscle Group', ['class' => 'control-label']) }}
					<?php
						$muscles = MajorMuscle::orderBy('name', 'asc')->lists('name','id');
						echo Form::select('major_muscle', $muscles, 'default', 
							array('id' => 'major_muscle', 'onchange' => 'updateSecondary()'));
					?>
				</div>

				<div id='secondary_muscle'class="form-group"></div>
				
				<div class="form-group">
					{{ Form::submit('Create Exercise', ['class' => 'btn btn-primary btn-lg']) }}
					{{ Form::button('Toggle Secondary Muscle', ['class' => 'btn btn-info', 'onClick' => 'toggleSecondaryMuscle()']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>



	<script> 
		var secondaryMuscle = false; // Wheter there is currently a secondary muscle

		function toggleSecondaryMuscle() {
			if (!secondaryMuscle) {
				secondaryMuscle = true;
				updateSecondary();
			} else {
				$('#secondary_muscle').html("");
				secondaryMuscle = false;
			}
		}

		function updateSecondary() {
			if (secondaryMuscle) {
				$.ajax({
					url: "getsecondarymuscles",
					data: {major_muscle: major_muscle.options[major_muscle.selectedIndex].value },
					method: "POST"
				}).done(function(response) {
					$('#secondary_muscle').html(response);
				});	
			}
		}
	</script>
@stop 