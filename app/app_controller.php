<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {
	var $helpers = array('Session', 'Ajax', 'Html', 'Time', 'Form', 'Javascript');
	var $components = array('Auth', 'Session', 'Cookie', 'RequestHandler', 'Email');
	var $uses = array('Pagetext', 'Login');
	
	function beforeFilter(){
		parent::beforeFilter();
		
		Configure::write('Config.language', 'spa');
		//$this->Auth->allow('*');
		//$this->Auth->loginAction = array('admin' => false, 'controller' => 'users', 'action' => 'login');
		//$this->Auth->loginRedirect = array('controller' => 'feeds', 'action' => 'index');
		$this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'home');
		
		// Logins.
		if ($this->Session->check('Auth.User')) {
			$login = array('user_id' => $this->Session->read('Auth.User.id'), 'ip' => $_SERVER['REMOTE_ADDR'], 'session' => $this->Session->id(), 'engine' => $_SERVER['HTTP_USER_AGENT'], 'controller' => $this->params['controller'], 'action' => $this->params['action']);
		} else {
			$login = array('user_id' => '0', 'ip' => $_SERVER['REMOTE_ADDR'], 'session' => $this->Session->id(), 'engine' => $_SERVER['HTTP_USER_AGENT'], 'controller' => $this->params['controller'], 'action' => $this->params['action']);
		}
		$this->Login->save($login);
		
		// Visitas
		$visitors = $this->Login->find('count', array('fields' => 'DISTINCT Login.ip'));
		$this->set('visitors', $visitors);
		
		// Busca las paginas que seran agregadas a los enlaces del pie de pagina.
		$pages = $this->Pagetext->find('all', array('conditions' => array('enabled' => '1')));
		$this->set('pages', $pages);
	}
}
