<?php

App::uses('AppModel', 'Model');

class UsersNote extends AppModel {

    public $belongsTo = array('User', 'Video');
    
}
