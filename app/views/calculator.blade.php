@extends('layout')

@section('content')
	<script>
		function calc() {
			var perList = document.getElementById("percent");
			var percent = perList.options[perList.selectedIndex].value;
	        $.ajax({
				url: "getworkout",
				method: "POST"
			}).done(function(response) {
				var output = Math.round(percent * response);
				$("#output").html(output);
			});
		}
	</script>

	<div>
		<select id='percent'>
			<option value='.75'>75%</option>
			<option value='.85'>85%</option>
			<option value='.95'>95%</option>
		</select>
	</div>

	<button onClick="calc()">Calculate</button>

	<div id="output"></div>



@stop