<?php

class Pole extends AppModel {

	public $hasMany = array( 'Learning' => array('order' => 'position') );


}
