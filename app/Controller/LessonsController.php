<?php

App::uses('AppController', 'Controller');

class LessonsController extends AppController {

	public $uses = array('Pole', 'Video');

	public function index() {
       
   	$poles = $this->Pole->find('all');
   	$nbVideos = $this->Video->find('count', array('conditions' => array('valid' => 1)));
   	$recommendation = $this->Video->find('first', array('conditions' => array('valid' => 1, 'recommendation' => 1)));

		$this->set(array(
      'poles' => $poles,
      'nbVideos' => $nbVideos,
      'recommendation' => $recommendation,
      '_serialize' => array('poles', 'nbVideos', 'recommendation')
    ));

  }

  public function search() {

    $this->layout = null;

    $lessons = $this->Video->find('all', array('conditions' => array('title LIKE' => '%'.$this->request->data['search'].'%')));

    $this->set(array(
      'lessons' => $lessons,
      '_serialize' => array('lessons')
    ));

  }

}