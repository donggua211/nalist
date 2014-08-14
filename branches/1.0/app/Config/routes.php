<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
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
	Router::connect('/', array('controller' => 'entry', 'action' => 'index'));
	
	//categories
	Router::connect('/categories/:action/*', array('controller' => 'categories'));
	Router::connect('/filters/:action/*', array('controller' => 'filters'));
	
	//Short of categories: cat.
	Router::connect('/:city/cat/:cat_slug/*', array('controller' => 'infos', 'action' => 'index'));
	
	//Users
	Router::connect('/users', array('controller' => 'users', 'action' => 'index'));
	Router::connect('/users/:action/*', array('controller' => 'users'));
	
	//Pages
	Router::connect('/pages', array('controller' => 'pages', 'action' => 'index'));
	Router::connect('/pages/:action/*', array('controller' => 'pages'));
	
	
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

	
	//Roll for city profiles
	Router::connect('/:city', array('controller' => 'entry', 'action' => 'city'));
	Router::connect('/:city/:controller', array('action' => 'index'), array('city' => '[a-z]+'));
	Router::connect('/:city/:controller/:action/*', array(), array('city' => '[a-z]+'));
	
/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';