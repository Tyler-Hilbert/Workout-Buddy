<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimedExerciseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('timed_exercise')) {
			Schema::create('timed_exercise', function($table) {
				$table->increments('id');
				$table->String('exercise');
				$table->time('time');
				$table->integer('major_muscle');
				$table->integer('secondary_muscle')->nullable;
				$table->integer('reps');
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('timed_exercise');
	}

}
