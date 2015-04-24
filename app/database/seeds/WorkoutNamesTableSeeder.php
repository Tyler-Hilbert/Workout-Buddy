<?php
class WorkoutNamesTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('workout_names')->delete();

		DB::table('workout_names')->insert(array('workout' => 'Leg'));
		DB::table('workout_names')->insert(array('workout' => 'Arm'));
		DB::table('workout_names')->insert(array('workout' => 'Back'));
	}

}