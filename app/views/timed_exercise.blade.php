@extends('layout')

@section('content')
	<div class="container">
		<div>
			<h1>Timed Exercises</h1>
			<table class="table" id="table">
				<tr>
					<td>Exercise</td>
					<td>Time</td>
					<td>Reps</td>
					<td>Major Muscle</td>
					<td>Seconadry Muscle</td>
				</tr>
				<?php
					foreach(TimedExercise::all() as $exercise) {
						echo "<tr><td>" . $exercise->exercise . "</td>";
						echo "<td>" . $exercise->time . "</td>";
						echo "<td>" . $exercise->reps . "</td>";
						echo "<td>" . MajorMuscle::find($exercise->major_muscle)->name . "</td>";
						if ($exercise->secondary_muscle !== null) {
							echo "<td>" . SecondaryMuscle::find($exercise->secondary_muscle)->name . "</td>";
						} else {
							echo "<td></td>";
						}
						echo "</tr>";
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
					{{ Form::label('reps', 'Reps', ['class' => 'control-label']) }}
					{{ Form::number('reps', null, ['class' => 'form-control input-lg', 'placeholder' => 'Reps']) }}
				</div>
				<div class="form-group">
					{{ Form::label('major', 'Major Muscle Group', ['class' => 'control-label']) }}
					<?php
						$muscles = MajorMuscle::orderBy('name', 'asc')->lists('name','id');
						echo Form::select('major_muscle', $muscles, 'default', 
							array('id' => 'major_muscle', 'onchange' => 'updateSecondary()'));
					?>
				</div>
				<div id='secondary_muscle_div'class="form-group"></div>

				<div class="form-group">
					{{ Form::button('Add Exercise', ['class' => 'btn btn-primary btn-lg', 'onClick' => 'add()']) }}
					{{ Form::button('Toggle Secondary Muscle', ['class' => 'btn btn-info', 'onClick' => 'toggleSecondaryMuscle()']) }}
				</div>
			</div>
		</div>
	</div>

	<script> 
		var secondaryMuscle = false; // Wheter there is currently a secondary muscle

		function toggleSecondaryMuscle() {
			if (!secondaryMuscle) {
				secondaryMuscle = true;
				updateSecondary();
			} else {
				$('#secondary_muscle_div').html("");
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
					$('#secondary_muscle_div').html(response);
				});	
			}
		}


		function add() {
			var exercise = document.getElementById('exercise');
			var time = document.getElementById('time');
			var reps = document.getElementById('reps');
			var secondary;

			if (secondaryMuscle) {
				secondary = secondary_muscle.options[secondary_muscle.selectedIndex].value;
			}
			var majorMuscle = major_muscle.options[major_muscle.selectedIndex];

	        $.ajax({
				url: "timed_exercise",
				data: {	
						exercise: exercise.value,
				 		time: time.value, 
						reps: reps.value,
						secondaryMuscle: secondary, 
						majorMuscle: majorMuscle.value
				},
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

				var repsCell = newRow.insertCell(2);
				var repsText = document.createTextNode(response.reps);
				repsCell.appendChild(repsText);

				var majorCell = newRow.insertCell(3);
				var majorText = document.createTextNode(response.major);
				majorCell.appendChild(majorText);

				var secondaryCell = newRow.insertCell(4);
				if(typeof response.secondary !== 'undefined'){
					var secondaryText = document.createTextNode(response.secondary);
					secondaryCell.appendChild(secondaryText);
				}

				exercise.value = "";
				time.value = "";
				reps.value = "";

			});
		}
	</script>
@stop