<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

    var $helpers = array('Html', 'Form');

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function beforeFilter() {
	    parent::beforeFilter();
        $this->Auth->allow();
	}

	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirect());
	        } else {
	            $this->Session->setFlash(__("Nom d'user ou mot de passe invalide, réessayer"));
	        }
	    }
	}

	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User invalide'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        // $this->Captcha = $this->Components->load('Captcha', array('captchaType'=>'image', 'jquerylib'=>true, 'modelName'=>'User', 'fieldName'=>'captcha'));

        if ($this->request->is('post')) {
            // $this->User->setCaptcha($this->Captcha->getVerCode());
            // if($this->User->matchCaptcha($this->request->data['captcha'])) {
                if(!$this->User->hasAny(array('email' => $this->request->data['User']['email']))) {
                    $this->User->create();
                    if ($this->User->save($this->request->data['User'])) {

                        $email = new CakeEmail('default');
                        $email->to($this->request->data['User']['email']);
                        $email->subject('Bienvenue dans LE DOME');
                        $email->viewVars( array('username' => $this->request->data['User']['username']) );
                        $email->template('signup');
                        $email->emailFormat('html');
                        $email->send();

                        $this->Auth->login();
                        $this->Session->write('popup','congrats-inscription');
                        
                        $this->Session->setFlash(__('L\'user a été sauvegardé'));
                        return $this->redirect(array('controller'=>'pages', 'action' => 'dome'));
                    } else {
                        $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
                    }
                } else {
                    $this->Session->setFlash(__('L\'email est déjà utilisé. Merci de réessayer.'));
                }
            // } else {
            //     $this->Session->setFlash(__('Vous n\'avez pas rentré le bon code.'));
            // }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User Invalide'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('L\'user a été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User invalide'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User supprimé'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('L\'user n\'a pas été supprimé'));
        return $this->redirect(array('action' => 'index'));
    }

    public function stopPOPUP() {
        $this->Session->delete('popup');
    }   

    public function guidedTour() {
        $this->Session->write('popup','congrats-inscription');
        $this->redirect(array('controller'=>'pages', 'action' => 'dome'));
    }

    public function save_notes() {
        $this->loadModel('UsersNote');
        if ($this->Auth->login()) {
            $user = $this->Auth->user();

            if(!$this->UsersNote->hasAny(array('user_id' => $user['id'], 'video_id' => $this->request->data['video_id']))) {
                $this->UsersNote->create();
                $this->UsersNote->set(array(
                    'user_id' => $user['id'],
                    'video_id' => $this->request->data['video_id'],
                    'notes' => $this->request->data['notes']
                ));
            } else {
                $usernote = $this->UsersNote->find('first', array('conditions' => array('user_id' => $user['id'], 'video_id' => $this->request->data['video_id'])));
                $this->UsersNote->id = $usernote['UsersNote']['id'];
                $this->UsersNote->set(array(
                    'notes' => $this->request->data['notes']
                ));
            }
             $this->UsersNote->save();
        }
    }

    public function forgotpasswordajax() {

        $this->layout = null;

        $user = $this->User->find('first', array('conditions' => array('email' => $this->request->data['email'])));
        if(count($user) > 0) {
            $this->User->id = $user['User']['id'];

            $crypt_pass = $this->generateRandomString(15);
            $this->User->set('crypt_pass', $crypt_pass);
            $this->User->save();

            $email = new CakeEmail('default');
            $email->to($this->User->field('email'));
            $email->subject('Mot de passe oublié');
            $email->viewVars( array('username' => $this->User->field('username'), 'crypt_pass' => $crypt_pass, 'user_id' => $this->User->id) );
            $email->template('forgot_password');
            $email->emailFormat('html');
            $email->send();

            $status = 'OK';

        } else {
            $status = 'KO';
        }

        $this->set(array(
            'status' => $status,
            '_serialize' => array('status')
        ));

    }

    public function forgotpassword() {
        $this->User->id = $this->request->params['user_id'];
        $this->request->data = $this->User->read(null, $this->request->params['user_id']);
        unset($this->request->data['User']['password']);
    }

    public function reinit_pass() {
        

        $this->User->id = $this->request->data['User']['id'];
        if($this->User->field('crypt_pass') != null && $this->request->data['User']['crypt'] == $this->User->field('crypt_pass')) {
            debug($this->request->data);

            $this->User->set('password', $this->request->data['User']['password']);
            $this->User->set('crypt_pass', null);
            $this->User->save();

            // to do -> message OK

            $this->redirect(array('controller' => 'pages', 'action' => 'dome'));
        }
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}