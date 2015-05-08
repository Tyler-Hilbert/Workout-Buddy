<?php
class TimedExerciseTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('timed_exercise')->delete();

		DB::table('timed_exercise')->insert(array('exercise' =>'Streching',  'time' => '1:00'));
		DB::table('timed_exercise')->insert(array('exercise' =>'Pushups',  'time' => '1:00'));
		DB::table('timed_exercise')->insert(array('exercise' =>'Running',  'time' => '5:30'));
	}
}