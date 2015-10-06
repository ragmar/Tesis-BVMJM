<?php
class PdfToTextController extends AppController {
	
	var $name = 'PdfToText';
// 	var $name = 'Configurations';
	var $components = array (
			'RequestHandler',
	);
	var $uses = array (
			'Item',
			'Search'
	);
	var $helpers = array(
			'Javascript', 
			'Ajax'
	);
	
	function index() {
		App::import('Vendor', 'pdf2text');

		//Get convertered files
		if(isset($_POST)){
			$countConvertedFiles = $_POST['countConvertedFiles'];
			
		}else{
			$countConvertedFiles = 0;
		}
		
		// Get unconverted pdf file
		$filenamePdf = $this->Item->find('first', array('fields' => array('Item.id','Item.item_file_path'), 'conditions' => array('Item.converted' => 0, 'AND' => array('Item.item_file_path LIKE' => "%pdf"))));
		

		if($filenamePdf != NULL){
			// Get PDF Path
			$filePath = "../webroot/files/".$filenamePdf['Item']['item_file_path'];

			// Check if pdf file exists
			$infile = @file_get_contents($filePath, FILE_BINARY);

			if(empty($infile)){
				// Get PDF Path
				$filePath = "../webroot/attachments/files/".$filenamePdf['Item']['item_file_path'];
				
				// Check if pdf file exists
				$infile = @file_get_contents($filePath, FILE_BINARY);
			}

			// Update item on database
			$this->Item->updateAll(array('Item.converted' => 1),array('Item.id' => $filenamePdf['Item']['id']));
				
			if(!empty($infile)){
				// Converted file
				$this->ParsePdfToText($filenamePdf['Item']['item_file_path'], $filenamePdf['Item']['id']);			
			}
			
			// One more convertered
			$countConvertedFiles++;	
		}
		// Send ajax response
		$this->autoRender = false;
		echo json_encode($countConvertedFiles);
	}
}