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
//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
Router::connect('/', array('controller' => 'Homes', 'action' => 'index', 'bandhead' => false));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */

Router::connect('/contact_us', array('controller' => 'Homes', 'action' => 'contact_us', 'bandhead' => false));
//Router::connect('/custom_wristbands/:slug', array('controller' => 'orders', 'action' => 'custom_wristbands', 'bandhead' => false), array('slug' => '[a-zA-Z0-9_-]+', 'pass' => array("slug")));
Router::connect('/bandhead', array('controller' => 'Users', 'action' => 'login', 'bandhead' => true));

Router::connect('/pages/:slug', array('controller' => 'pages', 'action' => 'index'), array('slug' => '[a-zA-Z0-9_-]+', 'pass' => array("slug")));

Router::connect('/bandhead/dashboard', array('controller' => 'Users', 'action' => 'dashboard', 'bandhead' => true));
Router::connect('/bandhead/addUser', array('controller' => 'Users', 'action' => 'addUser', 'bandhead' => true));
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
