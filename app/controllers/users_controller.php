                                <?php
class UsersController extends AppController {

	var $name = 'Users';

	function beforeFilter(){
		parent::beforeFilter();
		// Acciones permitidas sin loguearse.
		$this->Auth->allow(
				'login',
				'logout',
				'register',
				'reset'
		);
		$this->Auth->autoRedirect = false; // Evita redireccionar para realizar las instrucciones dentro de login().
	}
	
	function login() {
		if(!(empty($this->data)) && $this->Auth->user()) {
			$this->User->id = $this->Auth->user('id');
				
			// Ultima visita.
			$this->User->saveField('last_login', date('Y-m-d H:i:s'));

			if (($this->Session->read('Auth.User.group_id') == '1') || ($this->Session->read('Auth.User.group_id') == '2')) {
				$this->redirect(array('controller' => 'configurations'));
			}
			
			//Redireccion definida en el AppController.
			$this->redirect($this->Auth->redirect());
		}
	}
	
	function logout() {
		$this->redirect($this->Auth->logout());
	}
	
	function reset() {
		if ($this->data) {
			//debug($this->data); die;
			// Se debe enviar un correo con el enlace para cambiar la contrase単a y dar el mensaje.
			
			$this->Session->setFlash(__('Se le ha enviado un correo con el enlace para restablecer su contraseña.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
	}
	
	function index() {
		if ($this->Session->read('Auth.User.group_id') != '1'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if ($this->Session->read('Auth.User.group_id') != '1'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$country = $this->User->Country->find('list', array('conditions' => array('Country.id' => $this->Session->read('Auth.User.country_id'))));
		$this->set('user', $this->User->read(null, $id));
		$this->set('country', $country[$this->Session->read('Auth.User.country_id')]);
	}

	function register() {
		if (!empty($this->data)) {
			$this->Auth->logout();
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->User->saveField('group_id', '3');
				$this->User->saveField('last_login', date('Y-m-d H:i:s'));
				$this->Session->setFlash(__('Gracias por registrarse.', true));
				$this->Auth->login($this->data);
				$this->redirect(array('controller' => 'pages', 'action' => 'home'));
			} else {
				$this->Session->setFlash(__('Hubo un error a realizar el registro. Por favor, intentelo nuevamente.', true));
			}
		}
		$groups = $this->User->Group->find('list');
		$profiles = $this->User->Profile->find('list');
		$countries = $this->User->Country->find('list');
		$this->set(compact('groups', 'profiles', 'countries'));
	}

	function edit() {
		$id = $this->Session->read('Auth.User.id');
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('Perfil de usuario actualizado.', true));
				if ($this->Session->read('Auth.User.group_id') == '1') {
					$this->redirect(array('action' => 'index'));
				} else {
					$this->redirect(array('controller' => 'pages', 'action' => 'home'));
				}
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$profiles = $this->User->Profile->find('list');
		$countries = $this->User->Country->find('list');
		$this->set(compact('groups', 'profiles', 'countries'));
	}

	function delete($id = null) {
		if ($this->Session->read('Auth.User.group_id') != '1'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('Usuario eliminado.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('El usuario no fue eliminado.', true));
		$this->redirect(array('action' => 'index'));
	}
}

                            