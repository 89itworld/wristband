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
    
    public $components = array('Auth', 'Session', 'RequestHandler', 'DebugKit.Toolbar');
    public $helpers = array('Html', 'Session', 'Js', 'Mysession');
    
    
    public function beforeFilter() {
         
         $this->Auth->loginError = 'Invalid username or password , Please try again.';
         $this->Auth->authError = 'You are not authorised to access that location !';
         
         if (isset($this->params['bandhead'])) {
             
            AuthComponent::$sessionKey = 'Auth.Admin';

            $this->Auth->loginRedirect = array('controller' => 'Users', 'action' => 'dashboard', 'bandhead' => true);
            $this->Auth->logoutRedirect = array('controller' => 'Users', 'action' => 'login', 'bandhead' => true);
            $this->Auth->redirect = array('controller' => 'Users', 'action' => 'login', 'bandhead' => true);
            $user_scope = array('User.user_type' => 1, 'User.is_active' => 1);
            
        } else {
            
          $this->Auth->loginRedirect = array('controller' => 'Users', 'action' => 'dashboard', 'bandhead' => false);
            $this->Auth->logoutRedirect = array('controller' => 'Users', 'action' => 'login', 'bandhead' => false);
            $this->Auth->redirect = array('controller' => 'Users', 'action' => 'login', 'bandhead' => false);
            $user_scope = array('User.user_type' => 2, 'User.is_active' => 1);
        }
        
        $this->Auth->authenticate = array(
            AuthComponent::ALL => array(
                'userModel' => 'User',
                'fields' => array(
                    'username' => 'email',
                    'password' => 'password'
                ),
                'scope' => $user_scope,
            ), 'Form'
        );
        

        
        
        if (isset($this->request->params['bandhead']) && ($this->request->params['prefix'] == 'bandhead')) {
                
            $this->layout = 'dashboard';
        }

    }
    
    
}
