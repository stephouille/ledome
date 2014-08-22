<?php

App::uses('AppController', 'Controller');

class PolesController extends AppController {

	public function view($id = null) {
        $this->Pole->id = $id;

        if (!$this->Pole->exists()) {
            throw new NotFoundException(__('Video invalide'));
        }
        $this->set(array(
        	'pole' => $this->Pole->read(null, $id)
        ));
    }

}
