<?php
class FaqsController extends AppController {

	var $name = 'Faqs';

	function beforeFilter(){
		parent::beforeFilter();
		// Acciones permitidas sin loguearse.
		$this->Auth->allow(
				'faqs'
		);
		
		/*if ($this->Session->read('Auth.User.group_id') != '1'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}*/
	}
	
	function index() {
		$this->Faq->recursive = 0;
		$this->set('faqs', $this->paginate());
	}
	
	function faqs() {
		$this->Faq->recursive = 0;
		$this->set('faqs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid faq', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('faq', $this->Faq->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Faq->create();
			if ($this->Faq->save($this->data)) {
				$this->Session->setFlash(__('La pregunta ha sido guardada.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La pregunta no ha sido guardada. Por favor, inténtelo nuevamente.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid faq', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Faq->save($this->data)) {
				$this->Session->setFlash(__('La pregunta ha sido guardada.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La pregunta no ha sido guardada. Por favor, inténtelo nuevamente.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Faq->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for faq', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Faq->delete($id)) {
			$this->Session->setFlash(__('Pregunta eliminada.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('La pregunta no fue eliminada.', true));
		$this->redirect(array('action' => 'index'));
	}
}
