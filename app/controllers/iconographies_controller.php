<?php
class IconographiesController extends AppController {

	var $name = 'Iconographies';
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
				/*'libros',
				'revistas',
				'manuscritos',
				'impresos',
				'iconografias',
				'trabajos'*/
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
	
	/*	function buildConditions ($search){ // Funcion que arma las condiciones para el paginador a partir de el arreglo con los campos de búsqueda.
		if (!empty($search)){
			$conditions = array();
			$conditions1 = array();
			$conditions2= array();
			$conditions['Item.h-006'] = 'k'; // Tipo libro.
			$conditions['Item.h-007'] = 'b'; // Tipo libro.
			$conditions1['Item.h-006'] = 'k'; // Tipo libro.
			$conditions1['Item.h-007'] = 'm'; // Tipo libro.
			$conditions2['Item.h-006'] = 'k'; // Tipo libro.
			$conditions2['Item.h-007'] = 'a'; // Tipo libro.


			if (!empty($search['Iconographie']['title'])) {
				$conditions['Item.title LIKE'] = '%' . $search['Iconographie']['title'] . '%';
			}
			
			if (!empty($search['Iconographie']['author_id'])) {
				$conditions['Item.author_id'] = $search['Iconographie']['author_id'];
			}
			
			if (!empty($search['Iconographie']['type_id'])) {
				$conditions['Item.type_id'] = $search['Iconographie']['type_id'];
			}
			
			if (!empty($search['Iconographie']['topic_id'])) {
				$conditions['Item.topic_id'] = $search['Iconographie']['topic_id'];
			}
			
			if (!empty($search['Iconographie']['year'])) {
				$conditions['Item.year'] = $search['Iconographie']['year'];
			}

			if (!empty($search['Iconographie']['source'])) {
				$conditions['Item.source'] = $search['Iconographie']['source'];
			}

			if (!empty($search['Iconographie']['matter'])) {
				$conditions['Item.matter'] = $search['Iconographie']['matter'];
			}
			if (!empty($search['Iconographie']['mattername'])) {
				$conditions['Item.mattername'] = $search['Iconographie']['mattername'];
			}

			if (!empty($search['Iconographie']['title'])) {
				$conditions1['Item.title LIKE'] = '%' . $search['Iconographie']['title'] . '%';
			}
			
			if (!empty($search['Iconographie']['author_id'])) {
				$conditions1['Item.author_id'] = $search['Iconographie']['author_id'];
			}
			
			if (!empty($search['Iconographie']['type_id'])) {
				$conditions1['Item.type_id'] = $search['Iconographie']['type_id'];
			}
			
			if (!empty($search['Iconographie']['topic_id'])) {
				$conditions['Item.topic_id'] = $search['Iconographie']['topic_id'];
			}
			
			if (!empty($search['Iconographie']['year'])) {
				$conditions1['Item.year'] = $search['Iconographie']['year'];
			}

			if (!empty($search['Iconographie']['source'])) {
				$conditions1['Item.source'] = $search['Iconographie']['source'];
			}

			if (!empty($search['Iconographie']['matter'])) {
				$conditions1['Item.matter'] = $search['Iconographie']['matter'];
			}
			if (!empty($search['Iconographie']['mattername'])) {
				$conditions1['Item.mattername'] = $search['Iconographie']['mattername'];
			}

			if (!empty($search['Iconographie']['title'])) {
				$conditions2['Item.title LIKE'] = '%' . $search['Iconographie']['title'] . '%';
			}
			
			if (!empty($search['Iconographie']['author_id'])) {
				$conditions2['Item.author_id'] = $search['Iconographie']['author_id'];
			}
			
			if (!empty($search['Iconographie']['type_id'])) {
				$conditions2['Item.type_id'] = $search['Iconographie']['type_id'];
			}
			
			if (!empty($search['Iconographie']['topic_id'])) {
				$conditions2['Item.topic_id'] = $search['Iconographie']['topic_id'];
			}
			
			if (!empty($search['Iconographie']['year'])) {
				$conditions2['Item.year'] = $search['Iconographie']['year'];
			}

			if (!empty($search['Iconographie']['source'])) {
				$conditions2['Item.source'] = $search['Iconographie']['source'];
			}

			if (!empty($search['Iconographie']['matter'])) {
				$conditions2['Item.matter'] = $search['Iconographie']['matter'];
			}
			if (!empty($search['Iconographie']['mattername'])) {
				$conditions2['Item.mattername'] = $search['Iconographie']['mattername'];
			}
			
			
			return ($conditions || $conditions1 || $conditions2) ;
		} else {
			return false;
		}
	}
	*/
	function intro() {
		
	}
	
