<?php
class Athlete extends Eloquent {

	public $timestamps = false;

    protected $table = 'athlete';

	public function workout() {
        return $this->hasMany('Workout');
    }
}