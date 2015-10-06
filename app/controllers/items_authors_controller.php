<?php
class ItemsAuthorsController extends AppController {

	var $name = 'ItemsAuthors';

	function beforeFilter(){
		parent::beforeFilter();
	
		if ($this->Session->read('Auth.User.group_id') != '1'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
	}
	
	function index() {
		$this->ItemsAuthor->recursive = 0;
		$this->set('itemsAuthors', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid items author', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('itemsAuthor', $this->ItemsAuthor->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ItemsAuthor->create();
			if ($this->ItemsAuthor->save($this->data)) {
				$this->Session->setFlash(__('The items author has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The items author could not be saved. Please, try again.', true));
			}
		}
		$items = $this->ItemsAuthor->Item->find('list');
		$authors = $this->ItemsAuthor->Author->find('list');
		$this->set(compact('items', 'authors'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid items author', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ItemsAuthor->save($this->data)) {
				$this->Session->setFlash(__('The items author has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The items author could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ItemsAuthor->read(null, $id);
		}
		$items = $this->ItemsAuthor->Item->find('list');
		$authors = $this->ItemsAuthor->Author->find('list');
		$this->set(compact('items', 'authors'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for items author', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ItemsAuthor->delete($id)) {
			$this->Session->setFlash(__('Items author deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Items author was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
