@extends('layout')

@section('content')
	<script>
		function add() {
			var exercise = document.getElementById('exercise');
			var time = document.getElementById('time');

	        $.ajax({
				url: "timed_exercise",
				data: {exercise: exercise.value, time: time.value},
				dataType: "json",
				method: "POST"
			}).done(function(response) {
				var tableRef = document.getElementById("table");

				// Add row to table
				var newRow = tableRef.insertRow(tableRef.rows.length);

				var exerciseCell  = newRow.insertCell(0);
				var exerciseText  = document.createTextNode(response.exercise);
				exerciseCell.appendChild(exerciseText);

				var timeCell  = newRow.insertCell(1);
				var timeText  = document.createTextNode(response.time);
				timeCell.appendChild(timeText);

				exercise.value = "";
				time.value = "";

			});
		}
	</script>


	<div class="container">
		<div>
			<h1>Timed Exercises</h1>
			<table class="table" id="table">
				<?php
					foreach(TimedExercise::all() as $exercise) {
						echo "<tr><td>" . $exercise->exercise . "</td>";
						echo "<td>" . $exercise->time . "</td></tr>";
					}
				?>
			</table>
		</div>
		<div>
			<div class="well well-sm">
				<h3>Add new Timed Exercise</h3>
				<div class="form-group">
					{{ Form::label('exercise', 'Exercise name', ['class' => 'control-label']) }}
					{{ Form::text('exercise', null, ['class' => 'form-control input-lg', 'placeholder' => 'Exercise name']) }}
				</div>
				<div class="form-group">
					{{ Form::label('time', 'Time', ['class' => 'control-label']) }}
					{{ Form::text('time', null, ['class' => 'form-control input-lg', 'placeholder' => 'MM:SS']) }}
				</div>
				<div class="form-group">
					<button onClick="add()">Add exercise</button>
				</div>
			</div>
		</div>
	</div>
@stop