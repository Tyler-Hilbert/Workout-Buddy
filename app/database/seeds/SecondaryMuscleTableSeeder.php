<?php
class SecondaryMuscleTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('secondary_muscle')->delete();

		DB::table('secondary_muscle')->insert(array('name' => 'Bicep', 'major' => 'Arm'));
		DB::table('secondary_muscle')->insert(array('name' => 'Deltoid', 'major' => 'Shoulder'));
		DB::table('secondary_muscle')->insert(array('name' => 'Quadricep', 'major' => 'Leg'));
		DB::table('secondary_muscle')->insert(array('name' => 'Trapezius', 'major' => 'Back'));
	}
}