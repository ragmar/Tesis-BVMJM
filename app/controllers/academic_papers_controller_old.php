<?php
class AcademicPapersController extends AppController {

	var $name = 'AcademicPapers';
	var $components = array('Attachment');
	var $uses = array('Item', 'Search');

	function beforeFilter(){
		parent::beforeFilter();
		// Acciones permitidas sin loguearse.
		$this->Auth->allow(
				'index',
				'view',
				'search',
				'advanced_search',
				'century',
				'year',
				'matter',
				'author',
				'title',
				'marc21',
				'intro'
		);
		
		//if ($this->Session->read('Auth.User.group_id') == '3'){
			//$this->Session->setFlash(__('Access restricted.', true));
			//$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		//}
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
	
	function intro() {
		
	}
	
	function index_old() {
		$conditions = array();
		$this->Item->recursive = 1;
		
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['AcademicPaper']['year'] = $this->data['AcademicPaper']['year']['year']; // Se arregla el campo year.
			$this->Session->write('Search', $this->data); // Se guarda en sesion la busqueda.
			$conditions = $this->buildConditions($this->data);
			//debug($conditions); die;
			
		} else { // Si se viene del home o del paginador ...
			
			//$this->Session->delete('Search');
			//if (isset($this->passedArgs[0]) && (substr($this->passedArgs[0], 0, 4) != "page")) {
			if ($this->Session->check('Search')) {
				$conditions = $this->buildConditions($this->Session->read('Search'));
			}
			//}
		}

		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions
		);
		
		$this->set('items', $this->paginate());
		
