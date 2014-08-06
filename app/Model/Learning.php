<?php

App::uses('AppModel', 'Model');

class Learning extends AppModel {

	public $hasMany = array( 'Video');


}
