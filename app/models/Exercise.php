<?php
class Exercise extends Eloquent {

	public $timestamps = false;

    protected $table = 'exercise';

    public function majorMuscle()
    {
        return $this->belongsTo('majorMuscle', 'major_muscle');
    }
}