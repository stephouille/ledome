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

    public function admin_login() {
    	$this->layout = 'admin';
    	if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect(array('controller' => 'admin', 'action' => 'index', 'admin' => false));
	        } else {
	            $this->Session->setFlash(__("Nom d'user ou mot de passe invalide, réessayer"));
	        }
	    }
    }

	public function index() {
		if($this->Session->read('Auth.User')) {
			$nbUsers = $this->User->find('count');
			$nbVideos = $this->Video->find('count');
			$nbLearnings = $this->Learning->find('count');

			$recommendation = $this->Video->find('first', array(
				'conditions' => array('recommendation' => 1)
			));

			$learnings = $this->Learning->find('all', array('recursive' => 2));

			$this->set(array(
	            'nbUsers' => $nbUsers,
	            'nbVideos' => $nbVideos,
	            'nbLearnings' => $nbLearnings,
	            'recommendation' => $recommendation,
	            'learnings' => $learnings,
	            '_serialize' => array('nbUsers', 'nbVideos', 'nbLearnings', 'recommendation', 'learnings')
	        ));
		} else {
			return $this->redirect(array('controller' => 'admin', 'action' => 'login'));
		}
	}

	public function admin_learnings() {
		$poles = $this->Pole->find('all', array('recursive' => 2));
        $this->set('poles', $poles);
    }

    public function admin_allpages() {

    	
    	
	}
}
