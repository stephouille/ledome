<?php

App::uses('Model', 'Model');

class Video extends Model {

	public $belongsTo = array( 'Professor', 'Learning');

	
}
