<?php
class LoginsController extends AppController {

	var $name = 'Logins';

	function beforeFilter(){
		parent::beforeFilter();

		if ($this->Session->read('Auth.User.group_id') != '1'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
	}
	
	function index() {
		$this->Login->recursive = 0;
		
		$this->paginate = array(
				'limit' => 20,
				'order' => array(
						'Login.id' => 'desc'
				)
		);
		
		$this->set('logins', $this->paginate());
		
		//$yesterday = $this->Login->find('count', array('fields' => 'Login.ip', 'conditions' => array('Login.created >=' => date('Y-m-d 00:00:00', time()), 'Login.created <=' => date('Y-m-d 23:59:59', time()))));
		//$this->set('yesterday', $yesterday);
		
		$today = $this->Login->find('count', array('fields' => 'Login.ip', 'conditions' => array('Login.created >=' => date('Y-m-d 00:00:00', time()), 'Login.created <=' => date('Y-m-d 23:59:59', time()))));
		$this->set('today', $today);
		$total = $this->Login->find('count');
		$this->set('total', $total);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid login', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('login', $this->Login->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Login->create();
			if ($this->Login->save($this->data)) {
				$this->Session->setFlash(__('The login has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The login could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Login->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid login', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Login->save($this->data)) {
				$this->Session->setFlash(__('The login has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The login could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Login->read(null, $id);
		}
		$users = $this->Login->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for login', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Login->delete($id)) {
			$this->Session->setFlash(__('Login deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Login was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
