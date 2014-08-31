<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Pole', 'UsersLesson', 'Zone', 'Contributor');
	public $helpers = array('Html', 'Form', 'Captcha');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
	}

	public function beforeFilter() {
	    parent::beforeFilter();
	    // Permet aux utilisateurs de s'enregistrer et de se déconnecter
	    $this->Auth->allow('home');
	}

	public function home() {
		$this->layout = 'home';
		$this->Captcha = $this->Components->load('Captcha', array('captchaType'=>'image', 'jquerylib'=>true, 'modelName'=>'User', 'fieldName'=>'captcha'));

		if ($this->Auth->login()) {
			$this->redirect(array('controller' => 'pages', 'action' => 'dome'));
		}
	}

	public function dome() {
		$this->layout = 'default';

		$uid = $this->Auth->user('id');
		$lessons_user = $this->UsersLesson->find('all', array('conditions' => array('user_id' => $uid)));
		$zones = $this->Zone->find('all');

		// var_dump($lessons_user);

		$this->set(array(
            'lessons_user' => $lessons_user,
            'zones' => $zones,
            '_serialize' => array('lessons_user', 'zones')
        ));


	}

	public function about() { }
	public function help() { }
	public function contact() { }
	public function friends() {

		$contributors = $this->Contributor->find('all');
		$this->set(array(
            'contributors' => $contributors,
            '_serialize' => array('contributors')
        ));

	}
	public function imprint() { }

}
