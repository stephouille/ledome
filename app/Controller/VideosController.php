<?php

App::uses('AppController', 'Controller');


class VideosController extends AppController {

    public $uses = array('Video', 'UsersLesson');

    public function index() {
        $this->Video->recursive = 0;
        $this->set('videos', $this->paginate());
    }

	public function view($id = null) {
        $this->Video->id = $id;

        $alls = $this->Video->find('all', array('conditions' => array('pole_id' => $this->Video->field('pole_id'))));

        if (!$this->Video->exists()) {
            throw new NotFoundException(__('Video invalide'));
        }
        $this->set(array(
        	'video' => $this->Video->read(null, $id),
        	'alls' => $alls
        ));
    }

    public function add() {
        $this->layout = 'admin';
        
        if ($this->request->is('post')) {
            $this->Video->create();
            if ($this->Video->save($this->request->data)) {
                $this->Session->setFlash(__('La vidéo a été sauvegardé'));
                return $this->redirect(array('controller' => 'videos', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('La vidéo n\'a pas été sauvegardée. Merci de réessayer.'));
            }
        }
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
        // require('fpdf/fpdf.php');
        require('fpdf/html2fpdf.php');

        $html2pdf = new HTML2FPDF();
        $html2pdf->AddPage();
        $html2pdf->WriteHTML(utf8_decode($this->request->data['Video']['textarea']));
        $html2pdf->Output('exemple.pdf', 'D');
    }

}