		//$topics = $this->Item->Topic->find('list');
		//$types = $this->Item->Type->find('list');
		//$authors = $this->Item->Author->find('list', array('fields' => array('id', 'fullname'), 'order' => 'fullname'));
		//$this->set(compact('topics', 'types', 'authors'));
	}
	
	function index() {
		if (!empty($this->data)) {
			$conditions =  array('OR' => array(array('Item.h-006' => 't', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
			array('Item.h-006' => 't', 'Item.h-007' => 'b', 'Item.published' => '1'), 
			array('Item.h-006' => 't', 'Item.h-007' => 'm', 'Item.published' => '1')));
		/*	$conditions['Item.h-006'] = 'k'; // Tipo libro.
			$conditions['Item.h-007'] = 'b'; // Tipo libro.
			$conditions1['Item.h-006'] = 'k'; // Tipo libro.
			$conditions1['Item.h-007'] = 'm'; // Tipo libro.
			$conditions2['Item.h-006'] = 'k'; // Tipo libro.
			$conditions2['Item.h-007'] = 'a'; // Tipo libro.
			$conditions['Item.published'] = '1'; // Publicado.*/
			
			if (!empty($this->data['academicPapers']['Titulo'])) {
				$conditions['Item.245 LIKE'] = '%^a' . $this->data['academicPapers']['Titulo'] . '%';
			}
			if (!empty($this->data['academicPapers']['Autor'])) {
				$conditions['Item.100 LIKE'] = '%^a' . $this->data['academicPapers']['Autor'] . '%';
			}
			if (!empty($this->data['academicPapers']['Tutor'])) {
				$conditions['Item.260 LIKE'] = '%^b' . $this->data['academicPapers']['Tutor'] . '%';
			}
			if (!empty($this->data['academicPapers']['Materia'])) {
				$conditions['Item.650 LIKE'] = '%^a' . $this->data['academicPapers']['Materia'] . '%';
			}
			if (!empty($this->data['academicPapers']['PalabrasClave'])) {
				$conditions['Item.653 LIKE'] = '%^a' . $this->data['academicPapers']['PalabrasClave'] . '%';
			}
			
		} else {
		//	$conditions = array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1');
		$conditions = array('OR' => array(array('Item.h-006' => 't', 'Item.h-007' => 'm', 'Item.published' => '1'), //||
		array('Item.h-006' => 't', 'Item.h-007' => 'b', 'Item.published' => '1'), array('Item.h-006' => 't', 'Item.h-007' => 'm', 'Item.published' => '1')));
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
	
	function century($century = null) {
		$conditions =array('OR' => array(array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'k', 'Item.h-007' => 'b', 'Item.published' => '1'), array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1')));
		
		if ($century != null){
			$conditions['Item.690'] = '^a' . $century;
		}
		
		/*
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['AcademicPaper']['year'] = $this->data['AcademicPaper']['year']['year']; // Se arregla el campo year.
			$this->Session->write('Search', $this->data); // Se guarda en sesion la busqueda.
			$conditions = $this->buildConditions($this->data);
			//debug($conditions); die;
			
		} else { // Si se viene del home o del paginador ...
			
			//$this->Session->delete('Search');
			//if (isset($this->passedArgs[0]) && (substr($this->passedArgs[0], 0, 4) != "page")) {
			if ($this->Session->check('Search')) {
				$conditions = $this->buildConditions($this->Session->read('Search'));
			}
			//}
		}*/
		
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'ASC'
		);
		//debug($conditions); die;
		$this->set('items', $this->paginate('Item'));
	}
	
	function year($year = null) {
	$conditions =array('OR' => array(array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'k', 'Item.h-007' => 'b', 'Item.published' => '1'), array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1')));
		
		if ($year != null){
			$conditions['Item.260 LIKE '] = "%^c" . $year . "%";
		}
		
		/*if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Book']['year'] = $this->data['Book']['year']['year']; // Se arregla el campo year.
			$this->Session->write('Search', $this->data); // Se guarda en sesion la busqueda.
			$conditions = $this->buildConditions($this->data);
			//debug($conditions); die;
	
		} else { // Si se viene del home o del paginador ...
	
			//$this->Session->delete('Search');
			//if (isset($this->passedArgs[0]) && (substr($this->passedArgs[0], 0, 4) != "page")) {
			if ($this->Session->check('Search')) {
				$conditions = $this->buildConditions($this->Session->read('Search'));
			}
			//}
		}*/
		
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'Item.title ASC'
		);
		$this->set('items', $this->paginate('Item'));
		
		$years = $this->Item->find('list', array('fields' => '260', 'conditions' => array('OR' => array(array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'k', 'Item.h-007' => 'b', 'Item.published' => '1'), array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1')))));
		
		foreach ($years as $i => $v){
			$years[$i] = $this->marc21_decode($v);
			$years[$i] = $years[$i]['c'];
		}
		
		asort($years); // Ordena de menor a mayor.
		$years = array_unique($years); // Elimina duplicados.
		
		$this->set('years', $years);
	}
	
	function matter($matter = null) {
	$conditions =array('OR' => array(array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'k', 'Item.h-007' => 'b', 'Item.published' => '1'), array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1')));
		
		if ($matter != null){
			$conditions['Item.653 LIKE '] = "%^a" . $matter . "%";
			//debug($conditions); die;
		}
		
		/*
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Book']['year'] = $this->data['Book']['year']['year']; // Se arregla el campo year.
			$this->Session->write('Search', $this->data); // Se guarda en sesion la busqueda.
			$conditions = $this->buildConditions($this->data);
			//debug($conditions); die;
	
		} else { // Si se viene del home o del paginador ...
	
			//$this->Session->delete('Search');
			//if (isset($this->passedArgs[0]) && (substr($this->passedArgs[0], 0, 4) != "page")) {
			if ($this->Session->check('Search')) {
				$conditions = $this->buildConditions($this->Session->read('Search'));
			}
			//}
		}*/
		
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'Item.title ASC'
		);
		
		$this->set('items', $this->paginate('Item'));
		
		$matters = $this->Item->find('list', array('fields' => array('Item.653'), 'conditions' => array('OR' => array(array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'k', 'Item.h-007' => 'b', 'Item.published' => '1'), array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1')))));
		$this->set('matters', $matters);
		//debug($matters); die;
	}
	
	function author($letter = null) {
	$conditions =array('OR' => array(array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'k', 'Item.h-007' => 'b', 'Item.published' => '1'), array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1')));
		
		if ($letter != null){
			$conditions['Item.100 LIKE '] = "%^a" . $letter . "%";
			//debug($conditions); die;
		}
	
		/*if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Book']['year'] = $this->data['Book']['year']['year']; // Se arregla el campo year.
			$this->Session->write('Search', $this->data); // Se guarda en sesion la busqueda.
			$conditions = $this->buildConditions($this->data);
			//debug($conditions); die;
	
		} else { // Si se viene del home o del paginador ...
	
			//$this->Session->delete('Search');
			//if (isset($this->passedArgs[0]) && (substr($this->passedArgs[0], 0, 4) != "page")) {
			if ($this->Session->check('Search')) {
				$conditions = $this->buildConditions($this->Session->read('Search'));
			}
			//}
		}*/
		
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				//'limit' => '4',
				'conditions' => $conditions,
				//'order' => 'Author.lastname ASC'
		);
	
		$this->set('items', $this->paginate('Item'));
	}
	
	function title($letter = null) {
	$conditions =array('OR' => array(array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'k', 'Item.h-007' => 'b', 'Item.published' => '1'), array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1')));
		
		if ($letter != null){
			$conditions['Item.245 LIKE '] = "%^a" . $letter . "%";
			//debug($conditions); die;
		}
		
		/*
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['AcademicPapers']['year'] = $this->data['AcademicPapers']['year']['year']; // Se arregla el campo year.
			$this->Session->write('Search', $this->data); // Se guarda en sesion la busqueda.
			$conditions = $this->buildConditions($this->data);
			//debug($conditions); die;
	
		} else { // Si se viene del home o del paginador ...
	
			//$this->Session->delete('Search');
			//if (isset($this->passedArgs[0]) && (substr($this->passedArgs[0], 0, 4) != "page")) {
			if ($this->Session->check('Search')) {
				$conditions = $this->buildConditions($this->Session->read('Search'));
			}
			//}
		}*/
	
		/*if ($letter != null) {
			if ($letter != '0-9') {
				$conditions = array('Item.title LIKE' => $letter.'%', 'Item.type_id' => '2');
			} else {
				$conditions = array("
						Item.title LIKE '0%' OR Item.title LIKE '1%' OR Item.title LIKE '2%' OR Item.title LIKE '3%' OR
						Item.title LIKE '4%' OR Item.title LIKE '5%' OR Item.title LIKE '6%' OR Item.title LIKE '7%' OR
						Item.title LIKE '8%' OR Item.title LIKE '9%'
						", 'Item.type_id' => '2');
			}
		}*/
		
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'Item.title ASC'
		);
	
		$this->set('items', $this->paginate('Item'));
	}

	function source($source = null) {
	$conditions = array('OR' => array(array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'k', 'Item.h-007' => 'b', 'Item.published' => '1'), array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1')));
	//$conditions1 = array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1');
	//$conditions2 = array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1');
		
		
		if ($source != null){
			($conditions['Item.773 LIKE '] = "%^t" . $source . "%" );//|| $conditions1['Item.653 LIKE '] = "%^a" . $matter . "%" ||
			//$conditions2['Item.653 LIKE '] = "%^a" . $matter . "%" );
			//debug($conditions); die;
		} 
	
		/*
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Book']['year'] = $this->data['Book']['year']['year']; // Se arregla el campo year.
			$this->Session->write('Search', $this->data); // Se guarda en sesion la busqueda.
			$conditions = $this->buildConditions($this->data);
			//debug($conditions); die;
	
		} else { // Si se viene del home o del paginador ...
	
			//$this->Session->delete('Search');
			//if (isset($this->passedArgs[0]) && (substr($this->passedArgs[0], 0, 4) != "page")) {
			if ($this->Session->check('Search')) {
				$conditions = $this->buildConditions($this->Session->read('Search'));
			}
			//}
		}*/
	
		/*if ($letter != null) {
			if ($letter != '0-9') {
				$conditions = array('Item.title LIKE' => $letter.'%', 'Item.type_id' => '2');
			} else {
				$conditions = array("
						Item.title LIKE '0%' OR Item.title LIKE '1%' OR Item.title LIKE '2%' OR Item.title LIKE '3%' OR
						Item.title LIKE '4%' OR Item.title LIKE '5%' OR Item.title LIKE '6%' OR Item.title LIKE '7%' OR
						Item.title LIKE '8%' OR Item.title LIKE '9%'
						", 'Item.type_id' => '2');
			}
		}*/
		
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'Item.title ASC'
		);
	
		$this->set('items', $this->paginate('Item'));
	}



	function mattername($mattername = null) {
	$conditions = array('OR' => array(array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'k', 'Item.h-007' => 'b', 'Item.published' => '1'), array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1')));
	//$conditions1 = array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1');
	//$conditions2 = array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1');
		
		
		if ($mattername != null){
			($conditions['Item.650 LIKE '] = "%^a" . $mattername . "%" );//|| $conditions1['Item.653 LIKE '] = "%^a" . $matter . "%" ||
			//$conditions2['Item.653 LIKE '] = "%^a" . $matter . "%" );
			//debug($conditions); die;
		} 
	
		/*
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Book']['year'] = $this->data['Book']['year']['year']; // Se arregla el campo year.
			$this->Session->write('Search', $this->data); // Se guarda en sesion la busqueda.
			$conditions = $this->buildConditions($this->data);
			//debug($conditions); die;
	
		} else { // Si se viene del home o del paginador ...
	
			//$this->Session->delete('Search');
			//if (isset($this->passedArgs[0]) && (substr($this->passedArgs[0], 0, 4) != "page")) {
			if ($this->Session->check('Search')) {
				$conditions = $this->buildConditions($this->Session->read('Search'));
			}
			//}
		}*/
	
		/*if ($letter != null) {
			if ($letter != '0-9') {
				$conditions = array('Item.title LIKE' => $letter.'%', 'Item.type_id' => '2');
			} else {
				$conditions = array("
						Item.title LIKE '0%' OR Item.title LIKE '1%' OR Item.title LIKE '2%' OR Item.title LIKE '3%' OR
						Item.title LIKE '4%' OR Item.title LIKE '5%' OR Item.title LIKE '6%' OR Item.title LIKE '7%' OR
						Item.title LIKE '8%' OR Item.title LIKE '9%'
						", 'Item.type_id' => '2');
			}
		}*/
		
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'Item.title ASC'
		);
	
		$this->set('items', $this->paginate('Item'));

}

	
	function advanced_search() {
		
		if (!empty($this->data)) {
			$this->layout = 'default';
			$this->Item->recursive = -1;
			$conditions = array('Item.h-006' => 't', 'Item.h-007' => 'm', 'Item.published' => '1');	
			
			if (!empty($this->data['AcademicPaper']['245'])) { // Titulo
				$conditions['Item.245 LIKE'] = '%' . $this->data['AcademicPaper']['245'] . '%'; 
			}
			
			if (!empty($this->data['AcademicPaper']['100'])) { // Autor
				$conditions['Item.100 LIKE'] = '%' . $this->data['AcademicPaper']['100'] . '%';
			}

			if (!empty($this->data['AcademicPaper']['653'])) { // Palabras clave
				$conditions['Item.653 LIKE'] = '%' . $this->data['AcademicPaper']['653'] . '%';
			}

			if (!empty($this->data['AcademicPaper']['260'])) { // Lugar, editor o fecha
				$conditions['Item.260 LIKE'] = '%' . $this->data['AcademicPaper']['260'] . '%';
			}
			
			if (!empty($this->data['AcademicPaper']['650'])) { // Materia
				$conditions['Item.650 LIKE'] = '%' . $this->data['AcademicPaper']['650'] . '%';
			}
			
			//debug($conditions); die;
			
			//$items = $this->Item->find('all', array('conditions' => $conditions));
			//debug($items); die;
			
			$this->paginate = array(
				//'limit' => '20',
				'conditions' => $conditions
			);
			
			$this->set('items', $this->paginate('Item'));
			
			// Searches.
			/*if ($this->Session->check('Auth.User')) {
				$s = array('user_id' => $this->Session->read('Auth.User.id'), 'ip' => $_SERVER['REMOTE_ADDR'], 'search' => $conditions);
			} else {
				$s = array('user_id' => '0', 'ip' => $_SERVER['REMOTE_ADDR'], 'search' => $conditions);
			}
			$this->Search->save($s);*/
		}else{
			$this->set('items', array());
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

	function add() {
		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Access restricted.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}

		if (!empty($this->data)) {

			$data = $this->data;
			$time = time();

			if ($_FILES['data']['error']['AcademicPaper']['cover'] == 0){
				$uploaddir = "..".DS."webroot".DS."covers".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['AcademicPaper']['cover']['name']);
				copy($_FILES['data']['tmp_name']['AcademicPaper']['cover'], $uploadfile);
			}

			if ($_FILES['data']['error']['AcademicPaper']['item'] == 0){
				$uploaddir = "..".DS."webroot".DS."files".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['AcademicPaper']['item']['name']);
				copy($_FILES['data']['tmp_name']['AcademicPaper']['item'], $uploadfile);
			}
			
			if ($_FILES['data']['error']['AcademicPaper']['item'] == 0){
				
				$data['AcademicPaper']['item_file_path'] = $time.'_'.$data['AcademicPaper']['item']['name'];
				$data['AcademicPaper']['item_content_type'] = $data['AcademicPaper']['item']['type'];
				$data['AcademicPaper']['item_file_size'] = $data['AcademicPaper']['item']['size'];
				$data['AcademicPaper']['item_file_name'] = $data['AcademicPaper']['item']['name'];
				
				$data['AcademicPaper']['cover_path'] = $time.'_'.$data['AcademicPaper']['cover']['name'];
				$data['AcademicPaper']['cover_type'] = $this->data['AcademicPaper']['cover']['type'];
				$data['AcademicPaper']['cover_size'] = $this->data['AcademicPaper']['cover']['size'];
				$data['AcademicPaper']['cover_name'] = $this->data['AcademicPaper']['cover']['name'];
				
				unset($data['AcademicPaper']['cover']);
				unset($data['AcademicPaper']['item']);
				$data['Item'] = $data['AcademicPaper'];
				unset($data['AcademicPaper']);
				
				$this->Item->create();
				if ($this->Item->save($data)) {
					$item = $this->Item->getLastInsertID();
					$this->Session->setFlash(__('El archivo ha sido guardado.', true));
					$this->redirect(array('action' => 'view/' . $item));
				} else {
					$this->Session->setFlash(__('El archivo no pudo ser guardado. Por favor, intentélo nuevamente.', true));
				}
				
			} else {
				$this->Session->setFlash('No se subió ningun archivo de la obra. Debe cargar alguno.');
				$this->redirect(array('action' => 'add'));
			}
			
			$this->redirect(array('action' => 'add'));
		}
		
		// ------------------------- Sub-Campo 100a ------------------------- //
		
		$authors = $this->Item->find('list', array('fields' => array('100')));
		
		if ($authors) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($authors as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['a'];
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
				$list[$a] = $v['a'];
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
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($places as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['a'];
			}
	
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$places = "[" . $l . "]";
			$this->set(compact('places', $places));
		} else {
			$this->set(compact('places', false));
		}
		
		// ------------------------- Sub-Campo 260b ------------------------- //
		
		$editors = $this->Item->find('list', array('fields' => array('260')));
		
		if ($editors) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($editors as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['b'];
			}
			
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$editors = "[" . $l . "]";
			$this->set(compact('editors', $editors));
		} else {
			$this->set(compact('editors', false));
		}
		
		// ------------------------- Sub-Campo 260c ------------------------- //
		
		$years = $this->Item->find('list', array('fields' => array('260')));
		
		if ($years) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($years as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['c'];
			}
			
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$years = "[" . $l . "]";
			$this->set(compact('years', $years));
		} else {
			$this->set(compact('years', false));
		}
		
		// ------------------------- Sub-Campo 362a ------------------------- //
		
		$publications = $this->Item->find('list', array('fields' => array('362')));
		
		if ($publications) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($publications as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['a'];
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
				$list[$a] = $v['a'];
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
	
	function edit($id = null) {
		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Access restricted.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}

		$item = $this->Item->read(null, $id);
		$this->set('item', $item);
		
		if (!empty($this->data)) {
			$data = $this->data;
			$time = time();
			
			if ($_FILES['data']['error']['AcademicPaper']['cover'] == 0){
				$uploaddir = "..".DS."webroot".DS."covers".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['AcademicPaper']['cover']['name']);
				copy($_FILES['data']['tmp_name']['AcademicPaper']['cover'], $uploadfile);
				unlink($uploaddir.$item['Item']['cover_path']);
			}
			
			if ($_FILES['data']['error']['AcademicPaper']['item'] == 0){
				$uploaddir = "..".DS."webroot".DS."files".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['AcademicPaper']['item']['name']);
				copy($_FILES['data']['tmp_name']['AcademicPaper']['item'], $uploadfile);
				unlink($uploaddir.$item['Item']['item_file_path']);
			}
			
			//if ($_FILES['data']['error']['AcademicPaper']['item'] == 0){
			
			if ($_FILES['data']['error']['AcademicPaper']['item'] == 0){
				$data['AcademicPaper']['item_file_path'] = $time.'_'.$data['AcademicPaper']['item']['name'];
				$data['AcademicPaper']['item_content_type'] = $data['AcademicPaper']['item']['type'];
				$data['AcademicPaper']['item_file_size'] = $data['AcademicPaper']['item']['size'];
				$data['AcademicPaper']['item_file_name'] = $data['AcademicPaper']['item']['name'];
			}
			unset($data['AcademicPaper']['item']);
			
			if ($_FILES['data']['error']['AcademicPaper']['cover'] == 0){
				$data['AcademicPaper']['cover_path'] = $time.'_'.$data['AcademicPaper']['cover']['name'];
				$data['AcademicPaper']['cover_type'] = $this->data['AcademicPaper']['cover']['type'];
				$data['AcademicPaper']['cover_size'] = $this->data['AcademicPaper']['cover']['size'];
				$data['AcademicPaper']['cover_name'] = $this->data['AcademicPaper']['cover']['name'];
			}
			unset($data['AcademicPaper']['cover']);
			
			$data['Item'] = $data['AcademicPaper'];
			unset($data['AcademicPaper']);
			if ($this->Item->save($data)) {
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
				$list[$a] = $v['a'];
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
				$list[$a] = $v['a'];
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
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($places as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['a'];
			}
	
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$places = "[" . $l . "]";
			$this->set(compact('places', $places));
		} else {
			$this->set(compact('places', false));
		}
		
		// ------------------------- Sub-Campo 260b ------------------------- //
		
		$editors = $this->Item->find('list', array('fields' => array('260')));
		
		if ($editors) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($editors as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['b'];
			}
			
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$editors = "[" . $l . "]";
			$this->set(compact('editors', $editors));
		} else {
			$this->set(compact('editors', false));
		}
		
		// ------------------------- Sub-Campo 260c ------------------------- //
		
		$years = $this->Item->find('list', array('fields' => array('260')));
		
		if ($years) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($years as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['c'];
			}
			
			$list = array_unique($list); // Elimina repetidos.
			asort($list); // Ordena de A a la Z.
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$years = "[" . $l . "]";
			$this->set(compact('years', $years));
		} else {
			$this->set(compact('years', false));
		}
		
		// ------------------------- Sub-Campo 362a ------------------------- //
		
		$publications = $this->Item->find('list', array('fields' => array('362')));
		
		if ($publications) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($publications as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['a'];
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
				$list[$a] = $v['a'];
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
		
		//----------------------------Sub-Campo 773t-------------------------------//
		$sources = $this->Item->find('list', array('fields' => array('773')));
		
		if ($sources) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($sources as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['t'];
			}
			
			$list = array_unique($list);
			asort($list);
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$sources = "[" . $l . "]";
			$this->set(compact('sources', $sources));
		} else {
			$this->set(compact('sources', false));
		}
		
		//---------------------------Sub-Campo 650a----------------------------//
		$matternames = $this->Item->find('list', array('fields' => array('650')));
		
		if ($matternames) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($matternames as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['a'];
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
			$this->Session->setFlash(__('Item eliminado', true));
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
	
	function marc21($id = null) {
		//$this->layout = null;
		$this->Item->recursive = 1;
		if (!$id) {
			$this->Session->setFlash(__('Invalid item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('item', $this->Item->read(null, $id));
	}

/*
	function libros() {
		$this->Session->write('Search.Item.type_id', 1);
		$this->redirect(array('controller' => 'items', 'action' => 'index'));
	}
	
	function revistas() {
		$this->Session->write('Search.Item.type_id', 2);
		$this->redirect(array('controller' => 'items', 'action' => 'index'));
		
	}
	
	function manuscritos() {
		$this->Session->write('Search.Item.type_id', 3);
		$this->redirect(array('controller' => 'items', 'action' => 'index'));
	}
	
	function impresos() {
		$this->Session->write('Search.Item.type_id', 4);
		$this->redirect(array('controller' => 'items', 'action' => 'index'));
	}
	
	function iconografias() {
		$this->Session->write('Search.Item.type_id', 5);
		$this->redirect(array('controller' => 'items', 'action' => 'index'));
	}
	
	function trabajos() {
		$this->Session->write('Search.Item.type_id', 6);
		$this->redirect(array('controller' => 'items', 'action' => 'index'));
	}
*/
}