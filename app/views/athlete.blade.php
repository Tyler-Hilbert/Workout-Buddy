@extends('layout')

@section('content')
	<script>
		function addAthlete() {
			var last = document.getElementById('lastname');
			var first = document.getElementById('firstname');
			var number = document.getElementById('number');
			var gradYear = document.getElementById('grad_year');


	        $.ajax({
				url: "athlete",
				data: {firstname: first.value, 
						lastname: last.value,
						number: number.value,
						grad_year: gradYear.value
				},
				dataType: "json",
				method: "POST"
			}).done(function(response) {
				var tableRef = document.getElementById("table");

				// Add row to table
				var newRow = tableRef.insertRow(tableRef.rows.length);

				var lastCell  = newRow.insertCell(0);
				var lastText  = document.createTextNode(response.last);
				lastCell.appendChild(lastText);

				var firstCell  = newRow.insertCell(1);
				var firstText  = document.createTextNode(response.first);
				firstCell.appendChild(firstText);

				var numberCell  = newRow.insertCell(2);
				var numberText  = document.createTextNode(response.number);
				numberCell.appendChild(numberText);

				var gradYearCell  = newRow.insertCell(3);
				var gradYearText  = document.createTextNode(response.gradYear);
				gradYearCell.appendChild(gradYearText);

				last.value = "";
				first.value = "";
				number.value = "";
				grad_year.value = "";

			});
		}
	</script>

	<div class="container">
		<div>
			<h1>Athletes</h1>
			<table class="table" id="table">
				<tr>
					<td>Last Name</td>
					<td>First Name</td>
					<td>Phone Number</td>
					<td>Graduation Year</td>
				</tr>
				<?php
					foreach(Athlete::all() as $athlete) {
						echo "<tr><td>" . $athlete->lastname . "</td>";
						echo "<td>" . $athlete->lastname . "</td>";
						echo "<td>" . $athlete->number . "</td>";
						echo "<td>" . $athlete->grad_year . "</td></tr>";
					}
				?>
			</table>
		</div>

		
		<div class="well well-sm">
			<h3>Create Athlete</h3>
			{{ Form::open(array('route' => 'athlete.store')) }}
				<div class="form-group">
					{{ Form::label('firstname', 'First Name', ['class' => 'control-label']) }}
					{{ Form::text('firstname', null, ['class' => 'form-control input-lg', 'placeholder' => 'First name']) }}
				</div>
				<div class="form-group">
					{{ Form::label('lastname', 'Last Name', ['class' => 'control-label']) }}
					{{ Form::text('lastname', null, ['class' => 'form-control input-lg', 'placeholder' => 'Last name']) }}
				</div>
				<div class="form-group">
					{{ Form::label('number', 'Phone Number', ['class' => 'control-label']) }}
					{{ Form::text('number', null, ['class' => 'form-control input-lg', 'placeholder' => 'Phone number']) }}
				</div>
				<div class="form-group">
					{{ Form::label('grad_year', 'Graduation year', ['class' => 'control-label']) }}
					{{ Form::number('grad_year', null, ['class' => 'form-control input-lg', 'placeholder' => 'Graduation year', 'min' => '2000', 'max' => '2100']) }}
				</div>
				<div class="form-group">
					{{ Form::button('Create Athlete', ['class' => 'btn btn-primary btn-lg', 'onClick' => 'addAthlete()']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop 