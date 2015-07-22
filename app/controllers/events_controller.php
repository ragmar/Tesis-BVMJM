<?php
class EventsController extends AppController {

	var $name = 'Events';

	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('events', 'view');
	
		if (($this->Session->read('Auth.User.group_id') == '3') && ($this->action != 'events')){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
	}
	
	function index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Evento inválido.', true));
			$this->redirect(array('action' => 'index'));
		}
		$id = base64_decode(base64_decode($id));
		$this->set('event', $this->Event->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Event->create();
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(__('El evento ha sido guardado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El evento no pudo ser guardado. Por favor, inténtelo nuevamente.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Evento Inválido.', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(__('El evento ha sido guardado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El evento no pudo ser guadado. Por favor, inténtelo nuevamente.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Event->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id inválido para el evento.', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Event->delete($id)) {
			$this->Session->setFlash(__('Evento eliminado.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('El evento no fue eliminado.', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function calendar() {
		
	}
	
	function events() {
		$events = $this->Event->find('all');
		$this->set('events', $events);
	}
}