<?php
class ManuscriptsController extends AppController {

	var $name = 'Manuscripts';
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


			if (!empty($search['Manuscript']['title'])) {
				$conditions['Item.title LIKE'] = '%' . $search['Manuscript']['title'] . '%';
			}
			
			if (!empty($search['Manuscript']['author_id'])) {
				$conditions['Item.author_id'] = $search['Manuscript']['author_id'];
			}
			
			if (!empty($search['Manuscript']['type_id'])) {
				$conditions['Item.type_id'] = $search['Manuscript']['type_id'];
			}
			
			if (!empty($search['Manuscript']['topic_id'])) {
				$conditions['Item.topic_id'] = $search['Manuscript']['topic_id'];
			}
			
			if (!empty($search['Manuscript']['year'])) {
				$conditions['Item.year'] = $search['Manuscript']['year'];
			}

			if (!empty($search['Manuscript']['source'])) {
				$conditions['Item.source'] = $search['Manuscript']['source'];
			}

			if (!empty($search['Manuscript']['matter'])) {
				$conditions['Item.matter'] = $search['Manuscript']['matter'];
			}
			if (!empty($search['Manuscript']['mattername'])) {
				$conditions['Item.mattername'] = $search['Manuscript']['mattername'];
			}

			if (!empty($search['Manuscript']['title'])) {
				$conditions1['Item.title LIKE'] = '%' . $search['Manuscript']['title'] . '%';
			}
			
			if (!empty($search['Manuscript']['author_id'])) {
				$conditions1['Item.author_id'] = $search['Manuscript']['author_id'];
			}
			
			if (!empty($search['Manuscript']['type_id'])) {
				$conditions1['Item.type_id'] = $search['Manuscript']['type_id'];
			}
			
			if (!empty($search['Manuscript']['topic_id'])) {
				$conditions['Item.topic_id'] = $search['Manuscript']['topic_id'];
			}
			
			if (!empty($search['Manuscript']['year'])) {
				$conditions1['Item.year'] = $search['Manuscript']['year'];
			}

			if (!empty($search['Manuscript']['source'])) {
				$conditions1['Item.source'] = $search['Manuscript']['source'];
			}

			if (!empty($search['Manuscript']['matter'])) {
				$conditions1['Item.matter'] = $search['Manuscript']['matter'];
			}
			if (!empty($search['Manuscript']['mattername'])) {
				$conditions1['Item.mattername'] = $search['Manuscript']['mattername'];
			}

			if (!empty($search['Manuscript']['title'])) {
				$conditions2['Item.title LIKE'] = '%' . $search['Manuscript']['title'] . '%';
			}
			
			if (!empty($search['Manuscript']['author_id'])) {
				$conditions2['Item.author_id'] = $search['Manuscript']['author_id'];
			}
			
			if (!empty($search['Manuscript']['type_id'])) {
				$conditions2['Item.type_id'] = $search['Manuscript']['type_id'];
			}
			
			if (!empty($search['Manuscript']['topic_id'])) {
				$conditions2['Item.topic_id'] = $search['Manuscript']['topic_id'];
			}
			
			if (!empty($search['Manuscript']['year'])) {
				$conditions2['Item.year'] = $search['Manuscript']['year'];
			}

			if (!empty($search['Manuscript']['source'])) {
				$conditions2['Item.source'] = $search['Manuscript']['source'];
			}

