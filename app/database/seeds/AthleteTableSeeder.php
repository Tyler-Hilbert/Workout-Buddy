<?php
class AthleteTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('athlete')->delete();

		Athlete::create(array('lastname' => 'Hilbert','firstname' => 'Tyler' ));
		Athlete::create(array('lastname' => 'Patnaik','firstname' => 'Ajay' ));
		Athlete::create(array('lastname' => 'Xiang','firstname' => 'Sarah' ));
		Athlete::create(array('lastname' => 'Kummer','firstname' => 'Greggory' ));
		Athlete::create(array('lastname' => 'Murnan','firstname' => 'Kyle' ));
	}
}