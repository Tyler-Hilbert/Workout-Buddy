<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('AthleteTableSeeder');
		$this->call('WorkoutTableSeeder');
		$this->call('ExerciseTableSeeder');
		$this->call('TimedExerciseTableSeeder');
		$this->call('MajorMuscleTableSeeder');
		$this->call('SecondaryMuscleTableSeeder');
	}

}
