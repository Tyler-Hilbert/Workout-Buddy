<?php
class ExerciseTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('exercise')->delete();

		DB::table('exercise')->insert(array('exercise' => 'Leg'));
		DB::table('exercise')->insert(array('exercise' => 'Arm'));
		DB::table('exercise')->insert(array('exercise' => 'Back'));
	}

}