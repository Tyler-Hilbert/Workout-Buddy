<?php
class ExerciseTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('exercise')->delete();

		DB::table('exercise')->insert(array('exercise' => 'Derp workout', 'secondary_muscle' => '3'));
		DB::table('exercise')->insert(array('exercise' => 'Work hard', 'secondary_muscle' => '3'));
		DB::table('exercise')->insert(array('exercise' => 'Play hard', 'secondary_muscle' => '2'));
	}

}