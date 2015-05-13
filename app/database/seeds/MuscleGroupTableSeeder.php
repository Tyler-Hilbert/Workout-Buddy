<?php
class MuscleGroupTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('MuscleGroup')->delete();

		DB::table('MuscleGroup')->insert(array('muscle_group' => 'Leg'));
		DB::table('MuscleGroup')->insert(array('muscle_group' => 'Thigh'));
		DB::table('MuscleGroup')->insert(array('muscle_group' => 'Arm'));
		DB::table('MuscleGroup')->insert(array('muscle_group' => 'Back'));
	}
}