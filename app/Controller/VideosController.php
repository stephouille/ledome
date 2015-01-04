<?php

App::uses('AppController', 'Controller');


class VideosController extends AppController {

    public $uses = array('Video', 'UsersLesson', 'Learning');

    public function index() {
        $this->Video->recursive = 0;
        $this->set('videos', $this->paginate());
    }

	public function view($id = null) {
        $this->Video->id = $id;

        $alls = $this->Video->find('all', array('conditions' => array('learning_id' => $this->Video->field('learning_id'))));

        $id_prev_video = null;
        $id_next_video = null;

        $prev_video = $this->Video->find('first', array(
            'conditions' => array(
                'learning_id' => $this->Video->field('learning_id'),
                'position' => $this->Video->field('position') - 1
            )
        ));
        if(count($prev_video) > 0) {
            $id_prev_video = $prev_video['Video']['id'];
        }

        $next_video = $this->Video->find('first', array(
            'conditions' => array(
                'learning_id' => $this->Video->field('learning_id'),
                'position' => $this->Video->field('position') + 1
            )
        ));
        if(count($next_video) > 0) {
            $id_next_video = $next_video['Video']['id'];
        }

        $isAddedToDome = false;
        if($this->Auth->login()) {
            $uid = $this->Auth->user('id');
            $isAddedToDome = $this->UsersLesson->hasAny(array('user_id' => $uid, 'learning_id' => $this->Video->field('learning_id')));
        }

        if (!$this->Video->exists()) {
            throw new NotFoundException(__('Video invalide'));
        }

        $user_id = null;
        $notes = null;
        if ($this->Auth->login()) {
            $user = $this->Auth->user();
            $user_id = $user['id'];

            $this->loadModel('UsersNote');
            if($this->UsersNote->hasAny(array('user_id' => $user_id, 'video_id' => $this->Video->id))) {
                $notes = $this->UsersNote->find('first', array('conditions' => array('user_id' => $user_id, 'video_id' => $this->Video->id)));
            }

        }

        $this->set(array(
        	'video' => $this->Video->read(null, $id),
            'id_prev_video' => $id_prev_video,
            'id_next_video' => $id_next_video,
            'isAddedToDome' => $isAddedToDome,
            'user_id' => $user_id,
            'notes' => $notes,
        	'alls' => $alls
        ));
    }

    public function admin_add($id_learning) {

        if ($this->request->is('post')) {
            $this->Video->create();
            $this->Video->set('learning_id', $id_learning);

            if ($this->Video->save($this->request->data)) {
                $this->Session->setFlash(__('La vidéo a été sauvegardé'));
                return $this->redirect(array('controller' => 'learnings', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('La vidéo n\'a pas été sauvegardée. Merci de réessayer.'));
            }
        }

    }

    public function admin_edit($id) {

        if (!$id) {
            throw new NotFoundException(__('Invalid video'));
        }

        $video = $this->Video->findById($id);
        if (!$video) {
            throw new NotFoundException(__('Invalid video'));
        }

        if ($this->request->is(array('video', 'put'))) {
            $this->Video->id = $id;
            if ($this->Video->save($this->request->data)) {
                $this->Session->setFlash(__('Your video has been updated.'));
                return $this->redirect(array('controller' => 'learnings', 'action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your video.'));
        }

        if (!$this->request->data) {
            $this->request->data = $video;
        }

    }

    public function admin_delete($id_video) {
        $this->Video->delete($id_video);
        return $this->redirect(array('controller'=>'learnings', 'action' => 'index', 'admin' => true));
    }

    public function validation($id_video) {
        $this->layout = null;

        $user = $this->Auth->user();
        $video = $this->Video->findById($id_video);

        $this->UsersLesson->create();
        $this->UsersLesson->save(array(
            'user_id' => $user['id'],
            'video_id' => $id_video,
            'pole_id' => $video['Video']['pole_id']
        ));
        $this->redirect(array('controller' => 'pages', 'action' => 'dome'));
    }

    public function download() {

        $this->autoRender = false;

        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=".$this->request->data['Video']['title'].".doc");

        echo "<html>";
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
        echo "<body>";
        echo "<h1>".utf8_decode($this->request->data['Video']['title'])."</h1>";
        echo $this->request->data['Video']['textarea'];
        echo "</body>";
        echo "</html>";

        die(); 
    }

}