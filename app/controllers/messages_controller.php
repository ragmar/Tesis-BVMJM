<?php
class MessagesController extends AppController {

	var $name = 'Messages';

	function beforeFilter(){
		parent::beforeFilter();
		// Acciones permitidas sin loguearse.
		$this->Auth->allow(
				'add'
		);
	}
	
	function index() {
		if ($this->Session->read('Auth.User.group_id') != '1'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
		$this->Message->recursive = 0;
		
		$this->paginate = array(
				'limit' => 20,
				'order' => array(
						'Message.id' => 'desc'
				)
		);
		
		$this->set('messages', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid message', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('message', $this->Message->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Message->create();
			if ($this->Message->save($this->data)) {
				$this->Session->setFlash(__('El mensaje ha sido enviado.', true));
				//$this->redirect(array('action' => 'index'));
				$this->redirect(array('controller' => 'pagetexts', 'action' => 'page', '13'));
			} else {
				$this->Session->setFlash(__('El mensaje no pudo ser enviado. Por favor, inténte nuevamente.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid message', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Message->save($this->data)) {
				$this->Session->setFlash(__('The message has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Message->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for message', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Message->delete($id)) {
			$this->Session->setFlash(__('Message deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Message was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
