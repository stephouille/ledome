<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect(
	    '/admin/:action',
	    array('controller' => 'admin', 'action' => 'login', 'admin' => true)
	);

	Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
	Router::connect('/dome', array('controller' => 'pages', 'action' => 'dome'));
	Router::connect('/about', array('controller' => 'pages', 'action' => 'about'));
	Router::connect('/help', array('controller' => 'pages', 'action' => 'help'));
	Router::connect('/contact', array('controller' => 'pages', 'action' => 'contact'));
	Router::connect('/friends', array('controller' => 'pages', 'action' => 'friends'));
	Router::connect('/imprint', array('controller' => 'pages', 'action' => 'imprint'));
	Router::connect('/forgotpassword/:user_id', array('controller' => 'users', 'action' => 'forgotpassword'));
	
	Router::connect('/admin/contributors', array('controller' => 'contributors', 'action' => 'index', 'admin' => true));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

	Router::parseExtensions('json');

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
