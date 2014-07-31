<?php

App::uses('AppModel', 'Model');

class UsersLesson extends AppModel {

    public $belongsTo = array(
        'Video' => array(
            'className'    => 'Video',
            'foreignKey'   => 'video_id'
        ),
        'Pole' => array(
            'className'    => 'Pole',
            'foreignKey'   => 'pole_id'
        )
    );
}
