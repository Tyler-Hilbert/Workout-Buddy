<?php
class AthleteTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('athlete')->delete();

		Athlete::create(array('lastname' => 'Hilbert','firstname' => 'Tyler', 'number' => '345-345-3455', 'grad_year' => '2015' ));
		Athlete::create(array('lastname' => 'Patnaik','firstname' => 'Ajay', 'number' => '355-355-6666', 'grad_year' => '2016'));
		Athlete::create(array('lastname' => 'Xiang','firstname' => 'Yiqi', 'number' => '696-666-777', 'grad_year' => '2015' ));
		Athlete::create(array('lastname' => 'Kummer','firstname' => 'Greggory', 'number' => '111-112-2222', 'grad_year' => '2001' ));
		Athlete::create(array('lastname' => 'Murnan','firstname' => 'Kyle J.', 'number' => '989-898-9898', 'grad_year' => '2009' ));
	}
}