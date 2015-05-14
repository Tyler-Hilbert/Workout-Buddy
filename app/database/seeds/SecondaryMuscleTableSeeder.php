<?php
class SecondaryMuscleTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('secondary_muscle')->delete();

		DB::table('secondary_muscle')->insert(array('name' => 'Bicep', 'major' => '1'));
		DB::table('secondary_muscle')->insert(array('name' => 'Deltoid', 'major' => '2'));
		DB::table('secondary_muscle')->insert(array('name' => 'Quadricep', 'major' => '3'));
		DB::table('secondary_muscle')->insert(array('name' => 'Trapezius', 'major' => '4'));
	}
}