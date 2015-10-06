<?php
class UserItemsController extends AppController {

	var $name = 'UserItems';

	function index() {
		$this->UserItem->recursive = 1;
		$this->set('userItems', $this->paginate(array('UserItem.user_id' => $this->Session->read('Auth.User.id'))));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('userItem', $this->UserItem->read(null, $id));
	}

	function add() { //debug($this->data); die;
		if (!empty($this->data)) {
			$this->UserItem->create();
			if ($this->UserItem->save($this->data)) {
				$this->Session->setFlash(__('La obra ha sido guardada', true));
				//$this->redirect($_SERVER['HTTP_REFERER']);
				$this->redirect(array('action' => 'index'));
				//$this->redirect(array('controller' => 'items', 'action' => 'view', $this->data['UserItem']['item_id']));
			} else {
				$this->Session->setFlash(__('La obra no pudo ser guardada. Por favor, inténte de nuevo.', true));
			}
		}
		$users = $this->UserItem->User->find('list');
		$items = $this->UserItem->Item->find('list');
		$this->set(compact('users', 'items'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->UserItem->save($this->data)) {
				$this->Session->setFlash(__('The user item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->UserItem->read(null, $id);
		}
		$users = $this->UserItem->User->find('list');
		$items = $this->UserItem->Item->find('list');
		$this->set(compact('users', 'items'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id inválido para la obra', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->UserItem->delete($id)) {
			$this->Session->setFlash(__('Obra eliminada', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('La obra no pudo ser eliminada', true));
		$this->redirect(array('action' => 'index'));
	}
}
