<?php
class AthleteTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('athlete')->delete();

		DB::table('athlete')->insert(
			array(
				'lastname' => 'Hilbert',
				'firstname' => 'Tyler'	
		));
	}
}