<?php
class AthleteTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('athletes')->delete();

		DB::table('athletes')->insert(
			array(
			'lastname' => 'Hilbert',
			'firstname'    => 'Tyler'	
		));
	}
}