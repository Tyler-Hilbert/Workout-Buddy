<?php
class ExerciseTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('exercise')->delete();

		DB::table('exercise')->insert(array('exercise' => 'Derp workout', 'primary_muscle' => '1', 'secondary_muscle' => '3'));
		DB::table('exercise')->insert(array('exercise' => 'Work hard', 'primary_muscle' => '1', 'secondary_muscle' => '3'));
		DB::table('exercise')->insert(array('exercise' => 'Play hard', 'primary_muscle' => '1', 'secondary_muscle' => '2'));
	}

}