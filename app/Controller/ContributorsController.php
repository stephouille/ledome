<?php

App::uses('AppController', 'Controller');


class ContributorsController extends AppController {

    
	public function admin_index() {
		$contributors = $this->Contributor->find('all');
		$this->set('contributors', $contributors);
	}

	public function admin_add() {
        ini_set('memory_limit', '-1');

        if ($this->request->is('post')) {
            $this->Contributor->create();
            if ($this->Contributor->save($this->request->data)) {
                $this->Session->setFlash(__('Ami sauvegardé !'));
                return $this->redirect('/admin/contributors/index');
            } else {
                $this->Session->setFlash(__("Une erreur s'est produite. Merci de réessayer."));
            }
        }

    }

    public function admin_delete($id_video) {
        $this->Contributor->delete($id_video);
        return $this->redirect('/admin/contributors/index');
    }

    public function admin_edit($id) {
        ini_set('memory_limit', '-1');

        if (!$id) {
            throw new NotFoundException(__('Invalid friend'));
        }

        $contributor = $this->Contributor->findById($id);
        if (!$contributor) {
            throw new NotFoundException(__('Invalid friend'));
        }

        if ($this->request->is(array('contributor', 'put'))) {
            $this->Contributor->id = $id;

            if ($this->Contributor->save($this->request->data)) {
                $this->Session->setFlash(__('Your friend has been updated.'));
                return $this->redirect('/admin/contributors/index');
            }
            $this->Session->setFlash(__('Unable to update your friend.'));
        }

        if (!$this->request->data) {
            $this->request->data = $contributor;
        }

    }

}