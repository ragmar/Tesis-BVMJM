<?php
class ItemsPicturesController extends AppController {

	var $name = 'ItemsPictures';
	var $components = array('Attachment');

	function beforeFilter(){
		parent::beforeFilter();
	
		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
	}
	
	function index() {
		$this->ItemsPicture->recursive = 0;
		$this->set('itemsPictures', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid items Picture', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('itemsPicture', $this->ItemsPicture->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ItemsPicture->create();
			if ($this->ItemsPicture->save($this->data)) {
				$this->Session->setFlash(__('The items Picture has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The items Picture could not be saved. Please, try again.', true));
			}
		}
		$items = $this->ItemsPicture->Item->find('list');
		$pictures = $this->ItemsPicture->Picture->find('list');
		$this->set(compact('items', 'pictures'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid items Picture', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ItemsPicture->save($this->data)) {
				$this->Session->setFlash(__('The items Picture has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The items Picture could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ItemsPicture->read(null, $id);
		}
		$items = $this->ItemsPicture->Item->find('list');
		$pictures = $this->ItemsPicture->Picture->find('list');
		$this->set(compact('items', 'pictures'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id invalido para el archivo.', true));
			$this->redirect(array('controller' => 'items', 'action'=>'view', $this->passedArgs[1]));
		}

		$picture = $this->ItemsPicture->find('first', array('conditions' => array('ItemsPicture.id' => $id)));
		if ($this->ItemsPicture->delete($id)) {
			$this->Session->setFlash(__('Archivo eliminado.', true));
			$this->Attachment->delete_files($picture['ItemsPicture']['picture_file_path']);
			$this->redirect(array('controller' => 'items', 'action'=>'view', $this->passedArgs[1]));
		}
		$this->Session->setFlash(__('El archivo no fue eliminado.', true));
		$this->redirect(array('controller' => 'items', 'action'=>'view', $this->passedArgs[1]));
	}
	
	function images() {
		if (!empty($this->data)) {
			$data = $this->data;
			$items = $this->data['Item'];
			$i = 0;
			$files = array();
			$id = $this->data['ItemsPictures']['item_id'];
			unset($this->data['Item']);
			unset($this->data['ItemsPictures']);
			
			foreach ($items as $item):
				$this->data['ItemsPicture']['item_id'] = $id;
				$this->data['ItemsPicture']['picture'] = $item;
				if ($item['error'] == 0) {
					if ($this->Attachment->upload($this->data['ItemsPicture'], 'picture')){ // Si se subió el archivo...
						$this->ItemsPicture->create();
						if ($this->ItemsPicture->save($this->data)) {
							$this->Session->setFlash(__('La foto ha sido guardada.', true));
						} else {
							$this->Session->setFlash(__('La foto no pudo ser guardada. Por favor, intentelo nuevamente.', true));
						}
					}
					unset($this->data['ItemsPicture']);
					$files[$i] = $item['name'];
					$i++;
				}
			endforeach;
			$this->set('files', $files);
			$this->Session->setFlash(__('The picture was uploaded.', true));
			
			if (empty($files)){
				$this->Session->setFlash(__('The pictures was not uploaded.', true));
			} else {
				$this->Session->setFlash('Se subieron ' . count($files) . ' archivo(s).');
			}
			$this->redirect(array('controller' => 'items', 'action' => 'view/'.$data['ItemsPictures']['item_id']));
		}
	}
}
