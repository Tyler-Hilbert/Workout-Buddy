<?php
class MajorMuscleTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('major_muscle')->delete();

		DB::table('major_muscle')->insert(array('name' => 'Leg'));
		DB::table('major_muscle')->insert(array('name' => 'Shoulder'));
		DB::table('major_muscle')->insert(array('name' => 'Arm'));
		DB::table('major_muscle')->insert(array('name' => 'Back'));
	}
}