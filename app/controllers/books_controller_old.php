<?php
class BooksController extends AppController {

	var $name = 'Books';
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
				'marc21'
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

	function buildConditions ($search){ // Funcion que arma las condiciones para el paginador a partir de el arreglo con los campos de búsqueda.
		if (!empty($search)){
			$conditions = array();
			$conditions['Item.type_id'] = '1'; // Tipo revista.
			
			if (!empty($search['Magazine']['title'])) {
				$conditions['Item.title LIKE'] = '%' . $search['Magazine']['title'] . '%';
			}
			
			if (!empty($search['Magazine']['author_id'])) {
				$conditions['Item.author_id'] = $search['Magazine']['author_id'];
			}
			
			if (!empty($search['Magazine']['type_id'])) {
				$conditions['Item.type_id'] = $search['Magazine']['type_id'];
			}
			
			if (!empty($search['Magazine']['topic_id'])) {
				$conditions['Item.topic_id'] = $search['Magazine']['topic_id'];
			}
			
			if (!empty($search['Magazine']['year'])) {
				$conditions['Item.year'] = $search['Magazine']['year'];
			}
			
			return $conditions;
		} else {
			return false;
		}
	}
	
	function index() {
		$conditions = array();
		$this->Item->recursive = 1;
		
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Magazine']['year'] = $this->data['Magazine']['year']['year']; // Se arregla el campo year.
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
		
		$topics = $this->Item->Topic->find('list');
		$types = $this->Item->Type->find('list');
		$authors = $this->Item->Author->find('list', array('fields' => array('id', 'fullname'), 'order' => 'fullname'));
		$this->set(compact('topics', 'types', 'authors'));
	}
	
