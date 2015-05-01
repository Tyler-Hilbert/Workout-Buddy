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

				var tableRef = document.getElementById("table");

				// Clear previous rows
				for (var i = --tableRef.rows.length; i > 0; i--) {
					tableRef.deleteRow(i);
				}

				// Add rows to table
				for (var workout in response) {
					if (response.hasOwnProperty(workout)) {
						var newRow = tableRef.insertRow(tableRef.rows.length);

						var workoutCell  = newRow.insertCell(0);
						var workoutText  = document.createTextNode(workout);
						workoutCell.appendChild(workoutText);

						var weight = response[workout].weight;
						var weightCell  = newRow.insertCell(1);
						var weightText  = document.createTextNode(weight);
						weightCell.appendChild(weightText);

						var reps = response[workout].reps;
						var repsCell  = newRow.insertCell(2);
						var repsText  = document.createTextNode(reps);
						repsCell.appendChild(repsText);

						var oneRM = weight / (1.0278 - (.0278 * reps));
						oneRM = 5 * Math.round(oneRM/5);
						var oneRMCell  = newRow.insertCell(3);
						var oneRMText  = document.createTextNode(oneRM);
						oneRMCell.appendChild(oneRMText);
					}
				}
			});
		}
	</script>

	<div class="container ">
		<h1>Create Workout</h1>
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

		<div>
			<table class="table" id="table">
				<tr>
					<td>Workout</td>
					<td>Weight</td>
					<td>Reps</td>
					<td>Max 1rm</td>
				</tr>
			</table>
		</div>
	</div>
@stop