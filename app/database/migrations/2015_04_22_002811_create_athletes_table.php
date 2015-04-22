<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthletesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if ( ! Schema::hasTable('athletes')) {
			Schema::create('athletes', function($table) {
				$table->increments('athlete_id');
				$table->string('firstname', 50)->nullable();
				$table->string('lastname', 50)->nullable();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('athletes');

	}

}
