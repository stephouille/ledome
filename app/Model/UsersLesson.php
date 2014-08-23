<?php

App::uses('AppModel', 'Model');

class UsersLesson extends AppModel {

    public $belongsTo = array(
        'Learning' => array(
            'className'    => 'Learning',
            'foreignKey'   => 'learning_id'
        )
    );
}
