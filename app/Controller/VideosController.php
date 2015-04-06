<?php

App::uses('AppController', 'Controller');


class VideosController extends AppController {

    public $uses = array('Video', 'UsersLesson', 'Learning', 'AnnexesVideo');

    public function index() {
        $this->Video->recursive = 0;
        $this->set('videos', $this->paginate());
    }

	public function view($id = null) {
        $this->Video->id = $id;

        $alls = $this->Video->find('all', array('conditions' => array('Video.learning_id' => $this->Video->field('learning_id'))));

        $id_prev_video = null;
        $id_next_video = null;

        $prev_video = $this->Video->find('first', array(
            'conditions' => array(
                'Video.learning_id' => $this->Video->field('learning_id'),
                'Video.position' => $this->Video->field('position') - 1
            )
        ));
        if(count($prev_video) > 0) {
            $id_prev_video = $prev_video['Video']['id'];
        }

        $next_video = $this->Video->find('first', array(
            'conditions' => array(
                'Video.learning_id' => $this->Video->field('learning_id'),
                'Video.position' => $this->Video->field('position') + 1
            )
        ));
        if(count($next_video) > 0) {
            $id_next_video = $next_video['Video']['id'];
        }

        $isAddedToDome = false;
        if($this->Auth->login()) {
            $uid = $this->Auth->user('id');
            $isAddedToDome = $this->UsersLesson->hasAny(array('UsersLesson.user_id' => $uid, 'UsersLesson.learning_id' => $this->Video->field('learning_id')));

            //Progression à enregistrer si > à la progression de l'user
            if($isAddedToDome) {
                $ul = $this->UsersLesson->find('first', array('conditions' => array('UsersLesson.user_id' => $uid, 'UsersLesson.learning_id' => $this->Video->field('learning_id'))));
                if($ul['UsersLesson']['progress'] < $this->Video->id) {
                    $this->UsersLesson->id = $ul['UsersLesson']['id'];
                    $this->UsersLesson->set('progress', $this->Video->field('position'));
                    $this->UsersLesson->save();
                }
            }
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
                $notes = $this->UsersNote->find('first', array('conditions' => array('UsersNote.user_id' => $user_id, 'UsersNote.video_id' => $this->Video->id)));
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
        $this->loadModel('Professor');

        if ($this->request->is('post')) {

            // debug($this->request->data);
            // die();

            $this->Video->create();
            $this->Video->set('learning_id', $id_learning);

            //Avoir la dernière position 
            $last_video = $this->Video->find('first', array(
                'conditions' => array('learning_id' => $id_learning),
                'order' => 'Video.position DESC'
            ));
            if(isset($last_video['Video'])) {
                $last_position = $last_video['Video']['position'];
                // debug($last_position + 1);
                // die();
                $this->Video->set('Video.position', $last_position + 1);
            } else {
                $this->Video->set('Video.position', 1);
            }

            //Professeur
            if(isset($this->request->data['Professor']['id']) && $this->request->data['Professor']['id'] != '') {
                $this->Video->set('professor_id', $this->request->data['Professor']['id']);
            } else if($this->request->data['Professor']['name'] != '') {
                $this->Professor->create();
                $this->Professor->set(array(
                    'name' => $this->request->data['Professor']['name'],
                    'email' => $this->request->data['Professor']['email']
                ));
                $this->Professor->save();
            }

            if ($this->Video->save($this->request->data)) {

                //Annexes
                $this->loadModel('AnnexesVideo');
                if(isset($this->request->data['Annexe'])) {
                    debug('test');
                    foreach ($this->request->data['Annexe'] as $annexe) {
                        debug($annexe);
                        $this->AnnexesVideo->create();
                        $uploadDir = APP.'webroot/files/'.$this->Video->id;
                        if (!file_exists($uploadDir)) {
                            mkdir($uploadDir, 0777, true);
                        }
                        $uploadfile = $uploadDir.'/'.$annexe['file']['name'];
                        move_uploaded_file($annexe['file']['tmp_name'], $uploadfile);
                        $this->AnnexesVideo->set(array(
                            'annexe_id' => $annexe['id'],
                            'video_id' => $this->Video->id,
                            'path' => $annexe['file']['name']
                        ));
                        $this->AnnexesVideo->save();
                    }
                }

                $this->Session->setFlash(__('La vidéo a été sauvegardée avec succès.'));
                return $this->redirect(array('controller' => 'learnings', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('La vidéo n\'a pas été sauvegardée. Merci de réessayer.'));
            }
        } else {
            
            $this->loadModel('Annexe');
            $type_annexes = $this->Annexe->find('all');
            $professors = $this->Professor->find('all');

            $this->set(array(
                'type_annexes' => $type_annexes,
                'professors' => $professors
            ));

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

        $this->loadModel('Professor');
        if ($this->request->is(array('video', 'put'))) {
            $this->Video->id = $id;

            //Professeur
            if($this->request->data['Professor']['id'] != '') {
                $this->Video->set('professor_id', $this->request->data['Professor']['id']);
            } else if($this->request->data['Professor']['name'] != '') {
                $this->Professor->create();
                $this->Professor->set(array(
                    'name' => $this->request->data['Professor']['name'],
                    'email' => $this->request->data['Professor']['email']
                ));
                $this->Professor->save();
            }

            if ($this->Video->save($this->request->data)) {

                //Annexes
                $this->loadModel('AnnexesVideo');
                if(isset($this->request->data['Annexe'])) {
                    foreach ($this->request->data['Annexe'] as $annexe) {
                        $this->AnnexesVideo->create();
                        $uploadDir = APP.'webroot/files/'.$this->Video->id;
                        if (!file_exists($uploadDir)) {
                            mkdir($uploadDir, 0777, true);
                        }
                        $uploadfile = $uploadDir.'/'.$annexe['file']['name'];
                        move_uploaded_file($annexe['file']['tmp_name'], $uploadfile);
                        $this->AnnexesVideo->set(array(
                            'annexe_id' => $annexe['id'],
                            'video_id' => $this->Video->id,
                            'path' => $annexe['file']['name']
                        ));
                        $this->AnnexesVideo->save();
                    }
                }

                $this->Session->setFlash(__('Your video has been updated.'));
                return $this->redirect(array('controller' => 'learnings', 'action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your video.'));
        }

        if (!$this->request->data) {
            $this->request->data = $video;

            $this->loadModel('Annexe');
            
            $type_annexes = $this->Annexe->find('all');
            $professors = $this->Professor->find('all');

            $this->set(array(
                'type_annexes' => $type_annexes,
                'professors' => $professors
            ));
        }

    }

    public function admin_delete($id_video) {
        $this->Video->delete($id_video);

        $videos = $this->Video->find('all', array( 
            'order' => 'Video.position',
            'conditions' => array(
                'Video.learning_id' => $this->Video->field('learning_id') 
            ) 
        ));

        $i = 1;
        foreach ($videos as $v) {
            $this->Video->id = $v['Video']['id'];
            $this->Video->set('position', $i);
            $this->Video->save();
            $i++;
        }

        return $this->redirect(array('controller'=>'learnings', 'action' => 'index', 'admin' => true));
    }

    public function admin_deleteAnnexe() {
        $this->layout = null;

        $this->loadModel('AnnexesVideo');
        $this->AnnexesVideo->delete($this->request->data['id_av']);

        $status = 'OK';

        $this->set(array(
            'status' => $status,
            '_serialize' => array('status')
        ));
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

    public function admin_changePosition() {
        $this->layout = null;

        $i = 1;
        foreach ($this->request->data['videos'] as $v) {
            $this->Video->id = $v;
            $this->Video->set('position', $i);
            $this->Video->save();
            $i++;
        }

    }

    public function admin_changeRecommendation() {
        $this->layout = null;

        $recommendation = $this->Video->find('first', array(
            'conditions' => array('recommendation' => 1)
        ));
        if(count($recommendation) > 0) {
            $this->Video->id = $recommendation['Video']['id'];
            $this->Video->set('recommendation', 0);
            $this->Video->save();
        }

        $this->Video->id = $this->request->data['id_video_rec'];
        $this->Video->set('recommendation', 1);
        $this->Video->save();

        $this->set(array(
          'recommendation' => $this->Video->read(),
          '_serialize' => array('recommendation')
        ));
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

}