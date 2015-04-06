<?php

App::uses('AppModel', 'Model');

class Contributor extends AppModel {

	public $actsAs = array(
		'Upload.Upload' => array(
	        'fields' => array(
	            'image' => 'img/contributors/:id1000/:id'
	        )
	    )
    );

}