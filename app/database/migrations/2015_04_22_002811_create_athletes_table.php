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
		if ( ! Schema::hasTable('athlete')) {
			Schema::create('athlete', function($table) {
				$table->increments('id');
				$table->string('firstname', 50);
				$table->string('lastname', 50);
				$table->string('number', 15);
				$table->integer('grad_year');
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('athlete');

	}

}