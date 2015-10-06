<?php
class DocumentsController extends AppController {
	
	var $name = 'Documents';
	var $components = array (
			'Attachment' 
	);
	var $uses = array (
			'Item',
			'Search' 
	);
	
	function index() {
		App::import('Vendor', 'pdf2text');
		if (!empty($this->data)) {
		$conditions =  array('OR' => array( //||326459 
					array('Item.h-006' => 't', 'Item.h-007' => 'm', 'Item.published' => '1', 'Item.type'  => '5')));
				
			if (!empty($this->data['documents']['Titulo'])) {
				$conditions['Item.245 LIKE'] = '%^a' . $this->data['documents']['Titulo'] . '%';
			}
			if (!empty($this->data['documents']['Autor'])) {
				$conditions['Item.100 LIKE'] = '%^a' . $this->data['documents']['Autor'] . '%';
			}
			if (!empty($this->data['documents']['Lugar'])) {
				$conditions['Item.260 LIKE'] = '%^a' . $this->data['documents']['Lugar'] . '%';
			}
			if (!empty($this->data['documents']['Materia'])) {
				$conditions['Item.650 LIKE'] = '%^a' . $this->data['documents']['Materia'] . '%';
			}
			if (!empty($this->data['documents']['PalabrasClave'])) {
				$conditions['Item.653 LIKE'] = '%^a' . $this->data['documents']['PalabrasClave'] . '%';
			}
				
		} else {
			//	$conditions = array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1');
				$conditions = array('OR' => array( //||
				array('Item.h-006' => 't', 'Item.h-007' => 'm', 'Item.published' => '1', 'Item.type'  => '5')));
		}
	
		$this->Item->recursive = 1;
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'ASC'
		);
		//debug($conditions); die;
		$this->set('items', $this->paginate('Item'));
	}
	
	function add() {
		App::import('Vendor', 'pdf2text');
		
		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Access restricted.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		if (!empty($this->data)) {
			$data = $this->data;
			$time = time();
		
			if ($_FILES['data']['error']['Document']['cover'] == 0){
				$uploaddir = "..".DS."webroot".DS."covers".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['Document']['cover']['name']);
				copy($_FILES['data']['tmp_name']['Document']['cover'], $uploadfile);
			}
		
			if ($_FILES['data']['error']['Document']['item'] == 0){
				$uploaddir = "..".DS."webroot".DS."files".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['Document']['item']['name']);
				copy($_FILES['data']['tmp_name']['Document']['item'], $uploadfile);
			}
				
			if ($_FILES['data']['error']['Document']['item'] == 0){
				$data['Document']['item_file_path'] = $time.'_'.$data['Document']['item']['name'];
				$data['Document']['item_content_type'] = $data['Document']['item']['type'];
				$data['Document']['item_file_size'] = $data['Document']['item']['size'];
				$data['Document']['item_file_name'] = $data['Document']['item']['name'];
		
				$data['Document']['cover_path'] = $time.'_'.$data['Document']['cover']['name'];
				$data['Document']['cover_type'] = $this->data['Document']['cover']['type'];
				$data['Document']['cover_size'] = $this->data['Document']['cover']['size'];
				$data['Document']['cover_name'] = $this->data['Document']['cover']['name'];
				$fileName = $data['Document']['item_file_path'];
			}
						
			unset($data['Document']['cover']);
			unset($data['Document']['item']);
			$data['Item'] = $data['Document'];
			unset($data['Document']);
				
			$this->Item->create();
			if ($this->Item->save($data)) {
				$item = $this->Item->getLastInsertID();
				if(isset($fileName)){
					$this->ParsePdfToText($fileName, $item);
				}
				$this->Session->setFlash(__('El Documento ha sido guardado.', true));
				$this->redirect(array('action' => 'view/' . $item));
			} else {
				$this->Session->setFlash(__('El Documento no pudo ser guardado. Por favor, intentélo nuevamente.', true));
				$this->redirect(array('action' => 'add'));
			}
				
		}
	
		// ------------------------- Sub-Campo 100a ------------------------- //
	
		$authors = $this->Item->find('list', array('fields' => array('100')));
	
		if ($authors) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($authors as $a => $v){
				$v = $this->marc21_decode($v);
				if (isset($v['a'])) {$list[$a] = $v['a'];}
			}
				
			$list = array_unique($list);
			asort($list);
				
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
				
			$authors = "[" . $l . "]";
			$this->set(compact('authors', $authors));
		} else {
			$this->set(compact('authors', false));
		}
	
		// ------------------------- Sub-Campo 245a ------------------------- //
	
		$titles = $this->Item->find('list', array('fields' => array('245')));
	
		if ($titles) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($titles as $a => $v){
				$v = $this->marc21_decode($v);
				if (isset($v['a'])) {$list[$a] = $v['a'];}
			}
				
			$list = array_unique($list);
			asort($list);
				
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
				
			$titles = "[" . $l . "]";
			$this->set(compact('titles', $titles));
		} else {
			$this->set(compact('titles', false));
		}
	
	// ------------------------- Sub-Campo 260a ------------------------- //
		
		$places = $this->Item->find('list', array('fields' => array('260')));
		
		if ($places) {
			$list = array();
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($places as $a => $v){
				$v = $this->marc21_decode($v);
				if (isset($v['a'])) {$list[$a] = $v['a'];}
			}
	
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				if ($l == "") {
					$l = '{ value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				} else {
					$l = $l . ', { value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				}
			}
			
			$places = "[" . $l . "]";
			$this->set(compact('places', $places));
		} else {
			$this->set(compact('places', false));
		}
		
		// ------------------------- Sub-Campo 260b ------------------------- //
		
		$editors = $this->Item->find('list', array('fields' => array('260')));
		
		if ($editors) {
			$list = array();
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($editors as $a => $v){
				$v = $this->marc21_decode($v);
				if (isset($v['b'])) {$list[$a] = $v['b'];}
			}
			
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				if ($l == "") {
					$l = '{ value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				} else {
					$l = $l . ', { value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				}
			}
			
			$editors = "[" . $l . "]";
			$this->set(compact('editors', $editors));
		} else {
			$this->set(compact('editors', false));
		}
		
		// ------------------------- Sub-Campo 260c ------------------------- //
		
		$years = $this->Item->find('list', array('fields' => array('260')));
		
		if ($years) {
			$list = array();
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($years as $a => $v){
				$v = $this->marc21_decode($v);
				if (isset($v['c'])) {$list[$a] = $v['c'];}
			}
			
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				if ($l == "") {
					$l = '{ value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				} else {
					$l = $l . ', { value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				}
			}
			
			$years = "[" . $l . "]";
			$this->set(compact('years', $years));
		} else {
			$this->set(compact('years', false));
		}
	
	
		//-----------------------SubCampo 500a------------------//
	
		$descriptions = $this->Item->find('list', array('fields' => array('500')));
	
		if ($descriptions) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($descriptions as $a => $v){
				$v = $this->marc21_decode($v);
				if (isset($v['a'])) {$list[$a] = $v['a'];}
			}
				
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
				
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
				
			$descriptions = "[" . $l . "]";
			$this->set(compact('descriptions', $descriptions));
		} else {
			$this->set(compact('descriptions', false));
		}
		// ------------------------- Sub-Campo 362a ------------------------- //
	
		$publications = $this->Item->find('list', array('fields' => array('362')));
	
		if ($publications) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($publications as $a => $v){
				$v = $this->marc21_decode($v);
				if (isset($v['a'])) {$list[$a] = $v['a'];}
			}
				
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
				
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
				
			$publications = "[" . $l . "]";
			$this->set(compact('publications', $publications));
		} else {
			$this->set(compact('publications', false));
		}
	
		// ------------------------- Sub-Campo 653a ------------------------- //
	
		$matters = $this->Item->find('list', array('fields' => array('653')));
	
		if ($matters) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($matters as $a => $v){
				$v = $this->marc21_decode($v);
				if (isset($v['a'])) {$list[$a] = $v['a'];}
			}
				
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
				
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
				
			$matters = "[" . $l . "]";
			$this->set(compact('matters', $matters));
		} else {
			$this->set(compact('matters', false));
		}
	}
	
	function advanced_search() {
	
		if (!empty($this->data)) {
			$this->layout = 'default';
			$this->Item->recursive = -1;
			$conditions = array('Item.h-006' => 't', 'Item.h-007' => 'm', 'Item.published' => '1');
				
			if (!empty($this->data['Documents']['245'])) { // Titulo
				$conditions['Item.245 LIKE'] = '%' . $this->data['Documents']['245'] . '%';
			}
				
			if (!empty($this->data['Documents']['100'])) { // Autor
				$conditions['Item.100 LIKE'] = '%' . $this->data['Documents']['100'] . '%';
			}
	
			if (!empty($this->data['Documents']['653'])) { // Palabras clave
				$conditions['Item.653 LIKE'] = '%' . $this->data['Documents']['653'] . '%';
			}
	
			if (!empty($this->data['Documents']['260'])) { // Lugar, editor o fecha
				$conditions['Item.260 LIKE'] = '%' . $this->data['Documents']['260'] . '%';
			}
				
			if (!empty($this->data['Documents']['650'])) { // Materia
				$conditions['Item.650 LIKE'] = '%' . $this->data['Documents']['650'] . '%';
			}
				
			//debug($conditions); die;
				
			//$items = $this->Item->find('all', array('conditions' => $conditions));
			//debug($items); die;
				
			$this->paginate = array(
						//'limit' => '20',
					'conditions' => $conditions
			);
				
			$this->set('items', $this->paginate('Item'));
		}else{
			$this->set('items', array());
		}
	}
	
	function beforeFilter() {
		parent::beforeFilter ();
		// Acciones permitidas sin loguearse.
		$this->Auth->allow ( 'index', 'view', 'search', 'advanced_search', 'century', 'year', 'matter', 'author', 'title', 'marc21', 'intro' );
	}
	
	function edit($id = null) {
		App::import('Vendor', 'pdf2text');

		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Access restricted.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
	
		$item = $this->Item->read(null, $id);
		$this->set('item', $item);
	
		if (!empty($this->data)) {
			$data = $this->data;
			$time = time();
				
			if ($_FILES['data']['error']['Document']['cover'] == 0){
				$uploaddir = "..".DS."webroot".DS."covers".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['Document']['cover']['name']);
				copy($_FILES['data']['tmp_name']['Document']['cover'], $uploadfile);
				unlink($uploaddir.$item['Item']['cover_path']);
			}
				
			if ($_FILES['data']['error']['Document']['item'] == 0){
				$uploaddir = "..".DS."webroot".DS."files".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['Document']['item']['name']);
				copy($_FILES['data']['tmp_name']['Document']['item'], $uploadfile);
				unlink($uploaddir.$item['Item']['item_file_path']);
			}
				
			//if ($_FILES['data']['error']['Document']['item'] == 0){
				
			if ($_FILES['data']['error']['Document']['item'] == 0){
				$data['Document']['item_file_path'] = $time.'_'.$data['Document']['item']['name'];
				$data['Document']['item_content_type'] = $data['Document']['item']['type'];
				$data['Document']['item_file_size'] = $data['Document']['item']['size'];
				$data['Document']['item_file_name'] = $data['Document']['item']['name'];
				$fileName = $data['Document']['item_file_path'];
			}
			unset($data['Document']['item']);
				
			if ($_FILES['data']['error']['Document']['cover'] == 0){
				$data['Document']['cover_path'] = $time.'_'.$data['Document']['cover']['name'];
				$data['Document']['cover_type'] = $this->data['Document']['cover']['type'];
				$data['Document']['cover_size'] = $this->data['Document']['cover']['size'];
				$data['Document']['cover_name'] = $this->data['Document']['cover']['name'];
			}
			unset($data['Document']['cover']);
				
			$data['Item'] = $data['Document'];
			unset($data['Document']);
				
			if ($this->Item->save($data)) {
				if(isset($fileName)){
					$this->ParsePdfToText($fileName, $id);
				}
				$this->Session->setFlash(__('El archivo ha sido guardado.', true));
				$this->redirect(array('action' => 'view', $data['Item']['id']));
			} else {
				$this->Session->setFlash(__('El archivo no pudo ser guardado. Por favor, intentélo nuevamente.', true));
			}
				
			//} else {
			//	$this->Session->setFlash('No se subió ningun archivo de la obra. Debe cargar alguno.');
			//	$this->redirect(array('action' => 'add'));
			//}
				
			$this->redirect(array('action' => 'index'));
	}
	
	// ------------------------- Sub-Campo 100a ------------------------- //
	
	$authors = $this->Item->find('list', array('fields' => array('100')));
	
	if ($authors) {
		$list = "";
		// Recorre para extraer el contenido del subcampo deseado.
		foreach ($authors as $a => $v){
			$v = $this->marc21_decode($v);
			if (isset($v['a'])) {$list[$a] = $v['a'];}
		}
			
		$list = array_unique($list);
		asort($list);
			
		// Recorre para darle el formato deseado.
		$l = "";
		foreach ($list as $a => $v){
			$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
		}
			
		$authors = "[" . $l . "]";
		$this->set(compact('authors', $authors));
	} else {
		$this->set(compact('authors', false));
	}
	
	// ------------------------- Sub-Campo 245a ------------------------- //
	
	$titles = $this->Item->find('list', array('fields' => array('245')));
	
	if ($titles) {
		$list = "";
		// Recorre para extraer el contenido del subcampo deseado.
		foreach ($titles as $a => $v){
			$v = $this->marc21_decode($v);
			if (isset($v['a'])) {$list[$a] = $v['a'];}
		}
			
		$list = array_unique($list);
		asort($list);
			
		// Recorre para darle el formato deseado.
		$l = "";
		foreach ($list as $a => $v){
			$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
		}
			
		$titles = "[" . $l . "]";
		$this->set(compact('titles', $titles));
	} else {
		$this->set(compact('titles', false));
	}
	
	
	//-----------------------SubCampo 500a------------------//
	
	$descriptions = $this->Item->find('list', array('fields' => array('500')));
	
	if ($descriptions) {
		$list = "";
		// Recorre para extraer el contenido del subcampo deseado.
		foreach ($descriptions as $a => $v){
			$v = $this->marc21_decode($v);
			if (isset($v['a'])) {$list[$a] = $v['a'];}
		}
			
		$list = array_unique($list); // Elimina repetidos.
		asort($list); // Ordena de A a la Z.
			
		// Recorre para darle el formato deseado.
		$l = "";
		foreach ($list as $a => $v){
			$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
		}
			
		$descriptions = "[" . $l . "]";
		$this->set(compact('descriptions', $descriptions));
	} else {
		$this->set(compact('descriptions', false));
	}
	
	// ------------------------- Sub-Campo 362a ------------------------- //
	
	$publications = $this->Item->find('list', array('fields' => array('362')));
	
	if ($publications) {
		$list = "";
		// Recorre para extraer el contenido del subcampo deseado.
		foreach ($publications as $a => $v){
			$v = $this->marc21_decode($v);
			if (isset($v['a'])) {$list[$a] = $v['a'];}
		}
			
		$list = array_unique($list); // Elimina repetidos.
		asort($list); // Ordena de A a la Z.
			
		// Recorre para darle el formato deseado.
		$l = "";
		foreach ($list as $a => $v){
			$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
		}
			
		$publications = "[" . $l . "]";
		$this->set(compact('publications', $publications));
	} else {
		$this->set(compact('publications', false));
	}
	
	// ------------------------- Sub-Campo 653a ------------------------- //
	
	$matters = $this->Item->find('list', array('fields' => array('653')));
	
	if ($matters) {
		$list = "";
		// Recorre para extraer el contenido del subcampo deseado.
		foreach ($matters as $a => $v){
			$v = $this->marc21_decode($v);
			if (isset($v['a'])) {$list[$a] = $v['a'];}
		}
			
		$list = array_unique($list); // Elimina repetidos.
		asort($list); // Ordena de A a la Z.
			
		// Recorre para darle el formato deseado.
		$l = "";
		foreach ($list as $a => $v){
			$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
		}
			
		$matters = "[" . $l . "]";
		$this->set(compact('matters', $matters));
	} else {
		$this->set(compact('matters', false));
	}
	
	//---------------------------Sub-Campo 650a----------------------------//
	$matternames = $this->Item->find('list', array('fields' => array('650')));
	
	if ($matternames) {
		$list = "";
		// Recorre para extraer el contenido del subcampo deseado.
		foreach ($matternames as $a => $v){
			$v = $this->marc21_decode($v);
			if (isset($v['a'])) {$list[$a] = $v['a'];}
		}
			
		$list = array_unique($list);
		asort($list);
			
		// Recorre para darle el formato deseado.
		$l = "";
		foreach ($list as $a => $v){
			$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
		}
			
		$matternames = "[" . $l . "]";
		$this->set(compact('matternames', $matternames));
	} else {
		$this->set(compact('matternames', false));
	}
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id invalido para el item.', true));
			$this->redirect(array('action'=>'index'));
		}
	
		$item = $this->Item->find('first', array('conditions' => array('Item.id' => $id)));
		if ($this->Item->delete($id)) {
			$this->Session->setFlash(__('Obra eliminada', true));
			$this->Attachment->delete_files($item['Item']['item_file_path']);
			if (!isset($this->passedArgs[1])) {
				$this->redirect(array('action'=>'index'));
			} else {
				$this->redirect(array('action' => 'view', $this->passedArgs[1]));
			}
		}
		$this->Session->setFlash(__('El item no fue eliminado.', true));
		if (!isset($this->passedArgs[1])) {
			$this->redirect(array('action'=>'index'));
		} else {
			$this->redirect(array('action' => 'view', $this->passedArgs[1]));
		}
	}
	
	function intro() {
	
	}
	
	function marc21($id = null) {
		//$this->layout = null;
		$this->Item->recursive = 1;
		if (!$id) {
			$this->Session->setFlash(__('Invalid item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('item', $this->Item->read(null, $id));
	}
	
	function marc21_decode($camp = null) {
		if (!empty($camp)) {
			$c = explode('^', $camp);
			$indicators = $c[0];
			unset($c[0]);
	
			$i = 0;
			foreach ($c as $v){
				$c[substr($v, 0, 1)] = substr($v, 1, strlen($v)-1);
				$i++;
				unset($c[$i]);
			}
			$c['indicators'] = $indicators;
			return $c;
		} else {
			return false;
		}
	}
	
	function view($id = null) {
		//App::import('Vendor', 'pdf2text');
	
		//$a = new PDF2Text();
		//$a->setFilename('C:\xampp\htdocs\tesis\webroot\files\academic_papers\prueba.pdf');
		//$a->decodePDF();
		//echo utf8_encode($a->output());
		//die;
	
		$this->Item->recursive = 1;
		if (!$id) {
			$this->Session->setFlash(__('Invalid item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('item', $this->Item->read(null, $id));
	}
}