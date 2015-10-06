<?php
class PagetextsController extends AppController {

	var $name = 'Pagetexts';

	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('*');
	}
	
	function index() {
		if ($this->Session->read('Auth.User.group_id') != '1'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
		$this->Pagetext->recursive = 0;
		$this->set('pagetexts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Página inválida.', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pagetext', $this->Pagetext->read(null, $id));
	}

	function add() {
		if ($this->Session->read('Auth.User.group_id') != '1'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
		if ($this->Session->read('Auth.User.group_id') != '1'){
			$this->Session->setFlash(__('Access restricted.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
		if (!empty($this->data)) {
			$this->Pagetext->create();
			if ($this->Pagetext->save($this->data)) {
				$this->Session->setFlash(__('La página ha sido guardada.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La página no pudo ser guardada. Por favor, inténtelo nuevamente.', true));
			}
		}
	}

	function edit($id = null) {
		if ($this->Session->read('Auth.User.group_id') != '1'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
		if ($this->Session->read('Auth.User.group_id') != '1'){
			$this->Session->setFlash(__('Access restricted.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Página inválida.', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Pagetext->save($this->data)) {
				$this->Session->setFlash(__('La página ha sido guardada.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La página no pudo ser guardada. Por favor, inténtelo nuevamente.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Pagetext->read(null, $id);
		}
	}

	function delete($id = null) {
		if ($this->Session->read('Auth.User.group_id') != '1'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
		if ($this->Session->read('Auth.User.group_id') != '1'){
			$this->Session->setFlash(__('Access restricted.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
		if (!$id) {
			$this->Session->setFlash(__('Id inválido para la página.', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Pagetext->delete($id)) {
			$this->Session->setFlash(__('Página eliminada.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('La página no pudo ser guardada.', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function page($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Página inválida.', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('text', $this->Pagetext->read(null, $id));
	}
}
