<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function beforeFilter() {
	    parent::beforeFilter();
        $this->Auth->allow();
	}

	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirect());
	        } else {
	            $this->Session->setFlash(__("Nom d'user ou mot de passe invalide, réessayer"));
	        }
	    }
	}

	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User invalide'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            if(!$this->User->hasAny(array('email' => $this->request->data['User']['email']))) {
                $this->User->create();
                if ($this->User->save($this->request->data)) {

                    $email = new CakeEmail('default');
                    $email->to($this->request->data['User']['email']);
                    $email->subject('test subject');
                    $email->send('test message');

                    $this->Auth->login();

                    $this->Session->write('popup','congrats-inscription');
                    
                    $this->Session->setFlash(__('L\'user a été sauvegardé'));
                    return $this->redirect(array('controller'=>'pages', 'action' => 'dome'));
                } else {
                    $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
                }
            } else {
                $this->Session->setFlash(__('L\'email est déjà utilisé. Merci de réessayer.'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User Invalide'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('L\'user a été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User invalide'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User supprimé'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('L\'user n\'a pas été supprimé'));
        return $this->redirect(array('action' => 'index'));
    }

    public function stopPOPUP() {
        $this->Session->delete('popup');
    }   

}