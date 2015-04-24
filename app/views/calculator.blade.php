@extends('layout')

@section('content')
	<div>
		<select id='percents'>
			<option value='.75'>75%</option>
			<option value='.85'>85%</option>
			<option value='.95'>95%</option>
		</select>
	</div>

	{{ HTML::script('js/calculations.js') }}

	<button onClick="calc()">Calculate</button>




@stop