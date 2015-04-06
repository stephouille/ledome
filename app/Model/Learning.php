<?php

App::uses('AppModel', 'Model');

class Learning extends AppModel {

	public $actsAs = array(
		'Upload.Upload' => array(
	        'fields' => array(
	            'image' => 'img/learnings/:id1000/:id'
	        )
	    )
    );

	public $hasMany = array( 'Video' => array('order' => 'position') );
	public $belongsTo = array( 'Pole' );

}
