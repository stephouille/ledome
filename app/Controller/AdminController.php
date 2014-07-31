<?php

App::uses('AppController', 'Controller');

class AdminController extends AppController
{

	public function beforeFilter() {
	    parent::beforeFilter();
	    // Permet aux utilisateurs de s'enregistrer et de se déconnecter
	    $this->layout = 'admin';
    }


	function admin_home()
	{
 		
	}


	public function admin_login() {
	    if ($this->request->is('post')) {
	        if ($this->AppAuth->login()) {
	            return $this->redirect($this->AppAuth->redirect());
	        } else {
	            $this->Session->setFlash(__("Nom d'user ou mot de passe invalide, réessayer"));
	        }
	    }
	}

	public function admin_logout() {
	    return $this->redirect($this->AppAuth->logout());
	}

	public function videos() {
		
	}
}