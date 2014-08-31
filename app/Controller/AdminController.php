<?php

App::uses('AppController', 'Controller');


class AdminController extends AppController {

	public $uses = array('Learning', 'User', 'Video');

	public function beforeFilter() {
    	parent::beforeFilter();
    	if($this->Session->read('Auth.User.role') == 'user') {
			return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
		} else {
			$this->layout = 'admin';
		}
    }

	public function index() {

		$nbUsers = $this->User->find('count');
		$nbVideos = $this->Video->find('count');

		$this->set(array(
            'nbUsers' => $nbUsers,
            'nbVideos' => $nbVideos,
            '_serialize' => array('nbUsers', 'nbVideos')
        ));
	}

	public function admin_learnings() {
		$poles = $this->Pole->find('all', array('recursive' => 2));
        $this->set('poles', $poles);
    }

}
