<?php

App::uses('AppController', 'Controller');

class PolesController extends AppController {

	public function view($id = null) {
        $this->Pole->id = $id;

        if (!$this->Pole->exists()) {
            throw new NotFoundException(__('Catégorie invalide'));
        }
        $this->loadModel('UsersLesson');

        $ul = null;
        if($this->Auth->login()) {
            $uid = $this->Auth->user('id');
            $ul = $this->UsersLesson->find('list', array(
            	'conditions' => array('user_id' => $uid),
            	'fields' => array('UsersLesson.learning_id')
            ));
        }

        $this->set(array(
        	'userslessons' => $ul,
        	'pole' => $this->Pole->read(null, $id)
        ));
    }

    public function add() {
    	if($this->Session->read('Auth.User.role') != 'user') {
	    	$this->layout = 'admin';
	    	if ($this->request->is('post')) {
	    		if($this->request->data['Pole']['name'] != '') {
		           	if(!$this->Pole->hasAny(array('name' => $this->request->data['Pole']['name']))) {
		                $this->Pole->create();
		                if ($this->Pole->save($this->request->data['Pole'])) {      
		                    $this->Session->setFlash(__('Pôle ajouté avec succès'));
		                    return $this->redirect(array('controller'=>'poles', 'action' => 'index'));
		                } else {
		                    $this->Session->setFlash(__('Le pôle n\'a pas été sauvegardé. Merci de réessayer.'));
		                }
		            } else {
		                $this->Session->setFlash(__('Ce pôle existe déjà.'));
		            }
	    		}
	        }
	    } else {
	    	return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
	    }
    }

}
