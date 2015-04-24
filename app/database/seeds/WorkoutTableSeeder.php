<?php
class WorkoutTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('workout')->delete();

		for ($i = 0; $i < 27; $i++) {
			DB::table('workout')->insert(
				array(
					'athlete_id' => '1',
					'weight' => rand(100, 700),
					'reps' => rand(4, 25),
					'workout' => rand(1, 3),
					'workout_date' => '2014:04:21'
			));
		}
	}
}