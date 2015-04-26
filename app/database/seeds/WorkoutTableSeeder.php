<?php
class WorkoutTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('workout')->delete();

		for ($i = 1; $i < 6; $i++) {
			for($w = 1; $w < 4; $w++) {
				DB::table('workout')->insert(
					array(
						'athlete_id' => $i,
						'weight' => rand(100, 700),
						'reps' => rand(4, 25),
						'workout' => $w,
						'workout_date' => '2014:04:21'
				));
			}
		}
	}
}