	function century($century = null) {
		$conditions = array('Item.type_id' => '1');
	
		/*if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Magazine']['year'] = $this->data['Magazine']['year']['year']; // Se arregla el campo year.
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
	
		if ($century != null) {
			switch ($century){
				case 'XV':
					$conditions = array('Item.year BETWEEN 1401 AND 1500', 'Item.type_id' => '1');
					break; 
				case 'XVI':
					$conditions = array('Item.year BETWEEN 1501 AND 1600', 'Item.type_id' => '1');
					break; 
				case 'XVII':
					$conditions = array('Item.year BETWEEN 1601 AND 1700', 'Item.type_id' => '1');
					break; 
				case 'XVIII':
					$conditions = array('Item.year BETWEEN 1701 AND 1800', 'Item.type_id' => '1');
					break; 
				case 'XIX':
					$conditions = array('Item.year BETWEEN 1801 AND 1900', 'Item.type_id' => '1');
					break; 
				case 'XX':
					$conditions = array('Item.year BETWEEN 1901 AND 2000', 'Item.type_id' => '1');
					break; 
				case 'XXI':
					$conditions = array('Item.year BETWEEN 2001 AND 2100', 'Item.type_id' => '1');
					break; 
			}
		}
		
		$this->Item->recursive = 0;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				'order' => 'Item.title ASC'
		);
		//debug($conditions); die;
		$this->set('items', $this->paginate('Item'));
	}
	
	function year($year = null) {
		$conditions = array('Item.type_id' => '1');
		
		/*if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Magazine']['year'] = $this->data['Magazine']['year']['year']; // Se arregla el campo year.
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
	
		if ($year != null) {
			$conditions = array('Item.year' => $year, 'Item.type_id' => '1');
		}
		
		$this->Item->recursive = 0;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				'order' => 'Item.title ASC'
		);		
		$this->set('items', $this->paginate('Item'));
		
		$years = $this->Item->find('all', array('fields' => array('year'), 'order' => 'year ASC', 'group' => 'year', 'conditions' => array('type_id' => '1')));
		$this->set('years', $years);
		//debug($years); die;
	}
	
	function matter($id = null) {
		$conditions = array('Item.type_id' => '1');

		/*
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Magazine']['year'] = $this->data['Magazine']['year']['year']; // Se arregla el campo year.
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
		
		if ($id != null) {
			$conditions = array('Item.topic_id' => $id, 'Item.type_id' => '1');
		}
		
		$this->Item->recursive = 0;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				'order' => 'Item.title ASC'
		);
	
		$this->set('items', $this->paginate('Item'));
		$topics = $this->Item->Topic->find('list');
		$this->set(compact('topics', 'types', 'authors'));
	}
	
	function author($letter = null) {
		$conditions = array();
	
		/*if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Magazine']['year'] = $this->data['Magazine']['year']['year']; // Se arregla el campo year.
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
				
		if ($letter != null) {
			$conditions = array('Author.lastname LIKE' => $letter.'%');
		}
		
		$this->Item->Author->recursive = 0;
		
		$this->paginate = array(
				//'limit' => '4',
				'conditions' => $conditions,
				'order' => 'Author.lastname ASC'
		);
	
		$this->set('authors', $this->paginate('Author'));
	}
	
	function title($letter = null) {
		$conditions = array('Item.type_id' => '1');
		
		/*
		if (!empty($this->data)) { // Si llegan datos de una busqueda.
			$this->data['Magazine']['year'] = $this->data['Magazine']['year']['year']; // Se arregla el campo year.
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
	
		if ($letter != null) {
			if ($letter != '0-9') {
				$conditions = array('Item.title LIKE' => $letter.'%', 'Item.type_id' => '1');
			} else {
				$conditions = array("
						Item.title LIKE '0%' OR Item.title LIKE '1%' OR Item.title LIKE '2%' OR Item.title LIKE '3%' OR
						Item.title LIKE '4%' OR Item.title LIKE '5%' OR Item.title LIKE '6%' OR Item.title LIKE '7%' OR
						Item.title LIKE '8%' OR Item.title LIKE '9%'
						", 'Item.type_id' => '1');
			}
		}
		
		$this->Item->recursive = 0;
		
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				'order' => 'Item.title ASC'
		);
	
		$this->set('items', $this->paginate('Item'));
	}
	
	function search() {
		$search = $this->data['Item']['search'];
		
		// Searches.
		if ($this->Session->check('Auth.User')) {
			$s = array('user_id' => $this->Session->read('Auth.User.id'), 'ip' => $_SERVER['REMOTE_ADDR'], 'search' => $search);
		} else {
			$s = array('user_id' => '0', 'ip' => $_SERVER['REMOTE_ADDR'], 'search' => $search,);
		}
		$this->Search->save($s);
		
		$this->Item->recursive = 0;
		$this->paginate = array(
				'limit' => '20',
				'conditions' => array(
					'Item.title like' => '%' . $search . '%'
				)
		);

		$this->set('items', $this->paginate());
		$this->render('index');
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
				//'limit' => '20',
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
		
		$topics = $this->Item->Topic->find('list');
		$types = $this->Item->Type->find('list');
		$authors = $this->Item->Author->find('list', array('fields' => array('id', 'fullname'), 'order' => 'fullname'));
		$this->set(compact('topics', 'types', 'authors'));
	}
	
	function view($id = null) {
		//App::import('Vendor', 'pdf2text');
		
		//$a = new PDF2Text();
		//$a->setFilename('C:\xampp\htdocs\tesis\webroot\files\books\prueba.pdf');
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
		if (!empty($this->data)) { //debug($this->data); debug($_FILES); die;
			
			/*
			$this->data['Item']['file_path'] = time().'_'.$this->data['Item']['file']['name'];
			$this->data['Item']['file_type'] = $this->data['Item']['file']['type'];
			$this->data['Item']['file_size'] = $this->data['Item']['file']['size'];
			$this->data['Item']['file'] = $this->data['Item']['file']['name'];
			$this->data['Item']['cover_path'] = time().'_'.$this->data['Item']['cover']['name'];
			$this->data['Item']['cover_type'] = $this->data['Item']['cover']['type'];
			$this->data['Item']['cover_size'] = $this->data['Item']['cover']['size'];
			$this->data['Item']['cover'] = $this->data['Item']['cover']['name'];
			$this->data['Item']['year'] = $this->data['Item']['year']['year'];
			
			if ($_FILES['data']['error']['Item']['file'] == 0){
				$uploaddir = "C:".DS."xampp".DS."htdocs".DS."tesis".DS."webroot".DS."files".DS;
				$uploadfile = $uploaddir . basename($this->data['Item']['file_path']);
				copy($_FILES['data']['tmp_name']['Item']['file'], $uploadfile);
			}
			
			if ($_FILES['data']['error']['Item']['cover'] == 0){
				$uploaddir = "C:".DS."xampp".DS."htdocs".DS."tesis".DS."webroot".DS."files".DS."covers".DS;
				$uploadfile = $uploaddir . basename($this->data['Item']['cover_path']);
				copy($_FILES['data']['tmp_name']['Item']['cover'], $uploadfile);
			}
			*/

			$this->data['Item']['year'] = $this->data['Item']['year']['year'];
			if ($this->Attachment->upload($this->data['Item'])){ // Si se subió el archivo...
				$this->Item->create();
				if ($this->Item->save($this->data)) {
					$item = $this->Item->getLastInsertId();
					$this->Session->setFlash(__('El item ha sido guardado.', true));
					$this->redirect(array('action' => 'view', $item));
				} else {
					$this->Session->setFlash(__('El item no pudo ser guardado. Por favor, intentelo nuevamente.', true));
				}
			}
		}
		$users = $this->Item->User->find('list');
		$topics = $this->Item->Topic->find('list');
		$types = $this->Item->Type->find('list');
		$authors = $this->Item->Author->find('list', array('fields' => array('id', 'fullname'), 'order' => 'fullname'));
		$indicators = $this->Item->Indicator->find('list');
		$values = $this->Item->Value->find('list');
		$this->set(compact('users', 'topics', 'types', 'authors', 'indicators', 'values'));
	}

	function edit($id = null) {
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
