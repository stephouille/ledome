<?php

App::uses('Model', 'Model');

class Professor extends Model {

	public $actsAs = array(
		'Upload.Upload' => array(
	        'fields' => array(
	            'picture' => 'img/professors/:id1000/:id'
	        )
	    )
    );

}
