<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if ( ! Schema::hasTable('exercise')) {
			Schema::create('exercise', function($table) {
				$table->increments('id');
				$table->String('exercise');
				$table->integer('major_muscle');
				$table->integer('secondary_muscle')->nullable();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('exercise');

	}

}
