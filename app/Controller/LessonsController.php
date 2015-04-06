<?php

App::uses('AppController', 'Controller');

class LessonsController extends AppController {

	public $uses = array('Pole', 'Video', 'Learning');

	public function index() {

    if($this->Session->read('popup') == 'congrats-inscription') {
      $this->Session->write('popup', 'choose-learning');
    }
       
   	$poles = $this->Pole->find('all');
   	$nbVideos = $this->Video->find('count');
   	$recommendation = $this->Video->find('first', array('conditions' => array('recommendation' => 1)));

		$this->set(array(
      'poles' => $poles,
      'nbVideos' => $nbVideos,
      'recommendation' => $recommendation,
      '_serialize' => array('poles', 'nbVideos', 'recommendation')
    ));

  }

  public function search() {
    $this->layout = null;

    $lessons = $this->Learning->find('all', array('conditions' => array('Learning.name LIKE' => '%'.$this->request->data['search'].'%')));

    $this->set(array(
      'lessons' => $lessons,
      '_serialize' => array('lessons')
    ));

  }

}