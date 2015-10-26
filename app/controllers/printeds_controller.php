<?php
class PrintedsController extends AppController {

	var $name = 'Printeds';
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


			if (!empty($search['Printed']['title'])) {
				$conditions['Item.title LIKE'] = '%' . $search['Printed']['title'] . '%';
			}
			
			if (!empty($search['Printed']['author_id'])) {
				$conditions['Item.author_id'] = $search['Printed']['author_id'];
			}
			
			if (!empty($search['Printed']['type_id'])) {
				$conditions['Item.type_id'] = $search['Printed']['type_id'];
			}
			
			if (!empty($search['Printed']['topic_id'])) {
				$conditions['Item.topic_id'] = $search['Printed']['topic_id'];
			}
			
			if (!empty($search['Printed']['year'])) {
				$conditions['Item.year'] = $search['Printed']['year'];
			}

			if (!empty($search['Printed']['source'])) {
				$conditions['Item.source'] = $search['Printed']['source'];
			}

			if (!empty($search['Printed']['matter'])) {
				$conditions['Item.matter'] = $search['Printed']['matter'];
			}
			if (!empty($search['Printed']['mattername'])) {
				$conditions['Item.mattername'] = $search['Printed']['mattername'];
			}

			if (!empty($search['Printed']['title'])) {
				$conditions1['Item.title LIKE'] = '%' . $search['Printed']['title'] . '%';
			}
			
			if (!empty($search['Printed']['author_id'])) {
				$conditions1['Item.author_id'] = $search['Printed']['author_id'];
			}
			
			if (!empty($search['Printed']['type_id'])) {
				$conditions1['Item.type_id'] = $search['Printed']['type_id'];
			}
			
			if (!empty($search['Printed']['topic_id'])) {
				$conditions['Item.topic_id'] = $search['Printed']['topic_id'];
			}
			
			if (!empty($search['Printed']['year'])) {
				$conditions1['Item.year'] = $search['Printed']['year'];
			}

			if (!empty($search['Printed']['source'])) {
				$conditions1['Item.source'] = $search['Printed']['source'];
			}

			if (!empty($search['Printed']['matter'])) {
				$conditions1['Item.matter'] = $search['Printed']['matter'];
			}
			if (!empty($search['Printed']['mattername'])) {
				$conditions1['Item.mattername'] = $search['Printed']['mattername'];
			}

			if (!empty($search['Printed']['title'])) {
				$conditions2['Item.title LIKE'] = '%' . $search['Printed']['title'] . '%';
			}
			
			if (!empty($search['Printed']['author_id'])) {
				$conditions2['Item.author_id'] = $search['Printed']['author_id'];
			}
			
			if (!empty($search['Printed']['type_id'])) {
				$conditions2['Item.type_id'] = $search['Printed']['type_id'];
			}
			
			if (!empty($search['Printed']['topic_id'])) {
				$conditions2['Item.topic_id'] = $search['Printed']['topic_id'];
			}
			
			if (!empty($search['Printed']['year'])) {
				$conditions2['Item.year'] = $search['Printed']['year'];
			}

			if (!empty($search['Printed']['source'])) {
				$conditions2['Item.source'] = $search['Printed']['source'];
			}

