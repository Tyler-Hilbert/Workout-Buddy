@extends('layout')

@section('content')
	<script>
		function calc() {
			var athleteList = document.getElementById("athlete");
			var athlete = athleteList.options[athleteList.selectedIndex].value;
			console.log(athlete);
			var workoutList = document.getElementById("workout");
			var workout = workoutList.options[workoutList.selectedIndex].value;
			console.log(workout);

	        $.ajax({
				url: "getworkout",
				data: {athlete: athlete, workout: workout},
				method: "POST"
			}).done(function(response) {
				var perList = document.getElementById("percent");
				var percent = perList.options[perList.selectedIndex].value;
				var output = Math.round(percent * response);
				$("#output").html(output);
			});
		}
	</script>

	<div class="container ">
		<h1>Get calculation</h1>
		<div class="row">
			<div class="well well-sm col-md-6">
				<div class="form-group">
					{{ Form::label('percent', 'Percent', ['class' => 'control-label']) }}	
					{{ Form::select('percent', array('.75' => '75%', '.85' => '85%', '.95' => '95%'), 'default', array('id' => 'percent')); }}
				</div>
				<div class="form-group">
					{{ Form::label('athlete', 'Athlete', ['class' => 'control-label']) }}
					<?php
						$athletes = Athlete::select('id', DB::raw('lastname || " " || firstname  AS full_name'))
									->orderBy('full_name', 'asc')
									->lists('full_name','id');

						echo Form::select('athlete_id', $athletes, 'default', array('id' => 'athlete'));
					?>
				</div>
				<div class="form-group">
					{{ Form::label('workout', 'Workout', ['class' => 'control-label']) }}
					<?php
						$workouts = WorkoutName::orderBy('workout', 'asc')->lists('workout','id');
						echo Form::select('workout', $workouts, 'default', array('id' => 'workout'));
					?>
					@if ($errors->has('workout')) <p class="help-block">{{ $errors->first('workout') }}</p> @endif
				</div>
				<div class="form-group">
					<button onClick="calc()">Calculate</button>
				</div>
			</div>
		</div>
		<div id="output"></div>
	</div>

@stop