			if (!empty($search['Manuscript']['matter'])) {
				$conditions2['Item.matter'] = $search['Manuscript']['matter'];
			}
			if (!empty($search['Manuscript']['mattername'])) {
				$conditions2['Item.mattername'] = $search['Manuscript']['mattername'];
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
			$this->data['Manuscript']['year'] = $this->data['Manuscript']['year']['year']; // Se arregla el campo year.
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
			$conditions =  array('OR' => array(array('Item.h-006' => 'd', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
			array('Item.h-006' => 'd', 'Item.h-007' => 'c', 'Item.published' => '1'), 
			array('Item.h-006' => 'd', 'Item.h-007' => 'm', 'Item.published' => '1')));
		/*	$conditions['Item.h-006'] = 'k'; // Tipo libro.
			$conditions['Item.h-007'] = 'b'; // Tipo libro.
			$conditions1['Item.h-006'] = 'k'; // Tipo libro.
			$conditions1['Item.h-007'] = 'm'; // Tipo libro.
			$conditions2['Item.h-006'] = 'k'; // Tipo libro.
			$conditions2['Item.h-007'] = 'a'; // Tipo libro.
			$conditions['Item.published'] = '1'; // Publicado.*/
			
			if (!empty($this->data['manuscripts']['Titulo'])) {
				$conditions['Item.245 LIKE'] = '%^a' . $this->data['manuscripts']['Titulo'] . '%';
			}
				
			if (!empty($this->data['manuscripts']['Autor'])) {
				$conditions['Item.100 LIKE'] = '%^a' . $this->data['manuscripts']['Autor'] . '%';
			}
				
			if (!empty($this->data['manuscripts']['Materia'])) {
				$conditions['Item.653 LIKE'] = '%^a' . $this->data['manuscripts']['Materia'] . '%';
			}	
			if (!empty($this->data['manuscripts']['Temas'])) {
				$conditions['Item.650 LIKE'] = '%^a' . $this->data['manuscripts']['Temas'] . '%';
			}
			if (!empty($this->data['manuscripts']['Año'])) {
				$conditions['Item.260 LIKE'] = '%^c' . $this->data['manuscripts']['Año'] . '%';
			}
		/*	if (!empty($this->data['manuscripts']['IncipitLiterario'])) {
				$conditions['Item.031 LIKE'] = '%^t' . $this->data['manuscripts']['IncipitLiterario'] . '%';
			}*/
			if (!empty($this->data['manuscripts']['Instrumento'])) {
				$conditions['Item.382 LIKE'] = '%^a' . $this->data['manuscripts']['Instrumento'] . '%';
			}
			if (!empty($this->data['manuscripts']['NotacionMusical'])) {
				$conditions['Item.031 LIKE'] = '%^p' . $this->data['manuscripts']['NotacionMusical'] . '%';
			}
		//	if (!empty($this->data['manuscripts']['Genero'])) {
		//		$conditions['Item.031 LIKE'] = '%^c' . $this->data['manuscripts']['Genero'] . '%';
		//	}
			if (!empty($this->data['manuscripts']['Tonalidad'])) {
				$conditions['Item.031 LIKE'] = '%^r' . $this->data['manuscripts']['Tonalidad'] . '%';
			}
			if (!empty($this->data['manuscripts']['Responsabilidad'])) {
				$conditions['Item.700 LIKE'] = '%^a' . $this->data['manuscripts']['Responsabilidad'] . '%';
			}
			if (!empty($this->data['manuscripts']['copyright'])) {
				$conditions['Item.017 LIKE'] = '%^a' . $this->data['manuscripts']['copyright'] . '%';
			}
			if (!empty($this->data['manuscripts']['ISBN'])) {
				$conditions['Item.020 LIKE'] = '%^a' . $this->data['manuscripts']['ISBN'] . '%';
			}
			if (!empty($this->data['manuscripts']['Númeroplancha'])) {
				$conditions['Item.028 LIKE'] = '%^a' . $this->data['manuscripts']['Númeroplancha'] . '%';
			}
			if (!empty($this->data['manuscripts']['Autorcorporativo'])) {
				$conditions['Item.110 LIKE'] = '%^a' . $this->data['manuscripts']['Autorcorporativo'] . '%';
			}
			if (!empty($this->data['manuscripts']['Titulouniforme'])) {
				$conditions['Item.240 LIKE'] = '%^a' . $this->data['manuscripts']['Titulouniforme'] . '%';
			}
			if (!empty($this->data['manuscripts']['Menciónmusical'])) {
				$conditions['Item.254 LIKE'] = '%^a' . $this->data['manuscripts']['Menciónmusical'] . '%';
			}
			if (!empty($this->data['manuscripts']['Descripcionfisica'])) {
				$conditions['Item.300 LIKE'] = '%^a' . $this->data['manuscripts']['Descripcionfisica'] . '%';
			}
			if (!empty($this->data['manuscripts']['Formaobra'])) {
				$conditions['Item.380 LIKE'] = '%^a' . $this->data['manuscripts']['Formaobra'] . '%';
			}
			if (!empty($this->data['manuscripts']['Compas'])) {
				$conditions['Item.381 LIKE'] = '%^a' . $this->data['manuscripts']['Compas'] . '%';
			}
			if (!empty($this->data['manuscripts']['Mediointerpretacion'])) {
				$conditions['Item.382 LIKE'] = '%^a' . $this->data['manuscripts']['Mediointerpretacion'] . '%';
			}
			if (!empty($this->data['manuscripts']['Designaciónmusical'])) {
				$conditions['Item.383 LIKE'] = '%^a' . $this->data['manuscripts']['Designaciónmusical'] . '%';
			}
			if (!empty($this->data['manuscripts']['Tonalidad'])) {
				$conditions['Item.384 LIKE'] = '%^a' . $this->data['manuscripts']['Tonalidad'] . '%';
			}
			if (!empty($this->data['manuscripts']['Mencionserie'])) {
				$conditions['Item.490 LIKE'] = '%^a' . $this->data['manuscripts']['Mencionserie'] . '%';
			}
			if (!empty($this->data['manuscripts']['Notageneral'])) {
				$conditions['Item.500 LIKE'] = '%^a' . $this->data['manuscripts']['Notageneral'] . '%';
			}
			if (!empty($this->data['manuscripts']['Notacon'])) {
				$conditions['Item.501 LIKE'] = '%^a' . $this->data['manuscripts']['Notacon'] . '%';
			}
			if (!empty($this->data['manuscripts']['Notaformato'])) {
				$conditions['Item.505 LIKE'] = '%^a' . $this->data['manuscripts']['Notaformato'] . '%';
			}
			if (!empty($this->data['manuscripts']['Notaproduccion'])) {
				$conditions['Item.508 LIKE'] = '%^a' . $this->data['manuscripts']['Notaproduccion'] . '%';
			}
			if (!empty($this->data['manuscripts']['Notaacontecimiento'])) {
				$conditions['Item.518 LIKE'] = '%^a' . $this->data['manuscripts']['Notaacontecimiento'] . '%';
			}
			if (!empty($this->data['manuscripts']['Notasumario'])) {
				$conditions['Item.520 LIKE'] = '%^a' . $this->data['manuscripts']['Notasumario'] . '%';
			}
			if (!empty($this->data['manuscripts']['Notaaudiencia'])) {
				$conditions['Item.521 LIKE'] = '%^a' . $this->data['manuscripts']['Notaaudiencia'] . '%';
			}
			if (!empty($this->data['manuscripts']['Notalengua'])) {
				$conditions['Item.545 LIKE'] = '%^a' . $this->data['manuscripts']['Notalengua'] . '%';
			}
			if (!empty($this->data['manuscripts']['Notasdescripcion'])) {
				$conditions['Item.588 LIKE'] = '%^a' . $this->data['manuscripts']['Notasdescripcion'] . '%';
			}
			if (!empty($this->data['manuscripts']['Notafuente'])) {
				$conditions['Item.592 LIKE'] = '%^a' . $this->data['manuscripts']['Notafuente'] . '%';
			}
			if (!empty($this->data['manuscripts']['Nombrepersona'])) {
				$conditions['Item.600 LIKE'] = '%^a' . $this->data['manuscripts']['Nombrepersona'] . '%';
			}
			if (!empty($this->data['manuscripts']['Nombrescorporativa'])) {
				$conditions['Item.610 LIKE'] = '%^a' . $this->data['manuscripts']['Nombrescorporativa'] . '%';
			}
			if (!empty($this->data['manuscripts']['Siglo'])) {
				$conditions['Item.648 LIKE'] = '%^a' . $this->data['manuscripts']['Siglo'] . '%';
			}
			if (!empty($this->data['manuscripts']['Nombregeográfico'])) {
				$conditions['Item.651 LIKE'] = '%^a' . $this->data['manuscripts']['Nombregeográfico'] . '%';
			}
			if (!empty($this->data['manuscripts']['Nombrescorporativos'])) {
				$conditions['Item.710 LIKE'] = '%^a' . $this->data['manuscripts']['Nombrescorporativos'] . '%';
			}
			if (!empty($this->data['manuscripts']['Titulorelacionado'])) {
				$conditions['Item.740 LIKE'] = '%^a' . $this->data['manuscripts']['Titulorelacionado'] . '%';
			}
			if (!empty($this->data['manuscripts']['Fuente'])) {
				$conditions['Item.773 LIKE'] = '%^a' . $this->data['manuscripts']['Fuente'] . '%';
			}
			if (!empty($this->data['manuscripts']['Institucionfondos'])) {
				$conditions['Item.850 LIKE'] = '%^a' . $this->data['manuscripts']['Institucionfondos'] . '%';
			}
			if (!empty($this->data['manuscripts']['Localizacion'])) {
				$conditions['Item.852 LIKE'] = '%^a' . $this->data['manuscripts']['Localizacion'] . '%';
			}
			if (!empty($this->data['manuscripts']['Localizacionelectronicos'])) {
				$conditions['Item.856 LIKE'] = '%^a' . $this->data['manuscripts']['Localizacionelectronicos'] . '%';
			}
		} else {
		//	$conditions = array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1');
		$conditions = array('OR' => array(array('Item.h-006' => 'd', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'd', 'Item.h-007' => 'c', 'Item.published' => '1'), array('Item.h-006' => 'd', 'Item.h-007' => 'm', 'Item.published' => '1')));
		}

		//debug($this->data);
		//debug($conditions); die;
		
		/*
			if (!empty($this->data)) { // Si llegan datos de una busqueda.
		$this->data['Manuscript']['year'] = $this->data['Manuscript']['year']['year']; // Se arregla el campo year.
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
		$conditions =array('OR' => array(array('Item.h-006' => 'd', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'd', 'Item.h-007' => 'c', 'Item.published' => '1'), array('Item.h-006' => 'd', 'Item.h-007' => 'm', 'Item.published' => '1')));
		
		if ($century != null){
			$conditions['Item.690'] = '^a' . $century;
		}
		
		/*
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Manuscript']['year'] = $this->data['Manuscript']['year']['year']; // Se arregla el campo year.
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
	function year($year = null) {
	$conditions =array('OR' => array(array('Item.h-006' => 'd', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'd', 'Item.h-007' => 'c', 'Item.published' => '1'), array('Item.h-006' => 'd', 'Item.h-007' => 'm', 'Item.published' => '1')));
		
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
	$conditions =array('OR' => array(array('Item.h-006' => 'd', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'd', 'Item.h-007' => 'c', 'Item.published' => '1'), array('Item.h-006' => 'd', 'Item.h-007' => 'm', 'Item.published' => '1')));
		
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
	$conditions =array('OR' => array(array('Item.h-006' => 'd', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'd', 'Item.h-007' => 'c', 'Item.published' => '1'), array('Item.h-006' => 'd', 'Item.h-007' => 'm', 'Item.published' => '1')));
		
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
	$conditions =array('OR' => array(array('Item.h-006' => 'd', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'd', 'Item.h-007' => 'c', 'Item.published' => '1'), array('Item.h-006' => 'd', 'Item.h-007' => 'm', 'Item.published' => '1')));
		
		if ($letter != null){
			$conditions['Item.245 LIKE '] = "%^a" . $letter . "%";
			//debug($conditions); die;
		}
		
		/*
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['manuscripts']['year'] = $this->data['manuscripts']['year']['year']; // Se arregla el campo year.
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
	$conditions = array('OR' => array(array('Item.h-006' => 'd', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'd', 'Item.h-007' => 'c', 'Item.published' => '1'), array('Item.h-006' => 'd', 'Item.h-007' => 'm', 'Item.published' => '1')));
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
	$conditions = array('OR' => array(array('Item.h-006' => 'd', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'd', 'Item.h-007' => 'c', 'Item.published' => '1'), array('Item.h-006' => 'd', 'Item.h-007' => 'm', 'Item.published' => '1')));
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

function responsability($letter = null) {
	$conditions = array('OR' => array(array('Item.h-006' => 'd', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'd', 'Item.h-007' => 'c', 'Item.published' => '1'), array('Item.h-006' => 'd', 'Item.h-007' => 'm', 'Item.published' => '1')));

		
		
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
	$conditions = array('OR' => array(array('Item.h-006' => 'd', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'd', 'Item.h-007' => 'c', 'Item.published' => '1'), array('Item.h-006' => 'd', 'Item.h-007' => 'm', 'Item.published' => '1')));
	//$conditions1 = array('Item.h-006' => 'k', 'Item.h-007' => 'm', 'Item.published' => '1');
	//$conditions2 = array('Item.h-006' => 'k', 'Item.h-007' => 'a', 'Item.published' => '1');
		
		
		if ($letter != null){
			($conditions['Item.382 LIKE '] = "%^a" . $letter . "%" );//|| $conditions1['Item.653 LIKE '] = "%^a" . $matter . "%" ||
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
	$conditions = array('OR' => array(array('Item.h-006' => 'd', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'd', 'Item.h-007' => 'c', 'Item.published' => '1'), array('Item.h-006' => 'd', 'Item.h-007' => 'm', 'Item.published' => '1')));
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
	$conditions = array('OR' => array(array('Item.h-006' => 'd', 'Item.h-007' => 'a', 'Item.published' => '1'), //||
		array('Item.h-006' => 'd', 'Item.h-007' => 'c', 'Item.published' => '1'), array('Item.h-006' => 'd', 'Item.h-007' => 'm', 'Item.published' => '1')));
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
			$conditions = array('Item.h-006' => 'd', 'Item.h-007' => 'm', 'Item.published' => '1');	
			
			if (!empty($this->data['Manuscript']['245'])) { // Titulo
				$conditions['Item.245 LIKE'] = '%' . $this->data['Manuscript']['245'] . '%'; 
			}
			
			if (!empty($this->data['Manuscript']['100'])) { // Autor
				$conditions['Item.100 LIKE'] = '%' . $this->data['Manuscript']['100'] . '%';
			}

			if (!empty($this->data['Manuscript']['653'])) { // Materia
				$conditions['Item.653 LIKE'] = '%' . $this->data['Manuscript']['653'] . '%';
			}

			if (!empty($this->data['Manuscript']['260'])) { // Lugar, editor o fecha
				$conditions['Item.260 LIKE'] = '%' . $this->data['Manuscript']['260'] . '%';
			}
			
			if (!empty($this->data['Manuscript']['690'])) { // Siglo
				$conditions['Item.690 LIKE'] = '%' . $this->data['Manuscript']['690'] . '%';
			}
			if (!empty($this->data['ItemsIncipit']['transposition'])) { // Incipit
				$conditions['ItemsIncipit.transposition REGEXP'] = '[AB]*' . $this->data['ItemsIncipit']['transposition'] . '[0-9]*';
			}
			
			//debug($conditions); die;
			
			//$items = $this->Item->find('all', array('conditions' => $conditions));
			//debug($items); die;
			
			$this->paginate = array(
				//'limit' => '20',
				'conditions' => $conditions,
				'contain' => 'ItemsIncipit' //this is use to fiulter the items incipit
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
		//$a->setFilename('C:\xampp\htdocs\tesis\webroot\files\manuscripts\prueba.pdf');
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

			//debug($_FILES['data']['size']['Manuscript']['item']); die;
			
			if ($_FILES['data']['error']['Manuscript']['cover'] == 0){
				$this->Attachment->upload($this->data['Manuscript'], 'cover');
			}

			if ($_FILES['data']['error']['Manuscript']['item'] == 0){
				$this->Attachment->upload($this->data['Manuscript'], 'item');
			}

			if ($_FILES['data']['error']['Manuscript']['item'] == 0){
				$data['Manuscript']['item_file_path'] = $this->data['Manuscript']['item_file_path'];
				$data['Manuscript']['item_content_type'] = $this->data['Manuscript']['item_content_type'];
				$data['Manuscript']['item_file_size'] = $this->data['Manuscript']['item_file_size'];
				$data['Manuscript']['item_file_name'] = $this->data['Manuscript']['item_file_name'];
				$fileName = $data['Manuscript']['item_file_path'];
			}

			if ($_FILES['data']['error']['Manuscript']['cover'] == 0){
				$data['Manuscript']['cover_path'] = $this->data['Manuscript']['cover_file_path'];
				$data['Manuscript']['cover_type'] = $this->data['Manuscript']['cover_content_type'];
				$data['Manuscript']['cover_size'] = $this->data['Manuscript']['cover_file_size'];
				$data['Manuscript']['cover_name'] = $this->data['Manuscript']['cover_file_name'];
			}

			unset($data['Manuscript']['cover']);
			unset($data['Manuscript']['item']);
			$data['Item'] = $data['Manuscript'];
			unset($data['Manuscript']);

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

				if ($_FILES['data']['error']['Manuscript']['item'] == '1') {
					$this->Session->setFlash(__('El archivo o documento no pudo ser cargado, verifique si sobrepasa los '.ini_get('upload_max_filesize').' permitidos.', true));
					$this->redirect(array('action' => 'edit/' . $item));
				} else {
					$this->Session->setFlash(__('La partitura ha sido guardada.', true));
					$this->redirect(array('action' => 'view/' . $item));
				}
				
			} else {
				$this->Session->setFlash(__('La partitura no pudo ser guardada. Por favor, intentélo nuevamente.', true));
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
	

	//---------------------------Sub-Campo 031d----------------------------//
		$sounds = $this->Item->find('list', array('fields' => array('382')));
		
		if ($sounds) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($sounds as $a => $v){
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
			
			$sounds = "[" . $l . "]";
			$this->set(compact('sounds', $sounds));
		} else {
			$this->set(compact('sounds', false));
		}
	
	//---------------------------Sub-Campo 5922c----------------------------//
		/*$genders = $this->Item->find('list', array('fields' => array('5922')));
		
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
		
			if ($_FILES['data']['error']['Manuscript']['cover'] == 0){
				$item = $this->Item->find('first', array('conditions' => array('Item.id' => $data['Manuscript']['id'])));
				$this->Attachment->delete_files($item['Item']['cover_path']); // Elimina el archivo anterior.
				$this->Attachment->upload($this->data['Manuscript'], 'cover'); // Agrega el archivo nuevo.
			}

			if ($_FILES['data']['error']['Manuscript']['item'] == 0){
				$item = $this->Item->find('first', array('conditions' => array('Item.id' => $data['Manuscript']['id'])));
				$this->Attachment->delete_files($item['Item']['item_file_path']); // Elimina el archivo anterior.
				$this->Attachment->upload($this->data['Manuscript'], 'item'); // Agrega el archivo nuevo.
			}

			if ($_FILES['data']['error']['Manuscript']['item'] == 0){
				$data['Manuscript']['item_file_path'] = $this->data['Manuscript']['item_file_path'];
				$data['Manuscript']['item_content_type'] = $this->data['Manuscript']['item_content_type'];
				$data['Manuscript']['item_file_size'] = $this->data['Manuscript']['item_file_size'];
				$data['Manuscript']['item_file_name'] = $this->data['Manuscript']['item_file_name'];
				$fileName = $data['Manuscript']['item_file_path'];
			}

			if ($_FILES['data']['error']['Manuscript']['cover'] == 0){
				$data['Manuscript']['cover_path'] = $this->data['Manuscript']['cover_file_path'];
				$data['Manuscript']['cover_type'] = $this->data['Manuscript']['cover_content_type'];
				$data['Manuscript']['cover_size'] = $this->data['Manuscript']['cover_file_size'];
				$data['Manuscript']['cover_name'] = $this->data['Manuscript']['cover_file_name'];
			}

			unset($data['Manuscript']['cover']);
			unset($data['Manuscript']['item']);
			$data['Item'] = $data['Manuscript'];
			unset($data['Manuscript']);

			if($data['ItemsIncipit']['paec'] == "")//this verify if exist a plaine & easie code to safe it on the database
			{
				unset($data['ItemsIncipit']);
			}

			$this->Item->create();
			if ($this->Item->saveAll($data)) {
				if(isset($fileName)){
					$this->ParsePdfToText($fileName, $id);
				}
				
				if ($_FILES['data']['error']['Manuscript']['item'] == '1') {
					$this->Session->setFlash(__('El archivo o documento no pudo ser cargado, verifique si sobrepasa los '.ini_get('upload_max_filesize').' permitidos.', true));
					$this->redirect(array('action' => 'edit/' . $data['Item']['id']));
				} else {
					$this->Session->setFlash(__('La partitura ha sido modificada.', true));
					$this->redirect(array('action' => 'view/' . $data['Item']['id']));
				}
				
				$this->redirect(array('action' => 'view/' . $data['Item']['id']));
			} else {
				$this->Session->setFlash(__('La partitura no pudo ser modificada. Por favor, intentélo nuevamente.', true));
				$this->redirect(array('action' => 'edit/' . $data['Item']['id']));
			}
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
		$sounds = $this->Item->find('list', array('fields' => array('382')));
		
		if ($sounds) {
			$list = "";
			// Recorre para extraer el contenido del subcampo deseado.
			foreach ($sounds as $a => $v){
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