<?php
class ConfigurationsController extends AppController {

	var $name = 'Configurations';
	var $uses = array (
			'Item'
	);

	function beforeFilter(){
		parent::beforeFilter();
	
		//debug($this->Session->read('Auth.User.group_id')); die;
		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
	}
	
	function index() {

		// Get unconverted pdf file
		$countPdfFiles = $this->Item->find('count', array('fields' => 'Item.id', 'conditions' => array('Item.converted' => 0, 'AND' => array('Item.item_file_path LIKE' => "%pdf"))));

		$this->set('countPdfFiles', $countPdfFiles);
	}
	
	function help(){
		
	}
	function sitebackup () {
		$this->autoRender = false;
		
		if ((!$this->Session->check('Auth.User')) || ($this->Session->read('Auth.User.group_id') != 1)) {
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
		//$dir = '/home/guzman6001/Dropbox/atesis/app/backups';
		$dir = $_SERVER['HTTP_HOST'] . $this->base . "/app/";
		//$dir = "C:".DS."Program Files (x86)".DS."Apache Software Foundation".DS."Apache2.2".DS."htdocs".DS."tesis".DS."webroot".DS."backups".DS;
		
		$respaldar = $_SERVER['HTTP_HOST']. $this->base . "/app/webroot/backups/";
		//$respaldar = $_SERVER['HTTP_HOST'] . $this->base.DS.'app'.DS.'webroot'.DS.'backups'.DS;
		//$respaldar = "C:".DS."Program Files (x86)".DS."Apache Software Foundation".DS."Apache2.2".DS."htdocs".DS."tesis".DS."webroot".DS."backups".DS;
		
		// Directory to backup.
		$filename = 'bvmjm' . date("_Y_m_d_H_i_s") . '.tar'; //path to where the file will be saved.
		$C_RUTA_ARCHIVO = $dir . $filename;
		
		//ejecutamos
		//if (!function_exists('shell_exec'))	{
		//	$this->Session->setFlash(__('No está habilitada la función PHP shell_exec en el servidor.', true));
		//} else {
			if(!shell_exec("tar cvf $C_RUTA_ARCHIVO $respaldar")) {
				//$this->Session->setFlash(__('No se pudo comprimir el respaldo, por favor verifique que está instalado TAR.', true));
				echo "<div style='border: solid #803C00; border-style: !important;'>No se pudo comprimir el respaldo, por favor verifique que está instalado .tar.</div>";
			} else {
				//$this->Session->setFlash(__('Respaldo creado con éxito.', true));
				echo "<div style='border: solid #803C00; border-style: !important;'>Respaldo creado con éxito. <br /><a href='".$C_RUTA_ARCHIVO."' target='_new'>Abrir</a></div>";
			}
		//}
		
		//$this->set('path', $C_RUTA_ARCHIVO);
		//$this->redirect(array('action' => 'index'));
	}
	
	function dbbackup() {
		$this->autoRender = false;
		
		if ((!$this->Session->check('Auth.User')) || ($this->Session->read('Auth.User.group_id') != 1)) {
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}

		//Directorio
		//$dir = $_SERVER['HTTP_HOST'] . $this->base.DS.'webroot'.DS.'backups'.DS;
		$dir = $this->base . "/html/app/webroot/backups";
		
		//Servidor MySql
		$C_SERVER = 'localhost';
	
		//Base de datos
		$C_BASE_DATOS = 'bvmjm';
		//$C_BASE_DATOS = 'ofeliast_tesis';
	
		//Usuario y contraseña de la base de datos mysql
		$C_USUARIO = 'bvmjm';
		//$C_USUARIO = 'ofeliast_tesis';
		$C_CONTRASENA = 't2kf3w7d3i';
		//$C_CONTRASENA = '7z4gyhf18)Dc';
		
		//Ruta archivo de salida
		//(el nombre lo componemos con Y_m_d_H_i_s para que sea diferente en cada backup)
		$C_RUTA_NAME = 'backup_' . date("Y_m_d_H_i_s") . '.sql';
		$C_RUTA_URL = $this->base . "/webroot/backups/" . $C_RUTA_NAME;
		$C_RUTA_ARCHIVO = $dir . $C_RUTA_NAME;
		
		//Si vamos a comprimirlo ...
		//$C_COMPRIMIR_MYSQL = 'true';
		
		$command = "mysqldump --opt --host=$C_SERVER --user=$C_USUARIO --password=$C_CONTRASENA $C_BASE_DATOS > \"$C_RUTA_ARCHIVO\"";

		//Ejecutamos
		if (!function_exists('shell_exec'))	{
			//$this->Session->setFlash(__('No está habilitada la función PHP shell_exec en el servidor.', true));
			echo "<div style='border: solid #803C00; border-style: !important;'>No está habilitada la función PHP shell_exec en el servidor.</div>";
		} else {
			//if(!system($command)){
				//$this->Session->setFlash(__('No se pudo ejecutar mysqldump, por favor verifique que está instalado en el servidor.', true));
				//echo 'No se pudo ejecutar mysqldump, por favor verifique que está instalado en el servidor.<br>';
				//echo system($command);
			//} else {
				//$this->Session->setFlash(__("Respaldo creado con éxito. <a href='".$C_RUTA_ARCHIVO."'></a>", true));
				echo "<div style='border: solid #803C00; border-style: !important;'>Respaldo creado con éxito. <br /><a href='".$C_RUTA_URL."' target='_new'>Abrir</a></div>";
			//}
			
			$output = shell_exec($command);
			
			// Write to the log file
			/*
			if (preg_match('/Got error/', $output))	{
				$this->Session->setFlash(__('No se pudo ejecutar mysqldump, por favor verifique que está instalado en el servidor.', true));
			} else {
				$this->Session->setFlash(__("Respaldo creado con éxito. <a href='".$C_RUTA_ARCHIVO."'></a>", true));
			}*/
		}
		
		//$this->render('index');
		//$this->set('ruta', $C_RUTA_ARCHIVO);
		//$this->redirect(array('action' => 'index'));
	}
}
?>