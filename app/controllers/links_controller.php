<?php
class LinksController extends AppController {

	var $name = 'Links';

	function beforeFilter(){
		parent::beforeFilter();
		// Acciones permitidas sin loguearse.
		$this->Auth->allow(
				'link'
		);
		
		if (($this->Session->read('Auth.User.group_id') == '3') && ($this->action != 'link')){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
	}
	
	function index() {
		$this->Link->recursive = 0;
		$this->set('links', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Enlace inválido.', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('link', $this->Link->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Link->create();
			if ($this->Link->save($this->data)) {
				$this->Session->setFlash(__('El enlace ha sido guardado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El enlace no pudo ser guardado. Por favor, inténtelo nuevamente.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Enlace inválido.', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Link->save($this->data)) {
				$this->Session->setFlash(__('El enlace ha sido guardado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El enlace no pudo ser guardado. Por favor, inténtelo nuevamente.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Link->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for link', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Link->delete($id)) {
			$this->Session->setFlash(__('Enlace eliminado.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('El enlace no fue eliminado.', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function link() {
		// Lista los enlaces a los usuarios finales.
		$this->Link->recursive = 0;
		$links = $this->Link->find('all');
		$this->set('links', $links);
	}
}