			if (!empty($search['Printed']['matter'])) {
				$conditions2['Item.matter'] = $search['Printed']['matter'];
			}
			if (!empty($search['Printed']['mattername'])) {
				$conditions2['Item.mattername'] = $search['Printed']['mattername'];
			}
			
			
			return ($conditions || $conditions1 || $conditions2) ;
		} else {
			return false;
		}
	}*/
	
	function intro() {
		
	}
	
	function index_old() {
		$conditions = array();
		$this->Item->recursive = 1;
		
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Printed']['year'] = $this->data['Printed']['year']['year']; // Se arregla el campo year.
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
			$conditions =  array('OR' => array(array('Item.h-006' => 'c', 'Item.h-007' => 'm', 'Item.published' => '1'), //||
			array('Item.h-006' => 'c', 'Item.h-007' => 'b', 'Item.published' => '1'), 
			array('Item.h-006' => 'c', 'Item.h-007' => 'c', 'Item.published' => '1'),
			array('Item.h-006' => 'c', 'Item.h-007' => 'a', 'Item.published' => '1')));
		/*	$conditions['Item.h-006'] = 'k'; // Tipo libro.
			$conditions['Item.h-007'] = 'b'; // Tipo libro.
			$conditions1['Item.h-006'] = 'k'; // Tipo libro.
			$conditions1['Item.h-007'] = 'm'; // Tipo libro.
			$conditions2['Item.h-006'] = 'k'; // Tipo libro.
			$conditions2['Item.h-007'] = 'a'; // Tipo libro.
			$conditions['Item.published'] = '1'; // Publicado.*/
			
			if (!empty($this->data['printeds']['Titulo'])) {
				$conditions['Item.245 LIKE'] = '%^a' . $this->data['printeds']['Titulo'] . '%';
			}
				
			if (!empty($this->data['printeds']['Autor'])) {
				$conditions['Item.100 LIKE'] = '%^a' . $this->data['printeds']['Autor'] . '%';
			}
				
			if (!empty($this->data['printeds']['Materia'])) {
				$conditions['Item.653 LIKE'] = '%^a' . $this->data['printeds']['Materia'] . '%';
			}	
			if (!empty($this->data['printeds']['Temas'])) {
				$conditions['Item.650 LIKE'] = '%^a' . $this->data['printeds']['Temas'] . '%';
			}
			if (!empty($this->data['printeds']['Año'])) {
				$conditions['Item.260 LIKE'] = '%^c' . $this->data['printeds']['Año'] . '%';
			}
		/*	if (!empty($this->data['printeds']['IncipitLiterario'])) {
				$conditions['Item.031 LIKE'] = '%^t' . $this->data['printeds']['IncipitLiterario'] . '%';
			}*/
			if (!empty($this->data['printeds']['Instrumento'])) {
				$conditions['Item.382 LIKE'] = '%^a' . $this->data['printeds']['Instrumento'] . '%';
			}
			if (!empty($this->data['printeds']['NotacionMusical'])) {
				$conditions['Item.031 LIKE'] = '%^p' . $this->data['printeds']['NotacionMusical'] . '%';
			}
		//	if (!empty($this->data['printeds']['Genero'])) {
		//		$conditions['Item.031 LIKE'] = '%^c' . $this->data['printeds']['Genero'] . '%';
		//	}
			if (!empty($this->data['printeds']['Tonalidad'])) {
				$conditions['Item.031 LIKE'] = '%^r' . $this->data['printeds']['Tonalidad'] . '%';
			}
			if (!empty($this->data['printeds']['Responsabilidad'])) {
				$conditions['Item.700 LIKE'] = '%^a' . $this->data['printeds']['Responsabilidad'] . '%';
			}
			if (!empty($this->data['printeds']['copyright'])) {
				$conditions['Item.017 LIKE'] = '%^a' . $this->data['printeds']['copyright'] . '%';
			}
			if (!empty($this->data['printeds']['ISBN'])) {
				$conditions['Item.020 LIKE'] = '%^a' . $this->data['printeds']['ISBN'] . '%';
			}
			if (!empty($this->data['printeds']['Númeroplancha'])) {
				$conditions['Item.028 LIKE'] = '%^a' . $this->data['printeds']['Númeroplancha'] . '%';
			}
			if (!empty($this->data['printeds']['Autorcorporativo'])) {
				$conditions['Item.110 LIKE'] = '%^a' . $this->data['printeds']['Autorcorporativo'] . '%';
			}
			if (!empty($this->data['printeds']['Titulouniforme'])) {
				$conditions['Item.240 LIKE'] = '%^a' . $this->data['printeds']['Titulouniforme'] . '%';
			}
			if (!empty($this->data['printeds']['Menciónmusical'])) {
				$conditions['Item.254 LIKE'] = '%^a' . $this->data['printeds']['Menciónmusical'] . '%';
			}
			if (!empty($this->data['printeds']['Descripcionfisica'])) {
				$conditions['Item.300 LIKE'] = '%^a' . $this->data['printeds']['Descripcionfisica'] . '%';
			}
			if (!empty($this->data['printeds']['Formaobra'])) {
				$conditions['Item.380 LIKE'] = '%^a' . $this->data['printeds']['Formaobra'] . '%';
			}
			if (!empty($this->data['printeds']['Compas'])) {
				$conditions['Item.381 LIKE'] = '%^a' . $this->data['printeds']['Compas'] . '%';
			}
			if (!empty($this->data['printeds']['Mediointerpretacion'])) {
				$conditions['Item.382 LIKE'] = '%^a' . $this->data['printeds']['Mediointerpretacion'] . '%';
			}
			if (!empty($this->data['printeds']['Designaciónmusical'])) {
				$conditions['Item.383 LIKE'] = '%^a' . $this->data['printeds']['Designaciónmusical'] . '%';
			}
			if (!empty($this->data['printeds']['Tonalidad'])) {
				$conditions['Item.384 LIKE'] = '%^a' . $this->data['printeds']['Tonalidad'] . '%';
			}
			if (!empty($this->data['printeds']['Mencionserie'])) {
				$conditions['Item.490 LIKE'] = '%^a' . $this->data['printeds']['Mencionserie'] . '%';
			}
			if (!empty($this->data['printeds']['Notageneral'])) {
				$conditions['Item.500 LIKE'] = '%^a' . $this->data['printeds']['Notageneral'] . '%';
			}
			if (!empty($this->data['printeds']['Notacon'])) {
				$conditions['Item.501 LIKE'] = '%^a' . $this->data['printeds']['Notacon'] . '%';
			}
			if (!empty($this->data['printeds']['Notaformato'])) {
				$conditions['Item.505 LIKE'] = '%^a' . $this->data['printeds']['Notaformato'] . '%';
			}
			if (!empty($this->data['printeds']['Notaproduccion'])) {
				$conditions['Item.508 LIKE'] = '%^a' . $this->data['printeds']['Notaproduccion'] . '%';
			}
			if (!empty($this->data['printeds']['Notaacontecimiento'])) {
				$conditions['Item.518 LIKE'] = '%^a' . $this->data['printeds']['Notaacontecimiento'] . '%';
			}
			if (!empty($this->data['printeds']['Notasumario'])) {
				$conditions['Item.520 LIKE'] = '%^a' . $this->data['printeds']['Notasumario'] . '%';
			}
			if (!empty($this->data['printeds']['Notaaudiencia'])) {
				$conditions['Item.521 LIKE'] = '%^a' . $this->data['printeds']['Notaaudiencia'] . '%';
			}
			if (!empty($this->data['printeds']['Notalengua'])) {
				$conditions['Item.545 LIKE'] = '%^a' . $this->data['printeds']['Notalengua'] . '%';
			}
			if (!empty($this->data['printeds']['Notasdescripcion'])) {
				$conditions['Item.588 LIKE'] = '%^a' . $this->data['printeds']['Notasdescripcion'] . '%';
			}
			if (!empty($this->data['printeds']['Notafuente'])) {
				$conditions['Item.592 LIKE'] = '%^a' . $this->data['printeds']['Notafuente'] . '%';
			}
			if (!empty($this->data['printeds']['Nombrepersona'])) {
				$conditions['Item.600 LIKE'] = '%^a' . $this->data['printeds']['Nombrepersona'] . '%';
			}
			if (!empty($this->data['printeds']['Nombrescorporativa'])) {
				$conditions['Item.610 LIKE'] = '%^a' . $this->data['printeds']['Nombrescorporativa'] . '%';
			}
			if (!empty($this->data['printeds']['Siglo'])) {
				$conditions['Item.648 LIKE'] = '%^a' . $this->data['printeds']['Siglo'] . '%';
			}
			if (!empty($this->data['printeds']['Nombregeográfico'])) {
				$conditions['Item.651 LIKE'] = '%^a' . $this->data['printeds']['Nombregeográfico'] . '%';
			}
			if (!empty($this->data['printeds']['Nombrescorporativos'])) {
				$conditions['Item.710 LIKE'] = '%^a' . $this->data['printeds']['Nombrescorporativos'] . '%';
			}
			if (!empty($this->data['printeds']['Titulorelacionado'])) {
				$conditions['Item.740 LIKE'] = '%^a' . $this->data['printeds']['Titulorelacionado'] . '%';
			}
			if (!empty($this->data['printeds']['Fuente'])) {
				$conditions['Item.773 LIKE'] = '%^a' . $this->data['printeds']['Fuente'] . '%';
			}
			if (!empty($this->data['printeds']['Institucionfondos'])) {
				$conditions['Item.850 LIKE'] = '%^a' . $this->data['printeds']['Institucionfondos'] . '%';
			}
			if (!empty($this->data['printeds']['Localizacion'])) {
				$conditions['Item.852 LIKE'] = '%^a' . $this->data['printeds']['Localizacion'] . '%';
			}
			if (!empty($this->data['printeds']['Localizacionelectronicos'])) {
				$conditions['Item.856 LIKE'] = '%^a' . $this->data['printeds']['Localizacionelectronicos'] . '%';
			}
			
		} else {
		//	$conditions = array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1');
		$conditions =  array('OR' => array(array('Item.h-006' => 'c', 'Item.h-007' => 'm', 'Item.published' => '1'), //||
			array('Item.h-006' => 'c', 'Item.h-007' => 'b', 'Item.published' => '1'), 
			array('Item.h-006' => 'c', 'Item.h-007' => 'c', 'Item.published' => '1'),
			array('Item.h-006' => 'c', 'Item.h-007' => 'a', 'Item.published' => '1')));
		}

		//debug($this->data);
		//debug($conditions); die;
		
		/*
			if (!empty($this->data)) { // Si llegan datos de una busqueda.
		$this->data['Printed']['year'] = $this->data['Printed']['year']['year']; // Se arregla el campo year.
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
				'order' => 'Item.id DESC'
		);
		//debug($conditions); die;
		$this->set('items', $this->paginate('Item'));
	}
	
	function century($century = null) {
		$conditions =  array('OR' => array(array('Item.h-006' => 'c', 'Item.h-007' => 'm', 'Item.published' => '1'), //||
			array('Item.h-006' => 'c', 'Item.h-007' => 'b', 'Item.published' => '1'), 
			array('Item.h-006' => 'c', 'Item.h-007' => 'c', 'Item.published' => '1'),
			array('Item.h-006' => 'c', 'Item.h-007' => 'a', 'Item.published' => '1')));
		
		if ($century != null){
			$conditions['Item.690'] = '^a' . $century;
		}
		
		/*
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Printed']['year'] = $this->data['Printed']['year']['year']; // Se arregla el campo year.
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
	$conditions =  array('OR' => array(array('Item.h-006' => 'c', 'Item.h-007' => 'm', 'Item.published' => '1'), //||
			array('Item.h-006' => 'c', 'Item.h-007' => 'b', 'Item.published' => '1'), 
			array('Item.h-006' => 'c', 'Item.h-007' => 'c', 'Item.published' => '1'),
			array('Item.h-006' => 'c', 'Item.h-007' => 'a', 'Item.published' => '1')));
		
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
		
		$years = $this->Item->find('list', array('fields' => '260', 'conditions' => array('OR' => array(array('Item.h-006' => 'd', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'd', 'Item.h-007' => 'c', 'Item.published' => '1'), array('Item.h-006' => 'd', 'Item.h-007' => 'm', 'Item.published' => '1')))));
		
		foreach ($years as $i => $v){
			$years[$i] = $this->marc21_decode($v);
			$years[$i] = $years[$i]['c'];
		}
		
		asort($years); // Ordena de menor a mayor.
		$years = array_unique($years); // Elimina duplicados.
		
		$this->set('years', $years);
	}
	
	function matter($matter = null) {
	$conditions =  array('OR' => array(array('Item.h-006' => 'c', 'Item.h-007' => 'm', 'Item.published' => '1'), //||
			array('Item.h-006' => 'c', 'Item.h-007' => 'b', 'Item.published' => '1'), 
			array('Item.h-006' => 'c', 'Item.h-007' => 'c', 'Item.published' => '1'),
			array('Item.h-006' => 'c', 'Item.h-007' => 'a', 'Item.published' => '1')));
		
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
		
		$matters = $this->Item->find('list', array('fields' => array('Item.653'), 'conditions' => array('OR' => array(array('Item.h-006' => 'd', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'd', 'Item.h-007' => 'c', 'Item.published' => '1'), array('Item.h-006' => 'd', 'Item.h-007' => 'm', 'Item.published' => '1')))));
		$this->set('matters', $matters);
		//debug($matters); die;
	}
	
	function author($letter = null) {
	$conditions =  array('OR' => array(array('Item.h-006' => 'c', 'Item.h-007' => 'm', 'Item.published' => '1'), //||
			array('Item.h-006' => 'c', 'Item.h-007' => 'b', 'Item.published' => '1'), 
			array('Item.h-006' => 'c', 'Item.h-007' => 'c', 'Item.published' => '1'),
			array('Item.h-006' => 'c', 'Item.h-007' => 'a', 'Item.published' => '1')));
		
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
	$conditions =  array('OR' => array(array('Item.h-006' => 'c', 'Item.h-007' => 'm', 'Item.published' => '1'), //||
			array('Item.h-006' => 'c', 'Item.h-007' => 'b', 'Item.published' => '1'), 
			array('Item.h-006' => 'c', 'Item.h-007' => 'c', 'Item.published' => '1'),
			array('Item.h-006' => 'c', 'Item.h-007' => 'a', 'Item.published' => '1')));
		
		if ($letter != null){
			$conditions['Item.245 LIKE '] = "%^a" . $letter . "%";
			//debug($conditions); die;
		}
		
		/*
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['printeds']['year'] = $this->data['printeds']['year']['year']; // Se arregla el campo year.
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

	/*function source($source = null) {
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
		}
		
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'Item.title ASC'
		);
	
		$this->set('items', $this->paginate('Item'));
	}*/



