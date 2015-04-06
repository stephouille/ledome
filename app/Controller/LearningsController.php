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

        $learning = $this->Learning->find('first', array(
            'conditions' => array('Learning.id' => $id),
            'recursive' => 2
        ));

        $isAddedToDome = false;
        $learning_user = null;
        if($this->Auth->login()) {
            $uid = $this->Auth->user('id');
            $isAddedToDome = $this->UsersLesson->hasAny(array('user_id' => $uid, 'learning_id' => $id));

            $learning_user = $this->UsersLesson->find('first', array('conditions' => array('user_id' => $uid, 'learning_id' => $id)));
        }

        if (!$this->Learning->exists()) {
            throw new NotFoundException(__('Video invalide'));
        }
        $this->set(array(
            'isAddedToDome' => $isAddedToDome,
        	'learning' => $learning,
            'learning_user' => $learning_user
        ));
    }

    public function admin_add() {
        ini_set('memory_limit', '-1');

        if ($this->request->is('post')) {
            $this->Learning->create();
            // move_uploaded_file($this->request->data['Learning']['image'], WWW_ROOT.DS.'learnings');

            //Avoir la dernière position 
            $last_learning = $this->Learning->find('first', array(
                'conditions' => array('pole_id' => $this->request->data['Learning']['pole_id']),
                'order' => 'position DESC'
            ));
            $last_position = $last_learning['Learning']['position'];
            $this->Learning->set('position', $last_position + 1);

            if ($this->Learning->save($this->request->data)) {
                $this->Session->setFlash(__('Sauvegarde OK'));
                return $this->redirect(array('controller' => 'learnings', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__("Une erreur s'est produite. Merci de réessayer."));
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
            return $this->redirect(array('controller'=> 'learnings', 'action' => 'view', $id));
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

            return $this->redirect(array('controller'=>'videos', 'action' => 'view', $id));
        }
    }

    public function admin_delete($id) {
        $this->Learning->delete($id);
        return $this->redirect(array('controller'=>'learnings', 'action' => 'index', 'admin' => true));
    }

    public function admin_edit($id) {
        ini_set('memory_limit', '-1');
        if (!$id) {
            throw new NotFoundException(__('Invalid Learning'));
        }

        $learning = $this->Learning->findById($id);
        if (!$learning) {
            throw new NotFoundException(__('Invalid Learning'));
        }

        if ($this->request->is(array('learning', 'put'))) {
            $this->Learning->id = $id;
            if ($this->Learning->save($this->request->data)) {
                $this->Session->setFlash(__('Your learning has been updated.'));
                return $this->redirect(array('controller' => 'learnings', 'action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your learning.'));
        }

        if (!$this->request->data) {
            $this->request->data = $learning;
            $this->set(array(
                'poles' => $this->Learning->Pole->find('list')
            ));
        }
    }

    public function search() {
        $this->layout = null;

        $videos = $this->Video->find('all', array('conditions' => array(
            'Video.learning_id' => $this->request->data['learning_id'],
            'Video.title LIKE' => '%'.$this->request->data['search'].'%')));

        $this->set(array(
          'videos' => $videos,
          '_serialize' => array('videos')
        ));

    }

    public function admin_up($id) {
        $this->Learning->id = $id;
        $cur_pos = $this->Learning->field('position');

        if($cur_pos > 1) {

            $new_pos = $cur_pos - 1;
            $id_other_learning_to_change = $this->Learning->find('first', array('conditions' => array('position' => $new_pos, 'pole_id' => $this->Learning->field('pole_id'))));

            $this->Learning->set('position', $new_pos);
            $this->Learning->save();

            $this->Learning->id = $id_other_learning_to_change['Learning']['id'];
            $this->Learning->set('position', $cur_pos);
            $this->Learning->save();

        }
        return $this->redirect(array('controller'=>'learnings', 'action' => 'index', 'admin' => true));
    }

    public function admin_down($id) {
        $this->Learning->id = $id;
        $cur_pos = $this->Learning->field('position');

        $alls = $this->Learning->find('count', array(
            'conditions' => array('Learning.pole_id' => $this->Learning->field('pole_id'))
        ));

        if($cur_pos < $alls) {
            $new_pos = $cur_pos + 1;
            $id_other_learning_to_change = $this->Learning->find('first', array('conditions' => array('position' => $new_pos, 'pole_id' => $this->Learning->field('pole_id'))));

            $this->Learning->set('position', $new_pos);
            $this->Learning->save();

            $this->Learning->id = $id_other_learning_to_change['Learning']['id'];
            $this->Learning->set('position', $cur_pos);
            $this->Learning->save();
        }

        return $this->redirect(array('controller'=>'learnings', 'action' => 'index', 'admin' => true));

    }
   


}