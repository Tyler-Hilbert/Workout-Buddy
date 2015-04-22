<?php
class Athlete extends Eloquent {

    protected $table = 'athletes';

	public function workout() {
        return $this->hasMany('Workout');
    }
}