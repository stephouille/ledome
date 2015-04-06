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
	public $uses = array('Pole', 'UsersLesson', 'Zone', 'Contributor', 'Config');
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
		$lessons_user = $this->UsersLesson->find('all', array('recursive' => 2,'conditions' => array('user_id' => $uid)));
		$zones = $this->Zone->find('all');

		/*debug($lessons_user);
		$learnings = array();
		foreach ($zones as $z) {
			$learning = array();
			$learning['id'] = $z['Learning']['id'];
			$learning['name'] = $z['Learning']['name'];
			$learning['image'] = $z['Learning']['image'];
			$learning['coords'] = $z['Zone']['coords'];
			$learning['color'] = $z['Zone']['color'];
			if(isset($z['Learning']['Pole'])) {
				$learning['pole_id'] = $z['Learning']['Pole']['id'];
				$learning['pole_name'] = $z['Learning']['Pole']['name'];
			}
			if(isset($z['Learning']['Video'])) {
				$learning['nb_videos'] = count($z['Learning']['Video']);
			}			
			$isAddedToDome = false;
			$progress = 0;
			foreach ($lessons_user as $l) {
                if($l['Learning']['id'] == $z['Zone']['learning_id']) {
                    $isAddedToDome = true;
                    $progress = $l['UsersLesson']['progress'];
                    break;
                }
            } 
            $learning['isAddedToDome'] = $isAddedToDome;
            $learning['progress'] = $progress;
			array_push($learnings, $learning);
		}
		debug($learnings);*/

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


	public function admin_imprint() {
		$page_imprint = $this->Config->find('first', array('conditions' => array('clé' => 'page_imprint')));
    	$this->set('page_imprint', $page_imprint);
	}

	

}
