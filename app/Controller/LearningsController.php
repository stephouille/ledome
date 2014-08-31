<?php

App::uses('AppController', 'Controller');


class LearningsController extends AppController {

    public $uses = array('Video', 'UsersLesson', 'Learning', 'Pole');

    public function index() {
        $this->Learnings->recursive = 0;
        $this->set('learnings', $this->paginate());
    }

	public function view($id = null) {

        //tutoriel
        if($this->Session->read('popup') == 'choose-learning') {
          $this->Session->write('popup', 'click-add-learning');
        }

        $this->Learning->id = $id;

        $isAddedToDome = false;
        if($this->Auth->login()) {
            $uid = $this->Auth->user('id');
            $isAddedToDome = $this->UsersLesson->hasAny(array('user_id' => $uid, 'learning_id' => $id));
        }

        if (!$this->Learning->exists()) {
            throw new NotFoundException(__('Video invalide'));
        }
        $this->set(array(
            'isAddedToDome' => $isAddedToDome,
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
        $this->set(array(
            'poles' => $this->Learning->Pole->find('list')
        ));
    }

    public function add_to_dome($id) {  
        if ($this->Auth->login()) {
            $user = $this->Auth->user();

            $this->UsersLesson->create();
            $this->UsersLesson->set(array(
                'user_id' => $user['id'],
                'learning_id' => $id
            ));
            $this->UsersLesson->save();

            if($this->Session->read('popup') == 'click-add-learning') {
                $this->Session->write('popup', 'end-tutorial');
            }
            return $this->redirect(array('controller'=>'pages', 'action' => 'dome'));
        }
    }

    public function remove_from_dome($id) {  
        if ($this->Auth->login()) {
            $user = $this->Auth->user();

            $lesson = $this->UsersLesson->find('first', array('conditions' => array('user_id' => $user['id'], 'learning_id' => $id)));

            if(count($lesson) > 0) {
                $this->UsersLesson->id = $lesson['UsersLesson']['id'];
                $this->UsersLesson->delete();
            }

            return $this->redirect(array('controller'=>'pages', 'action' => 'dome'));
        }
    }

    public function admin_delete($id) {
        $this->Learning->delete($id);
        return $this->redirect(array('controller'=>'learnings', 'action' => 'index', 'admin' => true));
    }

   


}