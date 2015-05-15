<?php
class ExerciseTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('exercise')->delete();

		DB::table('exercise')->insert(array('exercise' => 'Derp workout', 'major_muscle' => '1', 'secondary_muscle' => '3'));
		DB::table('exercise')->insert(array('exercise' => 'Work hard', 'major_muscle' => '1', 'secondary_muscle' => '3'));
		DB::table('exercise')->insert(array('exercise' => 'Play hard', 'major_muscle' => '1', 'secondary_muscle' => '2'));
	}

}