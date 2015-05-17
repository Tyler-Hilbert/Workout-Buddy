@extends('layout')

@section('content')
	<div class="container">
		<h1>Record Results</h1>
		<div class="col-md-8">
			<div class="well well-sm">
				{{ Form::open(array('route' => 'workout.store')) }}
					<div class="form-group">
						{{ Form::label('athlete', 'Athlete', ['class' => 'control-label']) }}
						<?php
							$athletes = Athlete::select('id', DB::raw('lastname || " " || firstname  AS full_name'))
										->orderBy('full_name', 'asc')
										->lists('full_name','id');

							echo Form::select('athlete_id', $athletes);
						?>
						@if ($errors->has('athlete_id')) <p class="help-block">{{ $errors->first('athlete_id') }}</p> @endif
					</div>
					<div class="form-group">
						{{ Form::label('workout_date', 'Workout Date', ['class' => 'control-label']) }}
						{{ Form::input('date', 'workout_date',  date('Y-m-d'), ['required']) }}
						@if ($errors->has('workout_date')) <p class="help-block">{{ $errors->first('workout_date') }}</p> @endif	
					</div>
					<div id="cloneable_exercise">
						<div class="form-group">
							{{ Form::label('exercise', 'Exercise', ['class' => 'control-label']) }}
							<?php
								$workout = Exercise::orderBy('exercise', 'asc')->lists('exercise','id');
								echo Form::select('exercise0', $workout);
							?>
						</div>
						<div class="form-group">
							{{ Form::label('weight', 'Weight', ['class' => 'control-label']) }}
							{{ Form::number('weight0', null, 
								['class' => 'form-control input-sm', 
								'required', 
								'min' => '5', 
								'step' => '5',
								'placeholder' => 'Enter weight'
								]) 
							}}
						</div>
						<div class="form-group">
							{{ Form::label('reps', 'Reps', ['class' => 'control-label']) }}
							{{ Form::number('reps0', null, ['class' => 'form-control input-sm', 'required', 'min' => '1', 'type' => 'number', 'placeholder' => 'Enter reps']) }}
						</div>
					</div>


					<script>
						var cloneCount = 0;
						var cache = $('#cloneable_exercise').clone();
						function addExercise() {
							var cloned = cache.clone().insertBefore('#buttons');
							cloned.find('[name="weight0"]').attr("name", "weight" + (cloneCount+1));
							cloned.find('[name="reps0"]').attr("name", "reps" + (cloneCount+1));
							cloned.find('[name="exercise0"]').attr("name", "exercise" + (cloneCount+1));
							cloneCount++;
					    }
				    </script>


					<div class="form-group" id="buttons">
						{{ Form::submit('Record Results', ['class' => 'btn btn-primary btn-lg']) }}
						{{ Form::button('Add Exercise', ['class' => 'btn btn-info', 'onClick' => 'addExercise()']) }}
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>	
@stop 