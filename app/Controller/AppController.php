<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $uses = array('Pole');
	public $components = array('Cookie','Session','Auth','RequestHandler');
    public $helpers = array('Html','Session','Form');

    public function beforeFilter() {
    	parent::beforeFilter();

        // Specify which controller/action handles logging in:
        AuthComponent::$sessionKey = 'Auth.User';
        $this->Auth->authenticate = array(
               'Form' => array(
                   'fields' => array('username' => 'email', 'password' => 'password')
               )
           );
        $this->Auth->loginAction = array('controller'=>'users', 'action'=>'login');
        $this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'home');
        $this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'home');

        // If we get here, it is neither a 'phys' prefixed method, not an 'admin' prefixed method.
        // So, just allow access to everyone - or, alternatively, you could deny access - $this->Auth->deny();
        $this->Auth->allow();
        
        if ($this->request->prefix == 'admin') {
            $this->layout = 'admin';
        } else {
            if ($this->Session->read('Auth.User')) {
                $authUser = true;
                $user = $this->Auth->user();
            } else {
                $authUser = false;
                $user = null;
            }
            $poles = $this->Pole->find('all');

            $this->set(array(
                'authUser' => $authUser,
                'user' => $user,
                'poles' => $poles, 
                '_serialize' => array('authUser', 'user', 'poles')
            ));
        }
		
    }

    public function isAuthorized($user){
        // You can have various extra checks in here, if needed.
        // We'll just return true though. I'm pretty certain this method has to exist, even if it just returns true.
        return true;
    }
}
