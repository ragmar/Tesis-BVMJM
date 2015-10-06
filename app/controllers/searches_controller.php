<?php
class SearchesController extends AppController {

	var $name = 'Searches';

	function index() {
		$this->Search->recursive = 0;
		
		$this->paginate = array(
				'limit' => 20,
				'order' => array(
						'Search.id' => 'desc'
				)
		);
		
		$this->set('searches', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid search', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('search', $this->Search->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Search->create();
			if ($this->Search->save($this->data)) {
				$this->Session->setFlash(__('The search has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The search could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Search->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid search', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Search->save($this->data)) {
				$this->Session->setFlash(__('The search has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The search could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Search->read(null, $id);
		}
		$users = $this->Search->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for search', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Search->delete($id)) {
			$this->Session->setFlash(__('Search deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Search was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
