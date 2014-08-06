<?php

App::uses('Model', 'Model');

class Pole extends Model {

	public $hasMany = array( 'Learning' );


}
