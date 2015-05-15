<?php
class TimedExerciseTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('timed_exercise')->delete();

		DB::table('timed_exercise')->insert(array('exercise' =>'Streching',  'major_muscle' => '1', 'secondary_muscle' => '1', 'reps' => '4', 'time' => '1:00'));
		DB::table('timed_exercise')->insert(array('exercise' =>'Pushups',  'major_muscle' => '1', 'secondary_muscle' => '2', 'reps' => '3', 'time' => '1:00'));
		DB::table('timed_exercise')->insert(array('exercise' =>'Running',  'major_muscle' => '2', 'secondary_muscle' => '2', 'reps' => '4', 'time' => '5:30'));
	}
}