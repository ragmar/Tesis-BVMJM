<?php
class ItemsController extends AppController {

	var $name = 'Items';
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
			'libros',
			'revistas',
			'manuscritos',
			'impresos',
			'iconografias',
			'trabajos',
			'viewer'
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
	
	function buildConditions ($search){ // Funcion que arma las condiciones para el paginador a partir de el arreglo con los campos de búsqueda.
		if (!empty($search)){
			$conditions = array();

			if (!empty($search['Item']['title'])) {
				$conditions['Item.title LIKE'] = '%' . $search['Item']['title'] . '%';
			}
			
			if (!empty($search['Item']['author_id'])) {
				$conditions['Item.author_id'] = $search['Item']['author_id'];
			}
			
			if (!empty($search['Item']['type_id'])) {
				$conditions['Item.type_id'] = $search['Item']['type_id'];
			}
			
			if (!empty($search['Item']['topic_id'])) {
				$conditions['Item.topic_id'] = $search['Item']['topic_id'];
			}
			
			if (!empty($search['Item']['year'])) {
				$conditions['Item.year'] = $search['Item']['year'];
			}
			
			return $conditions;
		} else {
			return false;
		}
	}
	
	function change_status($id = null) {
		$this->autoRender = false;
		
		$s = $this->Item->find('all', array('conditions' => array('Item.id' => $id)));
		$s = $s['0']['Item']['published'];
		
		$this->Item->id = $id;
		$this->Item->saveField('published', !$s);
		
		if (!$s) {
			$this->Session->setFlash(__('Obra publicada.', true));
		} else {
			$this->Session->setFlash(__('Obra despublicada.', true));
		}
		
		$this->redirect(array('action' => 'index'));
	}
	
	function index() {
		$conditions = array();
		$this->Item->recursive = 1;

		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			//$this->data['Item']['year'] = $this->data['Item']['year']['year']; // Se arregla el campo year.
			$this->Session->write('Search', $this->data); // Se guarda en sesion la busqueda.
			$conditions = $this->buildConditions($this->data);
		} else { // Si se viene del home o del paginador ...
			
			//$this->Session->delete('Search');
			//if (isset($this->passedArgs[0]) && (substr($this->passedArgs[0], 0, 4) != "page")) {
			$conditions = $this->buildConditions("s");
			if ($this->Session->check('Search')) {

				$conditions = $this->buildConditions($this->Session->read('Search'));
			}
			//}

		}

		/*$this->paginate = array(
				'limit' => '1',
				'conditions' => $conditions
		);*/
		
		$this->set('items', $this->paginate());
		
