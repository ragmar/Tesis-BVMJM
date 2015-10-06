<?php
class NewsController extends AppController {

	var $name = 'News';

	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('news');
	}
		
	function index() {
		$this->News->recursive = 0;
		$this->set('news', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid news', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('news', $this->News->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->News->create();
			if ($this->News->save($this->data)) {
				$this->Session->setFlash(__('La noticia ha sido guardada.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La noticia no pudo ser guardada. Por favor, inténte nuevamente.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Noticia inválida.', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->News->save($this->data)) {
				$this->Session->setFlash(__('La noticia ha sido guardada.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La noticia no pudo ser guardada. Por favor, inténte nuevamente.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->News->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id inválido de la noticia.', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->News->delete($id)) {
			$this->Session->setFlash(__('Noticia eliminada.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('La noticia no fue eliminada.', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function news() {
		$this->autoRender = false;
		$news = $this->News->find('all', array('conditions' => array('published', '1'), 'order' => 'created DESC'));
		return $news;
	}
}