	function index_old() {
		$conditions = array();
		$this->Item->recursive = 1;
		
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Iconographie']['year'] = $this->data['Iconographie']['year']['year']; // Se arregla el campo year.
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
	
	function index($year=null) {
		if (!empty($this->data)) {
			$conditions =  array('OR' => array(array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
			array('Item.h-006' => 'k', 'Item.h-007' => 'b', 'Item.published' => '1'), 
			array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1')));
		/*	$conditions['Item.h-006'] = 'k'; // Tipo libro.
			$conditions['Item.h-007'] = 'b'; // Tipo libro.
			$conditions1['Item.h-006'] = 'k'; // Tipo libro.
			$conditions1['Item.h-007'] = 'm'; // Tipo libro.
			$conditions2['Item.h-006'] = 'k'; // Tipo libro.
			$conditions2['Item.h-007'] = 'a'; // Tipo libro.
			$conditions['Item.published'] = '1'; // Publicado.*/
			
			if (!empty($this->data['iconographies']['Titulo'])) {
				$conditions['Item.245 LIKE'] = '%^a' . $this->data['iconographies']['Titulo'] . '%';
			}
				
			if (!empty($this->data['iconographies']['Autor'])) {
				$conditions['Item.100 LIKE'] = '%^a' . $this->data['iconographies']['Autor'] . '%';
			}
				
			if (!empty($this->data['iconographies']['Materia'])) {
				$conditions['Item.653 LIKE'] = '%^a' . $this->data['iconographies']['Materia'] . '%';
			}
			if (!empty($this->data['iconographies']['Fuente'])) {
				$conditions['Item.773 LIKE'] = '%^t' . $this->data['iconographies']['Fuente'] . '%';
			}	
			if (!empty($this->data['iconographies']['Temas'])) {
				$conditions['Item.650 LIKE'] = '%^a' . $this->data['iconographies']['Temas'] . '%';
			}
			if (!empty($this->data['iconographies']['Año'])) {
				$conditions['Item.260 LIKE'] = '%^c' . $this->data['iconographies']['Año'] . '%';
			}
			if (!empty($this->data['iconographies']['Descripción'])) {
				$conditions['Item.500 LIKE'] = '%^a' . $this->data['iconographies']['Descripción'] . '%';
			}
		
			
		} else {
		//	$conditions = array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1');
		$conditions = array('OR' => array(array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'k', 'Item.h-007' => 'b', 'Item.published' => '1'), array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1')));
		}
		
		if ($year != null){
			$conditions['Item.260 LIKE '] = "%^c" . $year . "%";
		}
		
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				'limit' => '15',
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
	
		$this->Item->recursive = 1;
	
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				'order' => 'Item.id DESC'
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
			$this->data['Iconographie']['year'] = $this->data['Iconographie']['year']['year']; // Se arregla el campo year.
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
	
	function descrption($letter = null) {
	$conditions =array('OR' => array(array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'k', 'Item.h-007' => 'b', 'Item.published' => '1'), array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1')));
		
		if ($letter != null){
			$conditions['Item.500 LIKE '] = "%^a" . $letter . "%";
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
			$this->data['Iconographies']['year'] = $this->data['Iconographies']['year']['year']; // Se arregla el campo year.
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
			$conditions = array('Item.h-006' => 'k', 'Item.h-007' => 'b', 'Item.published' => '1');	
			
			if (!empty($this->data['Iconographie']['245'])) { // Titulo
				$conditions['Item.245 LIKE'] = '%' . $this->data['Iconographie']['245'] . '%'; 
			}
			
			if (!empty($this->data['Iconographie']['100'])) { // Autor
				$conditions['Item.100 LIKE'] = '%' . $this->data['Iconographie']['100'] . '%';
			}

			if (!empty($this->data['Iconographie']['653'])) { // Materia
				$conditions['Item.653 LIKE'] = '%' . $this->data['Iconographie']['653'] . '%';
			}

			if (!empty($this->data['Iconographie']['260'])) { // Lugar, editor o fecha
				$conditions['Item.260 LIKE'] = '%' . $this->data['Iconographie']['260'] . '%';
			}
			
			if (!empty($this->data['Iconographie']['690'])) { // Siglo
				$conditions['Item.690 LIKE'] = '%' . $this->data['Iconographie']['690'] . '%';
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
		}
	}
	
	function view($id = null) {
		//App::import('Vendor', 'pdf2text');
		
		//$a = new PDF2Text();
		//$a->setFilename('C:\xampp\htdocs\tesis\webroot\files\iconographies\prueba.pdf');
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

			if ($_FILES['data']['error']['Iconographie']['cover'] == 0){
				$uploaddir = "..".DS."webroot".DS."covers".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['Iconographie']['cover']['name']);
				copy($_FILES['data']['tmp_name']['Iconographie']['cover'], $uploadfile);
			}

			
			if ($_FILES['data']['error']['Iconographie']['cover'] == 0){
								
				$data['Iconographie']['cover_path'] = $time.'_'.$data['Iconographie']['cover']['name'];
				$data['Iconographie']['cover_type'] = $this->data['Iconographie']['cover']['type'];
				$data['Iconographie']['cover_size'] = $this->data['Iconographie']['cover']['size'];
				$data['Iconographie']['cover_name'] = $this->data['Iconographie']['cover']['name'];
				
				unset($data['Iconographie']['cover']);
				$data['Item'] = $data['Iconographie'];
				unset($data['Iconographie']);
				
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
				$list[$a] = $v['a'];
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
			
			if ($_FILES['data']['error']['Iconographie']['cover'] == 0){
				$uploaddir = "..".DS."webroot".DS."covers".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['Iconographie']['cover']['name']);
				copy($_FILES['data']['tmp_name']['Iconographie']['cover'], $uploadfile);
				unlink($uploaddir.$item['Item']['cover_path']);
			}
			
			if ($_FILES['data']['error']['Iconographie']['item'] == 0){
				$uploaddir = "..".DS."webroot".DS."files".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['Iconographie']['item']['name']);
				copy($_FILES['data']['tmp_name']['Iconographie']['item'], $uploadfile);
				unlink($uploaddir.$item['Item']['item_file_path']);
			}
			
			//if ($_FILES['data']['error']['Iconographie']['item'] == 0){
			
			if ($_FILES['data']['error']['Iconographie']['item'] == 0){
				$data['Iconographie']['item_file_path'] = $time.'_'.$data['Iconographie']['item']['name'];
				$data['Iconographie']['item_content_type'] = $data['Iconographie']['item']['type'];
				$data['Iconographie']['item_file_size'] = $data['Iconographie']['item']['size'];
				$data['Iconographie']['item_file_name'] = $data['Iconographie']['item']['name'];
			}
			unset($data['Iconographie']['item']);
			
			if ($_FILES['data']['error']['Iconographie']['cover'] == 0){
				$data['Iconographie']['cover_path'] = $time.'_'.$data['Iconographie']['cover']['name'];
				$data['Iconographie']['cover_type'] = $this->data['Iconographie']['cover']['type'];
				$data['Iconographie']['cover_size'] = $this->data['Iconographie']['cover']['size'];
				$data['Iconographie']['cover_name'] = $this->data['Iconographie']['cover']['name'];
			}
			unset($data['Iconographie']['cover']);
			
			$data['Item'] = $data['Iconographie'];
			unset($data['Iconographie']);
			
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
		
		//-----------------------SubCampo 500a------------------//
		
			$descriptions = $this->Item->find('list', array('fields' => array('500')));
		
		if ($descriptions) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($descriptions as $a => $v){
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
			
			$descriptions = "[" . $l . "]";
			$this->set(compact('descriptions', $descriptions));
		} else {
			$this->set(compact('descriptions', false));
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







