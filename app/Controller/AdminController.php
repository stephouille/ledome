<?php

App::uses('AppController', 'Controller');


class AdminController extends AppController {

	public $uses = array('Admin');

	public function admin_login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirect());
	        } else {
	            $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
	        }
	    }
	}

	public function admin_logout() {
	    $this->Session->setFlash('Successfully Logged Out');
	    $this->redirect($this->Auth->logout());
	}


	public function admin_add() {
	    
		if ($this->request->is('post')) {
            $this->Admin->create();
            if ($this->Admin->save($this->request->data)) {
                $this->Session->setFlash(__('L\'user a été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        }

	}
}
