<?php

App::uses('AppController', 'Controller');


class LearningsController extends AppController {

    public $uses = array('Video', 'UsersLesson', 'Learning');

    public function index() {
        $this->Learnings->recursive = 0;
        $this->set('learnings', $this->paginate());
    }

	public function view($id = null) {

        if($this->Session->read('popup') == 'choose-learning') {
          $this->Session->write('popup', 'click-add-learning');
        }

        $this->Learning->id = $id;

        if (!$this->Learning->exists()) {
            throw new NotFoundException(__('Video invalide'));
        }
        $this->set(array(
        	'learning' => $this->Learning->read(null, $id)
        ));
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Learning->create();
            if ($this->Learning->save($this->request->data)) {
                $this->Session->setFlash(__('La vidéo a été sauvegardé'));
                return $this->redirect(array('controller' => 'videos', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('La vidéo n\'a pas été sauvegardée. Merci de réessayer.'));
            }
        }
    }

    public function add_to_dome() {
        
    }

}