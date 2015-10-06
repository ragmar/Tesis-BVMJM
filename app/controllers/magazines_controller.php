<?php
class MagazinesController extends AppController {

	var $name = 'Magazines';
	var $components = array('Attachment');
	var $uses = array('Item', 'Search', 'UserItem');

	function beforeFilter(){
		parent::beforeFilter();
		// Acciones permitidas sin loguearse.
		$this->Auth->allow(
				'index',
				'view',
				'search',
				'advanced_search',
				'marc21',
				'intro',
				'tags'
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
			$conditions['Item.h-006'] = 'a'; // Tipo revista.
			$conditions['Item.h-007'] = 's'; // Tipo revista.
			
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
	
	function intro() {
		
	}
	
	function index_old() {
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
		
		//$topics = $this->Item->Topic->find('list');
		//$types = $this->Item->Type->find('list');
		//$authors = $this->Item->Author->find('list', array('fields' => array('id', 'fullname'), 'order' => 'fullname'));
		//$this->set(compact('topics', 'types', 'authors'));
	}
	
	function index() {
		$conditions = array(
				'AND' => array(
						array('Item.h-006' => 'a'),
						array('Item.published' => '1'),
						array(array(
								'OR' => array(
										array('Item.h-007' => 's'),
										array('Item.h-007' => 'b')
								)
						))
				)
		);
		
		if (!empty($this->data)) {
			if (!empty($this->data['magazines']['Titulo'])) {
				$conditions['Item.245 LIKE'] = '%^a' . $this->data['magazines']['Titulo'] . '%';
			}
			
			if (!empty($this->data['magazines']['Autor'])) {
				$conditions['Item.100 LIKE'] = '%^a' . $this->data['magazines']['Autor'] . '%';
			}
			
			if (!empty($this->data['magazines']['Materia'])) {
				$conditions['Item.653 LIKE'] = '%^a' . $this->data['magazines']['Materia'] . '%';
			}
			
			if (!empty($this->data['magazines']['Siglo'])) {
				$conditions['Item.690 LIKE'] = '%^a' . $this->data['magazines']['Siglo'];
			}
			
			if (!empty($this->data['magazines']['Tipo'])) {
				$conditions['Item.h-007'] = $this->data['magazines']['Tipo'];
			}
		}
		
		$this->Item->recursive = 1;
		$this->paginate = array(
				//'limit' => '1',
				'conditions' => $conditions,
				//'order' => 'ASC'
		);
		$this->set('items', $this->paginate('Item'));
		
		$this->UserItem->recursive = 0;
		$favorites = $this->UserItem->find('all', array('conditions' => $conditions));
		
		$i = 0;
		$temp = null;
		foreach ($favorites as $f) {
			$temp[$i] = $f['UserItem']['item_id'];
			$i++;
		}
		$this->set('favorites', $temp);
	}

	function advanced_search() {
		$conditions = array(
				'AND' => array(
						array('Item.h-006' => 'a'),
						array('Item.published' => '1'),
						array(array(
								'OR' => array(
										array('Item.h-007' => 's'),
										array('Item.h-007' => 'b')
								)
						))
				)
		);
		
		if (!empty($this->data)) {
			$this->layout = 'default';
			$this->Item->recursive = -1;
			
			if (!empty($this->data['Magazine']['017'])) { // Número de copyright o de depósito legal.
				$conditions['Item.017 LIKE'] = '%' . $this->data['Magazine']['017'] . '%'; 
			}
			
			if (!empty($this->data['Magazine']['020'])) { // Número Internacional Normalizado para Libros (ISBN).
				$conditions['Item.020 LIKE'] = '%' . $this->data['Magazine']['020'] . '%';
			}

			if (!empty($this->data['Magazine']['022'])) { // Número Internacional Normalizado para Publicaciones Seriadas (ISSN).
				$conditions['Item.022 LIKE'] = '%' . $this->data['Magazine']['022'] . '%';
			}

			if (!empty($this->data['Magazine']['028'])) { // Número de plancha.
				$conditions['Item.028 LIKE'] = '%' . $this->data['Magazine']['028'] . '%';
			}
			
			if (!empty($this->data['Magazine']['040'])) { // Fuente de la catalogación.
				$conditions['Item.040 LIKE'] = '%' . $this->data['Magazine']['040'] . '%';
			}
			
			if (!empty($this->data['Magazine']['041'])) { // Código de lengua.
				$conditions['Item.041 LIKE'] = '%' . $this->data['Magazine']['041'] . '%';
			}
			
			if (!empty($this->data['Magazine']['044'])) { // Código del país de la entidad editora/productora.
				$conditions['Item.044 LIKE'] = '%' . $this->data['Magazine']['044'] . '%';
			}
			
			if (!empty($this->data['Magazine']['082'])) { // Número de la Clasificación Decimal Dewey.
				$conditions['Item.082 LIKE'] = '%' . $this->data['Magazine']['082'] . '%';
			}
				
			if (!empty($this->data['Magazine']['092'])) { // Clasificación local (COTA).
				$conditions['Item.092 LIKE'] = '%' . $this->data['Magazine']['092'] . '%';
			}
			
			if (!empty($this->data['Magazine']['100'])) { // Punto de acceso principal - Nombre de persona.
				$conditions['Item.100 LIKE'] = '%' . $this->data['Magazine']['100'] . '%';
			}
				
			if (!empty($this->data['Magazine']['110'])) { // Autor corporativo.
				$conditions['Item.110 LIKE'] = '%' . $this->data['Magazine']['110'] . '%';
			}
			
			if (!empty($this->data['Magazine']['130'])) { // Título uniforme (Punto de acceso).
				$conditions['Item.130 LIKE'] = '%' . $this->data['Magazine']['130'] . '%';
			}
			
			if (!empty($this->data['Magazine']['222'])) { // Título clave.
				$conditions['Item.222 LIKE'] = '%' . $this->data['Magazine']['222'] . '%';
			}
			
			if (!empty($this->data['Magazine']['240'])) { // Título uniforme.
				$conditions['Item.240 LIKE'] = '%' . $this->data['Magazine']['240'] . '%';
			}
			
			if (!empty($this->data['Magazine']['245'])) { // Mención de título.
				$conditions['Item.245 LIKE'] = '%' . $this->data['Magazine']['245'] . '%';
			}
			
			if (!empty($this->data['Magazine']['246'])) { // Variante de título.
				$conditions['Item.246 LIKE'] = '%' . $this->data['Magazine']['246'] . '%';
			}
			
			if (!empty($this->data['Magazine']['247'])) { // Título anterior.
				$conditions['Item.247 LIKE'] = '%' . $this->data['Magazine']['247'] . '%';
			}
			
			if (!empty($this->data['Magazine']['250'])) { // Mención de edición.
				$conditions['Item.250 LIKE'] = '%' . $this->data['Magazine']['250'] . '%';
			}
			
			if (!empty($this->data['Magazine']['260'])) { // Publicación, distribución, etc. (pie de imprenta).
				$conditions['Item.260 LIKE'] = '%' . $this->data['Magazine']['260'] . '%';
			}
			
			if (!empty($this->data['Magazine']['300'])) { // Descripción física.
				$conditions['Item.300 LIKE'] = '%' . $this->data['Magazine']['300'] . '%';
			}
			
			if (!empty($this->data['Magazine']['310'])) { // Periodicidad actual.
				$conditions['Item.310 LIKE'] = '%' . $this->data['Magazine']['310'] . '%';
			}
			
			if (!empty($this->data['Magazine']['321'])) { // Periodicidad anterior.
				$conditions['Item.321 LIKE'] = '%' . $this->data['Magazine']['321'] . '%';
			}
			
			if (!empty($this->data['Magazine']['362'])) { // Fechas de publicación y/o designación secuencial.
				$conditions['Item.362 LIKE'] = '%' . $this->data['Magazine']['362'] . '%';
			}
			
			if (!empty($this->data['Magazine']['380'])) { // Forma de la obra.
				$conditions['Item.380 LIKE'] = '%' . $this->data['Magazine']['380'] . '%';
			}
			
			if (!empty($this->data['Magazine']['500'])) { // Nota general.
				$conditions['Item.500 LIKE'] = '%' . $this->data['Magazine']['500'] . '%';
			}
			
			if (!empty($this->data['Magazine']['501'])) { // Nota de “Con”.
				$conditions['Item.501 LIKE'] = '%' . $this->data['Magazine']['501'] . '%';
			}
			
			if (!empty($this->data['Magazine']['505'])) { // Nota de contenido con formato.
				$conditions['Item.505 LIKE'] = '%' . $this->data['Magazine']['505'] . '%';
			}
			
			if (!empty($this->data['Magazine']['510'])) { // Nota de citas o referencias bibliográficas.
				$conditions['Item.510 LIKE'] = '%' . $this->data['Magazine']['510'] . '%';
			}
			
			if (!empty($this->data['Magazine']['515'])) { // Nota de peculiaridades de la numeración.
				$conditions['Item.515 LIKE'] = '%' . $this->data['Magazine']['515'] . '%';
			}
			
			if (!empty($this->data['Magazine']['520'])) { // Nota de sumario, etc.
				$conditions['Item.520 LIKE'] = '%' . $this->data['Magazine']['520'] . '%';
			}
			
			if (!empty($this->data['Magazine']['530'])) { // Nota de formato físico adicional disponible.
				$conditions['Item.530 LIKE'] = '%' . $this->data['Magazine']['530'] . '%';
			}
			
			if (!empty($this->data['Magazine']['534'])) { // Nota sobre la versión original.
				$conditions['Item.534 LIKE'] = '%' . $this->data['Magazine']['534'] . '%';
			}
			
			if (!empty($this->data['Magazine']['546'])) { // Nota de lengua.
				$conditions['Item.546 LIKE'] = '%' . $this->data['Magazine']['546'] . '%';
			}
			
			if (!empty($this->data['Magazine']['555'])) { // Nota de índice acumulativo u otros instrumentos bibliográficos.
				$conditions['Item.555 LIKE'] = '%' . $this->data['Magazine']['555'] . '%';
			}
			
			if (!empty($this->data['Magazine']['588'])) { // Nota de fuente de la descripción.
				$conditions['Item.588 LIKE'] = '%' . $this->data['Magazine']['588'] . '%';
			}
			
			if (!empty($this->data['Magazine']['600'])) { // Punto de acceso adicional de materia - Nombre de persona.
				$conditions['Item.600 LIKE'] = '%' . $this->data['Magazine']['600'] . '%';
			}
			
			if (!empty($this->data['Magazine']['610'])) { // Punto de acceso adicional de materia - Nombre de entidad corporativa.
				$conditions['Item.610 LIKE'] = '%' . $this->data['Magazine']['610'] . '%';
			}
			
			if (!empty($this->data['Magazine']['650'])) { // Punto de acceso adicional de materia – Término de materia.
				$conditions['Item.650 LIKE'] = '%' . $this->data['Magazine']['650'] . '%';
			}
			
			if (!empty($this->data['Magazine']['651'])) { // Punto de acceso adicional de materia - Nombre geográfico.
				$conditions['Item.651 LIKE'] = '%' . $this->data['Magazine']['651'] . '%';
			}
			
			if (!empty($this->data['Magazine']['653'])) { // Término de indización – No controlado.
				$conditions['Item.653 LIKE'] = '%' . $this->data['Magazine']['653'] . '%';
			}
			
			if (!empty($this->data['Magazine']['690'])) { // Siglo.
				$conditions['Item.690 LIKE'] = '%' . $this->data['Magazine']['690'] . '%';
			}
			
			if (!empty($this->data['Magazine']['700'])) { // Punto de acceso adicional - Nombre personal.
				$conditions['Item.700 LIKE'] = '%' . $this->data['Magazine']['700'] . '%';
			}
			
			if (!empty($this->data['Magazine']['710'])) { // Punto de acceso adicional - Nombre corporativo.
				$conditions['Item.710 LIKE'] = '%' . $this->data['Magazine']['710'] . '%';
			}
			
			if (!empty($this->data['Magazine']['740'])) { // Punto de acceso adicional - Título relacionado o analítico no controlado.
				$conditions['Item.740 LIKE'] = '%' . $this->data['Magazine']['740'] . '%';
			}
			
			if (!empty($this->data['Magazine']['773'])) { // Enlace al documento fuente.
				$conditions['Item.773 LIKE'] = '%' . $this->data['Magazine']['773'] . '%';
			}
			
			if (!empty($this->data['Magazine']['850'])) { // Institución que posee los fondos.
				$conditions['Item.850 LIKE'] = '%' . $this->data['Magazine']['850'] . '%';
			}
			
			if (!empty($this->data['Magazine']['852'])) { // Localización.
				$conditions['Item.852 LIKE'] = '%' . $this->data['Magazine']['852'] . '%';
			}
			
			if (!empty($this->data['Magazine']['856'])) { // Localización y acceso electrónicos.
				$conditions['Item.856 LIKE'] = '%' . $this->data['Magazine']['856'] . '%';
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
		//$a->setFilename('C:\xampp\htdocs\tesis\webroot\files\magazines\prueba.pdf');
		//$a->decodePDF();
		//echo utf8_encode($a->output());
		//die;
		
		$this->Item->recursive = 1;
		if (!$id) {
			$this->Session->setFlash(__('Obra inválida.', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('item', $this->Item->read(null, $id));
	}

	function tags($search = null) {
		$this->autoRender = false;
		$matters = $this->Item->find('list', array('fields' => array('653'), 'conditions' => array('Item.653 LIKE' => '%'. $search . '%')));

		$matters_list = "";
		foreach ($matters as $m):
			if ($m) {
				$m = $this->marc21_decode($m);
				$matters_list = $matters_list . "'" . $m['a'] . "',";
				// Se encierra entre asteriscos para poder pasar la cadena por set en la función add. En la vista se sustituiran por comillas.
			}
		endforeach;
		
		$matters_list = substr($matters_list, 0, strlen($matters_list)-1);
		
		return $matters_list;
	}
	
	function add() {
		App::import('Vendor', 'pdf2text');

		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Access restricted.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}

		if (!empty($this->data)) {
			$data = $this->data;			

			//debug($_FILES['data']['size']['Magazine']['item']); die;
			
			if ($_FILES['data']['error']['Magazine']['cover'] == 0){
				$this->Attachment->upload($this->data['Magazine'], 'cover');
			}

			if ($_FILES['data']['error']['Magazine']['item'] == 0){
				$this->Attachment->upload($this->data['Magazine'], 'item');
			}

			if ($_FILES['data']['error']['Magazine']['item'] == 0){
				$data['Magazine']['item_file_path'] = $this->data['Magazine']['item_file_path'];
				$data['Magazine']['item_content_type'] = $this->data['Magazine']['item_content_type'];
				$data['Magazine']['item_file_size'] = $this->data['Magazine']['item_file_size'];
				$data['Magazine']['item_file_name'] = $this->data['Magazine']['item_file_name'];
				$fileName = $data['Magazine']['item_file_path'];
			}

			if ($_FILES['data']['error']['Magazine']['cover'] == 0){
				$data['Magazine']['cover_path'] = $this->data['Magazine']['cover_file_path'];
				$data['Magazine']['cover_type'] = $this->data['Magazine']['cover_content_type'];
				$data['Magazine']['cover_size'] = $this->data['Magazine']['cover_file_size'];
				$data['Magazine']['cover_name'] = $this->data['Magazine']['cover_file_name'];
			}

			unset($data['Magazine']['cover']);
			unset($data['Magazine']['item']);
			$data['Item'] = $data['Magazine'];
			unset($data['Magazine']);

			$this->Item->create();
			if ($this->Item->save($data)) {
				$item = $this->Item->getLastInsertID();
				if(isset($fileName)){
					$this->ParsePdfToText($fileName, $item);
				}

				if ($_FILES['data']['error']['Magazine']['item'] == '1') {
					$this->Session->setFlash(__('El archivo o documento no pudo ser cargado, verifique si sobrepasa los '.ini_get('upload_max_filesize').' permitidos.', true));
					$this->redirect(array('action' => 'edit/' . $item));
				} else {
					$this->Session->setFlash(__('La hemerografía ha sido guardada.', true));
					$this->redirect(array('action' => 'view/' . $item));
				}
				
			} else {
				$this->Session->setFlash(__('La hemerografía no pudo ser guardada. Por favor, intentélo nuevamente.', true));
				$this->redirect(array('action' => 'add'));
			}
		}
		
		// ------------------------- Sub-Campo 100a ------------------------- //
		
		$authors = $this->Item->find('list', array('fields' => array('100')));
		
		if ($authors) {
			$list = array();
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
				if ($l == "") {
					$l = '{ value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				} else {
					$l = $l . ', { value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				}
			}
			
			$authors = "[" . $l . "]";
			$this->set(compact('authors', $authors));
		} else {
			$this->set(compact('authors', false));
		}
		
		// ------------------------- Sub-Campo 245a ------------------------- //
		
		$titles = $this->Item->find('list', array('fields' => array('245')));
		
		if ($titles) {
			$list = array();
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
				if ($l == "") {
					$l = '{ value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				} else {
					$l = $l . ', { value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				}
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
			$list = array();
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
				if ($l == "") {
					$l = '{ value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				} else {
					$l = $l . ', { value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				}
			}
			
			$publications = "[" . $l . "]";
			$this->set(compact('publications', $publications));
		} else {
			$this->set(compact('publications', false));
		}
		
		// ------------------------- Sub-Campo 653a ------------------------- //
		
		$matters = $this->Item->find('list', array('fields' => array('653')));
		
		if ($matters) {
			$list = array();
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
				if ($l == "") {
					$l = '{ value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				} else {
					$l = $l . ', { value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				}
			}
			
			$matters = "[" . $l . "]";
			$this->set(compact('matters', $matters));
		} else {
			$this->set(compact('matters', false));
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
		
			if ($_FILES['data']['error']['Magazine']['cover'] == 0){
				$item = $this->Item->find('first', array('conditions' => array('Item.id' => $data['Magazine']['id'])));
				$this->Attachment->delete_files($item['Item']['cover_path']); // Elimina el archivo anterior.
				$this->Attachment->upload($this->data['Magazine'], 'cover'); // Agrega el archivo nuevo.
			}

			if ($_FILES['data']['error']['Magazine']['item'] == 0){
				$item = $this->Item->find('first', array('conditions' => array('Item.id' => $data['Magazine']['id'])));
				$this->Attachment->delete_files($item['Item']['item_file_path']); // Elimina el archivo anterior.
				$this->Attachment->upload($this->data['Magazine'], 'item'); // Agrega el archivo nuevo.
			}

			if ($_FILES['data']['error']['Magazine']['item'] == 0){
				$data['Magazine']['item_file_path'] = $this->data['Magazine']['item_file_path'];
				$data['Magazine']['item_content_type'] = $this->data['Magazine']['item_content_type'];
				$data['Magazine']['item_file_size'] = $this->data['Magazine']['item_file_size'];
				$data['Magazine']['item_file_name'] = $this->data['Magazine']['item_file_name'];
				$fileName = $data['Magazine']['item_file_path'];
			}

			if ($_FILES['data']['error']['Magazine']['cover'] == 0){
				$data['Magazine']['cover_path'] = $this->data['Magazine']['cover_file_path'];
				$data['Magazine']['cover_type'] = $this->data['Magazine']['cover_content_type'];
				$data['Magazine']['cover_size'] = $this->data['Magazine']['cover_file_size'];
				$data['Magazine']['cover_name'] = $this->data['Magazine']['cover_file_name'];
			}

			unset($data['Magazine']['cover']);
			unset($data['Magazine']['item']);
			$data['Item'] = $data['Magazine'];
			unset($data['Magazine']);

			$this->Item->create();
			if ($this->Item->save($data)) {
				if(isset($fileName)){
					$this->ParsePdfToText($fileName, $id);
				}
				
				if ($_FILES['data']['error']['Magazine']['item'] == '1') {
					$this->Session->setFlash(__('El archivo o documento no pudo ser cargado, verifique si sobrepasa los '.ini_get('upload_max_filesize').' permitidos.', true));
					$this->redirect(array('action' => 'edit/' . $data['Item']['id']));
				} else {
					$this->Session->setFlash(__('La hemerografía ha sido modificada.', true));
					$this->redirect(array('action' => 'view/' . $data['Item']['id']));
				}
				
				$this->redirect(array('action' => 'view/' . $data['Item']['id']));
			} else {
				$this->Session->setFlash(__('La hemerografía no pudo ser modificada. Por favor, intentélo nuevamente.', true));
				$this->redirect(array('action' => 'edit/' . $data['Item']['id']));
			}
		}
		
		// ------------------------- Sub-Campo 100a ------------------------- //
		
		$authors = $this->Item->find('list', array('fields' => array('100')));
		
		if ($authors) {
			$list = array();
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
				if ($l == "") {
					$l = '{ value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				} else {
					$l = $l . ', { value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				}
			}
			
			$authors = "[" . $l . "]";
			$this->set(compact('authors', $authors));
		} else {
			$this->set(compact('authors', false));
		}
		
		// ------------------------- Sub-Campo 245a ------------------------- //
		
		$titles = $this->Item->find('list', array('fields' => array('245')));
		
		if ($titles) {
			$list = array();
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
				if ($l == "") {
					$l = '{ value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				} else {
					$l = $l . ', { value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				}
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
			$list = array();
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
				if ($l == "") {
					$l = '{ value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				} else {
					$l = $l . ', { value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				}
			}
			
			$publications = "[" . $l . "]";
			$this->set(compact('publications', $publications));
		} else {
			$this->set(compact('publications', false));
		}
		
		// ------------------------- Sub-Campo 653a ------------------------- //
		
		$matters = $this->Item->find('list', array('fields' => array('653')));
		
		if ($matters) {
			$list = array();
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
				if ($l == "") {
					$l = '{ value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				} else {
					$l = $l . ', { value: "' . htmlspecialchars($v) . '", data: "' . htmlspecialchars($v) . '" }';
				}
			}
			
			$matters = "[" . $l . "]";
			$this->set(compact('matters', $matters));
		} else {
			$this->set(compact('matters', false));
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id inválido para el item.', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$item = $this->Item->find('first', array('conditions' => array('Item.id' => $id)));

		if ($this->Item->delete($id)) {
			$this->Session->setFlash(__('Hemerografía eliminada.', true));
			$this->Attachment->delete_files($item['Item']['item_file_path']);
			$this->Attachment->delete_files($item['Item']['cover_path']);
			
			if (!isset($this->passedArgs[1])) {
				$this->redirect(array('action'=>'index'));
			} else {
				$this->redirect(array('action' => 'view', $this->passedArgs[1]));
			}
		}
		
		$this->Session->setFlash(__('La hemerografía no fue eliminada.', true));
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
}
