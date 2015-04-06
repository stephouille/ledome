<?php

App::uses('AppController', 'Controller');


class ProfessorsController extends AppController {

    
	public function admin_index() {
		$professors = $this->Professor->find('all');
		$this->set('professors', $professors);
	}

	public function admin_add() {
        ini_set('memory_limit', '-1');

        if ($this->request->is('post')) {
            $this->Professor->create();
            if ($this->Professor->save($this->request->data)) {
                $this->Session->setFlash(__('Ami sauvegardé !'));
                return $this->redirect('/admin/professors/index');
            } else {
                $this->Session->setFlash(__("Une erreur s'est produite. Merci de réessayer."));
            }
        }

    }

    public function admin_delete($id_video) {
        $this->Professor->delete($id_video);
        return $this->redirect('/admin/professors/index');
    }

    public function admin_edit($id) {
        ini_set('memory_limit', '-1');

        if (!$id) {
            throw new NotFoundException(__('Invalid speaker'));
        }

        $contributor = $this->Professor->findById($id);
        if (!$contributor) {
            throw new NotFoundException(__('Invalid speaker'));
        }

        if ($this->request->is(array('contributor', 'put'))) {
            $this->Professor->id = $id;

            if ($this->Professor->save($this->request->data)) {
                $this->Session->setFlash(__('Your speaker has been updated.'));
                return $this->redirect('/admin/professors/index');
            }
            $this->Session->setFlash(__('Unable to update your speaker.'));
        }

        if (!$this->request->data) {
            $this->request->data = $contributor;
        }

    }

}