function mattername($mattername = null) {
	$conditions =  array('OR' => array(array('Item.h-006' => 'c', 'Item.h-007' => 'm', 'Item.published' => '1'), //||
			array('Item.h-006' => 'c', 'Item.h-007' => 'b', 'Item.published' => '1'), 
			array('Item.h-006' => 'c', 'Item.h-007' => 'c', 'Item.published' => '1'),
			array('Item.h-006' => 'c', 'Item.h-007' => 'a', 'Item.published' => '1')));
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

function literary($letter = null) {
	$conditions =  array('OR' => array(array('Item.h-006' => 'c', 'Item.h-007' => 'm', 'Item.published' => '1'), //||
			array('Item.h-006' => 'c', 'Item.h-007' => 'b', 'Item.published' => '1'), 
			array('Item.h-006' => 'c', 'Item.h-007' => 'c', 'Item.published' => '1'),
			array('Item.h-006' => 'c', 'Item.h-007' => 'a', 'Item.published' => '1')));
	//$conditions1 = array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1');
	//$conditions2 = array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1');
		
		
		if ($letter != null){
			($conditions['Item.031 LIKE '] = "%^t" . $letter . "%" );//|| $conditions1['Item.653 LIKE '] = "%^a" . $matter . "%" ||
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

function codific($letter = null) {
	$conditions =  array('OR' => array(array('Item.h-006' => 'c', 'Item.h-007' => 'm', 'Item.published' => '1'), //||
			array('Item.h-006' => 'c', 'Item.h-007' => 'b', 'Item.published' => '1'), 
			array('Item.h-006' => 'c', 'Item.h-007' => 'c', 'Item.published' => '1'),
			array('Item.h-006' => 'c', 'Item.h-007' => 'a', 'Item.published' => '1')));
	//$conditions1 = array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1');
	//$conditions2 = array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1');
		
		
		if ($letter != null){
			($conditions['Item.031 LIKE '] = "%^p" . $letter . "%" );//|| $conditions1['Item.653 LIKE '] = "%^a" . $matter . "%" ||
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

function responsability($letter = null) {
	$conditions =  array('OR' => array(array('Item.h-006' => 'c', 'Item.h-007' => 'm', 'Item.published' => '1'), //||
			array('Item.h-006' => 'c', 'Item.h-007' => 'b', 'Item.published' => '1'), 
			array('Item.h-006' => 'c', 'Item.h-007' => 'c', 'Item.published' => '1'),
			array('Item.h-006' => 'c', 'Item.h-007' => 'a', 'Item.published' => '1')));

		
		
		if ($letter != null){
			($conditions['Item.700 LIKE '] = "%^t" . $letter . "%" );//|| $conditions1['Item.653 LIKE '] = "%^a" . $matter . "%" ||
			//$conditions2['Item.653 LIKE '] = "%^a" . $matter . "%" );
			//debug($conditions); die;
		} 
	
	
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'Item.title ASC'
		);
	
		$this->set('items', $this->paginate('Item'));

}
	
function sound($letter = null) {
	$conditions =  array('OR' => array(array('Item.h-006' => 'c', 'Item.h-007' => 'm', 'Item.published' => '1'), //||
			array('Item.h-006' => 'c', 'Item.h-007' => 'b', 'Item.published' => '1'), 
			array('Item.h-006' => 'c', 'Item.h-007' => 'c', 'Item.published' => '1'),
			array('Item.h-006' => 'c', 'Item.h-007' => 'a', 'Item.published' => '1')));
	//$conditions1 = array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1');
	//$conditions2 = array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1');
		
		
		if ($letter != null){
			($conditions['Item.031 LIKE '] = "%^m" . $letter . "%" );//|| $conditions1['Item.653 LIKE '] = "%^a" . $matter . "%" ||
			//$conditions2['Item.653 LIKE '] = "%^a" . $matter . "%" );
			//debug($conditions); die;
		} 
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'Item.title ASC'
		);
	
		$this->set('items', $this->paginate('Item'));

}	

/*function gender($letter = null) {
	$conditions =  array('OR' => array(array('Item.h-006' => 'c', 'Item.h-007' => 'm', 'Item.published' => '1'), //||
			array('Item.h-006' => 'c', 'Item.h-007' => 'b', 'Item.published' => '1'), 
			array('Item.h-006' => 'c', 'Item.h-007' => 'c', 'Item.published' => '1'),
			array('Item.h-006' => 'c', 'Item.h-007' => 'a', 'Item.published' => '1')));
	//$conditions1 = array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1');
	//$conditions2 = array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1');
		
		
		if ($letter != null){
			($conditions['Item.5922 LIKE '] = "%^c" . $letter . "%" );//|| $conditions1['Item.653 LIKE '] = "%^a" . $matter . "%" ||
			//$conditions2['Item.653 LIKE '] = "%^a" . $matter . "%" );
			//debug($conditions); die;
		} 
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'Item.title ASC'
		);
	
		$this->set('items', $this->paginate('Item'));

}*/

function hue ($letter = null) {
	$conditions =  array('OR' => array(array('Item.h-006' => 'c', 'Item.h-007' => 'm', 'Item.published' => '1'), //||
			array('Item.h-006' => 'c', 'Item.h-007' => 'b', 'Item.published' => '1'), 
			array('Item.h-006' => 'c', 'Item.h-007' => 'c', 'Item.published' => '1'),
			array('Item.h-006' => 'c', 'Item.h-007' => 'a', 'Item.published' => '1')));
	//$conditions1 = array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1');
	//$conditions2 = array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1');
		
		
		if ($letter != null){
			($conditions['Item.031 LIKE '] = "%^r" . $letter . "%" );//|| $conditions1['Item.653 LIKE '] = "%^a" . $matter . "%" ||
			//$conditions2['Item.653 LIKE '] = "%^a" . $matter . "%" );
			//debug($conditions); die;
		} 
		$this->Item->recursive = 1;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'Item.title ASC'
		);
	
		$this->set('items', $this->paginate('Item'));
		
		//$hues = $this->Item->find('list', array('fields' => '5922', 'conditions' => array('OR' => array(array('Item.h-006' => 'd', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		//array('Item.h-006' => 'd', 'Item.h-007' => 'c', 'Item.published' => '1'), array('Item.h-006' => 'd', 'Item.h-007' => 'm', 'Item.published' => '1')))));
		
		//foreach ($hues as $i => $v){
		//	$hues[$i] = $this->marc21_decode($v);
		//	$hues[$i] = $hues[$i]['f'];
		//}
		
		//asort($hues); // Ordena de menor a mayor.
		//$hues = array_unique($hues); // Elimina duplicados.
		
		//$this->set('hues', $hues);

	}
	
	function advanced_search() {
		
		if (!empty($this->data)) {
			$this->layout = 'default';
			$this->Item->recursive = -1;
			$conditions =  array('OR' => array(array('Item.h-006' => 'c', 'Item.h-007' => 'm', 'Item.published' => '1'), //||
			array('Item.h-006' => 'c', 'Item.h-007' => 'b', 'Item.published' => '1'), 
			array('Item.h-006' => 'c', 'Item.h-007' => 'c', 'Item.published' => '1'),
			array('Item.h-006' => 'c', 'Item.h-007' => 'a', 'Item.published' => '1')));	
			
			if (!empty($this->data['Printed']['245'])) { // Titulo
				$conditions['Item.245 LIKE'] = '%' . $this->data['Printed']['245'] . '%'; 
			}
			
			if (!empty($this->data['Printed']['100'])) { // Autor
				$conditions['Item.100 LIKE'] = '%' . $this->data['Printed']['100'] . '%';
			}

			if (!empty($this->data['Printed']['653'])) { // Materia
				$conditions['Item.653 LIKE'] = '%' . $this->data['Printed']['653'] . '%';
			}

			if (!empty($this->data['Printed']['260'])) { // Lugar, editor o fecha
				$conditions['Item.260 LIKE'] = '%' . $this->data['Printed']['260'] . '%';
			}
			
			if (!empty($this->data['Printed']['690'])) { // Siglo
				$conditions['Item.690 LIKE'] = '%' . $this->data['Printed']['690'] . '%';
			}

			if (!empty($this->data['ItemsIncipit']['transposition'])) { // Incipit
				$conditions['ItemsIncipit.transposition REGEXP'] = '[AB]*' . $this->data['ItemsIncipit']['transposition'] . '[0-9]*';

				/*$this->data['ItemsIncipit']['my_created'] = 	'CASE
	                WHEN ItemsIncipit.paec = '.$this->data['ItemsIncipit']['paec'].' THEN 1
	                WHEN ItemsIncipit.paec = '.$this->data['ItemsIncipit']['paecNoClef'] .' THEN 2
	                WHEN ItemsIncipit.paec = '.$this->data['ItemsIncipit']['paecNoRythm'] .' THEN 3
	                WHEN ItemsIncipit.paec = '.$this->data['ItemsIncipit']['paecNoOctave'] .' THEN 4
	                WHEN ItemsIncipit.paec = '.$this->data['ItemsIncipit']['paecNoAlteration'] .' THEN 5
	                ELSE 6
		       	END';*/
			}
			
			//debug($conditions); die;
			
			//$items = $this->Item->find('all', array('conditions' => $conditions));
			debug($this->data);
			
			$this->paginate = array(
				//'limit' => '20',
				'conditions' => $conditions,
				'contain' => 'ItemsIncipit', //this is use to fiulter the items incipit
				'order' => 'CASE
	                WHEN ItemsIncipit.paec = "'.$this->data['ItemsIncipit']['paec'].'" THEN 1
	                WHEN ItemsIncipit.paec = "'.$this->data['ItemsIncipit']['paecNoClef'] .'" THEN 2
	               	WHEN ItemsIncipit.paec = "'.$this->data['ItemsIncipit']['paecNoOctave'] .'" THEN 3
	                WHEN ItemsIncipit.paec = "'.$this->data['ItemsIncipit']['paecNoRythm'] .'" THEN 4
	                WHEN ItemsIncipit.paec = "'.$this->data['ItemsIncipit']['paecNoAlteration'] .'" THEN 5
	                ELSE 6
		       	END'
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
		//$a->setFilename('C:\xampp\htdocs\tesis\webroot\files\printeds\prueba.pdf');
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
		App::import('Vendor', 'pdf2text');

		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Access restricted.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}

		if (!empty($this->data)) {

			$data = $this->data;
			$time = time();

			if ($_FILES['data']['error']['Printed']['cover'] == 0){
				$uploaddir = "..".DS."webroot".DS."covers".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['Printed']['cover']['name']);
				copy($_FILES['data']['tmp_name']['Printed']['cover'], $uploadfile);
			}

			if ($_FILES['data']['error']['Printed']['item'] == 0){
				$uploaddir = "..".DS."webroot".DS."files".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['Printed']['item']['name']);
				copy($_FILES['data']['tmp_name']['Printed']['item'], $uploadfile);
			}
			
			if ($_FILES['data']['error']['Printed']['item'] == 0){
				
				$data['Printed']['item_file_path'] = $time.'_'.$data['Printed']['item']['name'];
				$data['Printed']['item_content_type'] = $data['Printed']['item']['type'];
				$data['Printed']['item_file_size'] = $data['Printed']['item']['size'];
				$data['Printed']['item_file_name'] = $data['Printed']['item']['name'];
				$fileName = $data['Printed']['item_file_path'];
				
				$data['Printed']['cover_path'] = $time.'_'.$data['Printed']['cover']['name'];
				$data['Printed']['cover_type'] = $this->data['Printed']['cover']['type'];
				$data['Printed']['cover_size'] = $this->data['Printed']['cover']['size'];
				$data['Printed']['cover_name'] = $this->data['Printed']['cover']['name'];
				
				unset($data['Printed']['cover']);
				unset($data['Printed']['item']);
				$data['Item'] = $data['Printed'];
				unset($data['Printed']);

				if($data['ItemsIncipit']['paec'] == "") //this verify if exist a plaine & easie code to safe it on the database
				{
					unset($data['ItemsIncipit']);
				}

				
				$this->Item->create();
				if ($this->Item->saveAll($data)) {
					$item = $this->Item->getLastInsertID();
					if(isset($fileName)){
						$this->ParsePdfToText($fileName, $item);
					}
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
		//-----------------------------Sub-Campo 031p-------------------//
		$codifics = $this->Item->find('list', array('fields' => array('031')));
		
		if ($codifics) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($codifics as $a => $v){
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
			
			$codifics = "[" . $l . "]";
			$this->set(compact('codifics', $codifics));
		} else {
			$this->set(compact('codifics', false));
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
	
	
		//---------------------------Sub-Campo 031t----------------------------//
		$literarys = $this->Item->find('list', array('fields' => array('031')));
		
		if ($literarys) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($literarys as $a => $v){
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
			
			$literarys = "[" . $l . "]";
			$this->set(compact('literarys', $literarys));
		} else {
			$this->set(compact('literarys', false));
		}
		
		
//---------------------------Sub-Campo 700a----------------------------//
		$responsabilitys = $this->Item->find('list', array('fields' => array('700')));
		
		if ($responsabilitys) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($responsabilitys as $a => $v){
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
			
			$responsabilitys = "[" . $l . "]";
			$this->set(compact('responsabilitys', $responsabilitys));
		} else {
			$this->set(compact('responsabilitys', false));
		}		
	

	//---------------------------Sub-Campo 031d----------------------------//
		$sounds = $this->Item->find('list', array('fields' => array('031')));
		
		if ($sounds) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($sounds as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['m'];
			}
			
			$list = array_unique($list);
			asort($list);
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$sounds = "[" . $l . "]";
			$this->set(compact('sounds', $sounds));
		} else {
			$this->set(compact('sounds', false));
		}
	
	//---------------------------Sub-Campo 031g----------------------------//
	/*	$genders = $this->Item->find('list', array('fields' => array('031')));
		
		if ($genders) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($genders as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['c'];
			}
			
			$list = array_unique($list);
			asort($list);
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$genders = "[" . $l . "]";
			$this->set(compact('genders', $genders));
		} else {
			$this->set(compact('genders', false));
		}*/
	
	//---------------------------Sub-Campo 031g----------------------------//
		$hues = $this->Item->find('list', array('fields' => array('031')));
		
		if ($hues) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($hues as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['r'];
			}
			
			$list = array_unique($list);
			asort($list);
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$hues = "[" . $l . "]";
			$this->set(compact('hues', $hues));
		} else {
			$this->set(compact('hues', false));
		}	
		
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
			
			if ($_FILES['data']['error']['Printed']['cover'] == 0){
				$uploaddir = "..".DS."webroot".DS."covers".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['Printed']['cover']['name']);
				copy($_FILES['data']['tmp_name']['Printed']['cover'], $uploadfile);
				unlink($uploaddir.$item['Item']['cover_path']);
			}
			
			if ($_FILES['data']['error']['Printed']['item'] == 0){
				$uploaddir = "..".DS."webroot".DS."files".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['Printed']['item']['name']);
				copy($_FILES['data']['tmp_name']['Printed']['item'], $uploadfile);
				unlink($uploaddir.$item['Item']['item_file_path']);
			}
			
			//if ($_FILES['data']['error']['Printed']['item'] == 0){
			
			if ($_FILES['data']['error']['Printed']['item'] == 0){
				$data['Printed']['item_file_path'] = $time.'_'.$data['Printed']['item']['name'];
				$data['Printed']['item_content_type'] = $data['Printed']['item']['type'];
				$data['Printed']['item_file_size'] = $data['Printed']['item']['size'];
				$data['Printed']['item_file_name'] = $data['Printed']['item']['name'];
				$fileName = $data['Printed']['item_file_path'];
			}
			unset($data['Printed']['item']);
			
			if ($_FILES['data']['error']['Printed']['cover'] == 0){
				$data['Printed']['cover_path'] = $time.'_'.$data['Printed']['cover']['name'];
				$data['Printed']['cover_type'] = $this->data['Printed']['cover']['type'];
				$data['Printed']['cover_size'] = $this->data['Printed']['cover']['size'];
				$data['Printed']['cover_name'] = $this->data['Printed']['cover']['name'];
			}
			unset($data['Printed']['cover']);
			
			$data['Item'] = $data['Printed'];
			unset($data['Printed']);

			if($data['ItemsIncipit']['paec'] == "")//this verify if exist a plaine & easie code to safe it on the database
			{
				unset($data['ItemsIncipit']);
			}
			
			if ($this->Item->saveAll($data)) {
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
	


	//---------------------------Sub-Campo 031t----------------------------//
		$literarys = $this->Item->find('list', array('fields' => array('031')));
		
		if ($literarys) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($literarys as $a => $v){
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
			
			$literarys = "[" . $l . "]";
			$this->set(compact('literarys', $literarys));
		} else {
			$this->set(compact('literarys', false));
		}
	

	//---------------------------Sub-Campo 031d----------------------------//
		$sounds = $this->Item->find('list', array('fields' => array('031')));
		
		if ($sounds) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($sounds as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['m'];
			}
			
			$list = array_unique($list);
			asort($list);
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$sounds = "[" . $l . "]";
			$this->set(compact('sounds', $sounds));
		} else {
			$this->set(compact('sounds', false));
		}
	
	
	//---------------------------Sub-Campo 5922c----------------------------//
	/*	$genders = $this->Item->find('list', array('fields' => array('5922')));
		
		if ($genders) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($genders as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['c'];
			}
			
			$list = array_unique($list);
			asort($list);
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$genders = "[" . $l . "]";
			$this->set(compact('genders', $genders));
		} else {
			$this->set(compact('genders', false));
		}
	*/
	//---------------------------Sub-Campo 5922f----------------------------//
		$hues = $this->Item->find('list', array('fields' => array('031')));
		
		if ($hues) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($hues as $a => $v){
				$v = $this->marc21_decode($v);
				$list[$a] = $v['r'];
			}
			
			$list = array_unique($list);
			asort($list);
			
			// Recorre para darle el formato deseado.
			$l = "";
			foreach ($list as $a => $v){
				$l = $l . "{ value: '" . $v . "', data: '" . $v . "' }, ";
			}
			
			$hues = "[" . $l . "]";
			$this->set(compact('hues', $hues));
		} else {
			$this->set(compact('hues', false));
		}
		
		//-----------------------------Sub-Campo 031p-------------------//
		$codifics = $this->Item->find('list', array('fields' => array('031')));
		
		if ($codifics) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($codifics as $a => $v){
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
			
			$codifics = "[" . $l . "]";
			$this->set(compact('codifics', $codifics));
		} else {
			$this->set(compact('codifics', false));
		}
		
	//---------------------------Sub-Campo 700a----------------------------//
		$responsabilitys = $this->Item->find('list', array('fields' => array('700')));
		
		if ($responsabilitys) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($responsabilitys as $a => $v){
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
			
			$responsabilitys = "[" . $l . "]";
			$this->set(compact('responsabilitys', $responsabilitys));
		} else {
			$this->set(compact('responsabilitys', false));
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