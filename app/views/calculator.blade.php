@extends('layout')

@section('content')
	<script>
		function calc() {
			var athleteList = document.getElementById("athlete");
			var athlete = athleteList.options[athleteList.selectedIndex].value;

	        $.ajax({
				url: "getworkout",
				data: {athlete: athlete},
				dataType: "json",
				method: "POST"
			}).done(function(response) {
				var output = ""
				for (var workout in response) {
					if (response.hasOwnProperty(workout)) {
					      output += workout + " " + response[workout].reps + " @ " + response[workout].weight + "<br>";
					   }
					}
				$("#output").html(output);
			});
		}
	</script>

	<div class="container ">
		<h1>Get calculation</h1>
		<div class="row">
			<div class="well well-sm col-md-6">
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
					<button onClick="calc()">Calculate</button>
				</div>
			</div>
		</div>

		<div id="output">

		</div>
	</div>

@stop