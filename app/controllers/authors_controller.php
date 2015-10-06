<?php
class AuthorsController extends AppController {

	var $name = 'Authors';
	var $components = array('Attachment');

	function beforeFilter(){
		parent::beforeFilter();
		// Acciones permitidas sin loguearse.
		$this->Auth->allow(
				'view'
		);
	}
	
	function index() {
		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
		$this->Author->recursive = 0;
		$this->paginate = array('limit' => '20', 'page' => '1', 'order' => 'name ASC');
		$this->set('authors', $this->paginate());
	}

	function view($id = null) {
		$this->Author->recursive = 2;
		if (!$id) {
			$this->Session->setFlash(__('Invalid author', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('author', $this->Author->read(null, $id));
	}

	function add() {
		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
		if (!empty($this->data)) {
			if ($this->Attachment->upload($this->data['Author'])){ // Si se subió el archivo...
				$this->Author->create();
				if ($this->Author->save($this->data)) {
					$this->Session->setFlash(__('El autor ha sido guardado.', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('El autor no pudo ser guardado. Por favor, intente nuevamente.', true));
				}
			}
		}
		$items = $this->Author->Item->find('list');
		$this->set(compact('items'));
	}

	function edit($id = null) {
		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Autor invalido.', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->data['Author']['author']['error'] == '0'){
				$author = $this->Author->find('first', array('conditions' => array('Author.id' => $id)));
				$this->Attachment->delete_files($author['Author']['author_file_path']);
				$i = $this->Attachment->upload($this->data['Author']); // Si se subió el archivo...
			}
			if ($this->Author->save($this->data)) {
				$this->Session->setFlash(__('El autor ha sido modificado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El autor no pudo ser modificado. Por favor, intente nuevamente.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Author->read(null, $id);
		}
		$items = $this->Author->Item->find('list');
		$this->set(compact('items'));
	}

	function delete($id = null) {
		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
		if (!$id) {
			$this->Session->setFlash(__('Id invalido para el autor.', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$author = $this->Author->find('first', array('conditions' => array('Author.id' => $id)));
		if ($this->Author->delete($id)) {
			$this->Session->setFlash(__('Autor eliminado.', true));
			$this->Attachment->delete_files($author['Author']['author_file_path']);
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('El autor no fue eliminado.', true));
		$this->redirect(array('action' => 'index'));
	}
}
