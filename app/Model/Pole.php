<?php

App::uses('Model', 'Model');

class Pole extends Model {

	public $hasMany = array(
	    'Video' => array(
	        'className'     => 'Video',
	        'foreignKey'    => 'pole_id',
	        'dependent'     => false
	    )
	);


}