		/*
		$topics = $this->Item->Topic->find('list');
		$types = $this->Item->Type->find('list');
		$authors = $this->Item->Author->find('list', array('fields' => array('id', 'fullname'), 'order' => 'fullname'));
		$this->set(compact('topics', 'types', 'authors'));
		*/
	}
	
	function search() {
		$search =$this->data['Item']['search'];;
		$verif =$this->Session->read('Search');
		if ($verif!=$search && $search!=""){
			$search = $this->data['Item']['search'];
			$this->Session->write('Search', $search); // Se guarda en sesion la busqueda.
		}
		else{
			$search=$verif;
		}
		
		// Searches.
		if ($this->Session->check('Auth.User')) {
			$s = array('user_id' => $this->Session->read('Auth.User.id'), 'ip' => $_SERVER['REMOTE_ADDR'], 'search' => $search);
		} else {
			$s = array('user_id' => '0', 'ip' => $_SERVER['REMOTE_ADDR'], 'search' => $search,);
		}
		$this->Search->save($s);
		
		$this->Item->recursive = 0;

		// Buscar dentro de la carpeta TXT la palabra y llamar a la funcion searchWordsOnTxtFile
		$txtFiles= glob("../webroot/files/text/*.txt");
		
		foreach($txtFiles as $txtFile){
			$this->searchWordsOnTxtFile($search,$txtFile);
		}
		
		// Realiza la busqueda simple en todas las obras por el título, autor, materia y publicación.
		$this->paginate = array(
			//'limit' => '20',
			'conditions' => array(
					'Item.published' => '1',								// Obras publicadas
					'OR' => array(
						'Item.245 LIKE' => '%' . $search . '%', 			// Titulo
						'Item.100 LIKE' => '%' . $search . '%',				// Autor
						'Item.260 LIKE' => '%' . $search . '%',				// Publicacion (lugar, editor, fecha)
						'Item.653 LIKE' => '%' . $search . '%',				// Materia
						'Item.found_pdf LIKE' => 1	// Texto pdf
					)
			)
		);
		//var_dump($this->Session->read('Search'));
		if (empty($search)) {
			$this->Session->setFlash(__('Debe introducir alguna palabra para realizar la búsqueda', true));
		}
		$this->set('search', $search);
		$this->set('items', $this->paginate());
	
	}

	function searchWordsOnTxtFile($word, $txtFile){
	
		$lines = file($txtFile);
		
		foreach ($lines as $line){
			
			$fileName = basename(preg_replace('/\\.[^.\\s]{3}$/', '', $txtFile));
			$this->Item->updateAll(array('Item.found_pdf' => 0),array('Item.item_file_path' => $fileName.".pdf"));
	
			$wordPosition = stripos($line, $word);

			if($wordPosition !== false){
				// Update item on database
				$this->Item->updateAll(array('Item.found_pdf' => 1),array('Item.item_file_path' => $fileName.".pdf"));
			}
		}
	}

	function advanced_search() {
		$this->Item->recursive = 0;
		$conditions = array();
		
		if (!empty($this->data)) {
			$this->data['Item']['year'] = $this->data['Item']['year']['year'];

			if (!empty($this->data['Item']['title'])) {
				$conditions['Item.title LIKE'] = '%' . $this->data['Item']['title'] . '%'; 
			}
			
			if (!empty($this->data['Item']['author_id'])) {
				$conditions['Item.author_id'] = $this->data['Item']['author_id'];
			}

			if (!empty($this->data['Item']['type_id'])) {
				$conditions['Item.type_id'] = $this->data['Item']['type_id'];
			}
			
			if (!empty($this->data['Item']['topic_id'])) {
				$conditions['Item.topic_id'] = $this->data['Item']['topic_id'];
			}
			
			if (!empty($this->data['Item']['year'])) {
				$conditions['Item.year'] = $this->data['Item']['year'];
			}
			
			$this->paginate = array(
				'limit' => '20',
				'conditions' => $conditions
			);
			
			$this->set('items', $this->paginate());
			
			// Searches.
			if ($this->Session->check('Auth.User')) {
				$s = array('user_id' => $this->Session->read('Auth.User.id'), 'ip' => $_SERVER['REMOTE_ADDR'], 'search' => $this->data['Item']['title']);
			} else {
				$s = array('user_id' => '0', 'ip' => $_SERVER['REMOTE_ADDR'], 'search' => $this->data['Item']['title'],);
			}
			$this->Search->save($s);
			
			$this->render('index');
		}
		
		//$topics = $this->Item->Topic->find('list');
		//$types = $this->Item->Type->find('list');
		//$authors = $this->Item->Author->find('list', array('fields' => array('id', 'fullname'), 'order' => 'fullname'));
		//$this->set(compact('topics', 'types', 'authors'));
	}
	
	function view($id = null) {
		//$this->layout = null;
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
			
			if ($_FILES['data']['error']['Item']['item'] == 0){
				$uploaddir = "C:".DS."Program Files".DS."xampp".DS."htdocs".DS."tesis".DS."webroot".DS."files".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['Item']['item']['name']);
				copy($_FILES['data']['tmp_name']['Item']['item'], $uploadfile);
			}
			
			if ($_FILES['data']['error']['Item']['cover'] == 0){
				$uploaddir = "C:".DS."Program Files".DS."xampp".DS."htdocs".DS."tesis".DS."webroot".DS."covers".DS;
				$uploadfile = $uploaddir . basename($time.'_'.$this->data['Item']['cover']['name']);
				copy($_FILES['data']['tmp_name']['Item']['cover'], $uploadfile);
			}
			
			if ($this->Attachment->upload($this->data['Item'])){ // Si se subió el archivo...
				
				$data['Item']['item_file_path'] = $time.'_'.$data['Item']['item']['name'];
				$data['Item']['item_content_type'] = $data['Item']['item']['type'];
				$data['Item']['item_file_size'] = $data['Item']['item']['size'];
				$data['Item']['item_file_name'] = $data['Item']['item']['name'];
				
				$data['Item']['cover_path'] = $time.'_'.$data['Item']['cover']['name'];
				$data['Item']['cover_type'] = $this->data['Item']['cover']['type'];
				$data['Item']['cover_size'] = $this->data['Item']['cover']['size'];
				$data['Item']['cover_name'] = $this->data['Item']['cover']['name'];
				
				$this->Item->create();
				
				unset($data['Item']['cover']);
				unset($data['Item']['item']);
				
				if ($this->Item->save($data)) {
					$this->Session->setFlash(__('El archivo ha sido guardado.', true));
				} else {
					$this->Session->setFlash(__('El archivo no pudo ser guardado. Por favor, intentelo nuevamente.', true));
				}
				
			} else {
				$this->Session->setFlash('No se subió ningun archivo de la obra. Debe cargar alguno.');
				$this->redirect(array('action' => 'add'));
			}
			
			$this->redirect(array('action' => 'index'));
			//$this->redirect(array('action' => 'view', $item));
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
		}
	}

	function publications ($title = null) {
		$this->autoRender = false;
		$publications = $this->Item->find('list', array('fields' => array('362'), 'conditions' => array('Item.245 LIKE ' => '%'.$title.'%')));
		
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
			return $publications;
		} else {
			return false;
		}
	}
	
	function edit($id = null) {
		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Access restricted.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['Item']['year'] = $this->data['Item']['year']['year'];
			if ($this->data['Item']['item']['error'] == '0'){
				$item = $this->Item->find('first', array('conditions' => array('Item.id' => $id)));
				$this->Attachment->delete_files($item['Item']['item_file_path']);
				$i = $this->Attachment->upload($this->data['Item']); // Si se subió el archivo...
			}
			if ($this->Item->save($this->data)) {
				$this->Session->setFlash(__('El item ha sido modificado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El item no pudo ser modificado. Por favor, intente nuevamente.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Item->read(null, $id);
		}
		$users = $this->Item->User->find('list');
		$topics = $this->Item->Topic->find('list');
		$types = $this->Item->Type->find('list');
		$authors = $this->Item->Author->find('list', array('fields' => array('id', 'fullname'), 'order' => 'fullname'));
		$indicators = $this->Item->Indicator->find('list');
		$values = $this->Item->Value->find('list');
		$this->set(compact('users', 'topics', 'types', 'authors', 'indicators', 'values'));
	}

	function delete($id = null) {
		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Access restricted.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
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
	
	function viewer(){
		
	}

}
