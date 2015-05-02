<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkoutsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if ( ! Schema::hasTable('workout')) {
			Schema::create('workout', function($table) {
				$table->date('workout_date');
				$table->integer('weight');
				$table->integer('reps');
				$table->integer('exercise');
				$table->integer('athlete_id');
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('workout');

	}


}
