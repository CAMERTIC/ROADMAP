<?php 
require_once 'config.php';
require_once 'lib/library.php';
require_once 'camertic/classes/bd.class.php';
require_once 'lib/classes/entity.class.php';
require_once 'lib/classes/tasks.class.php';
	$t = new tasks();
	$data = null;
	if(isset($_GET['data'])) {
		
		switch($_GET['data']) {
			case 'my-conditions' : $data = $t->getMyConditionsTasks(); break;
		}
	}
	// inclusion des fichiers de la librairie excel
	include 'Classes/PHPExcel.php';

// $inputFileType = 'Excel5';
// $inputFileName = 'test.xls';

// $objPHPExcelReader = PHPExcel_IOFactory::createReader($inputFileType);
// $objPHPExcel = $objPHPExcelReader->load($inputFileName);

// $sheet = $objPHPExcel->getActiveSheet();



// $comments = $sheet->getComments();

// var_dump($comments);
// foreach($comments  as $cellID => $comment) {
    // echo $cellID,PHP_EOL;
    // var_dump($comment->getText()->getPlainText());
//}

$objWriter = new PHPExcel_Writer_Excel2007();
	//include 'PHPExcel/Writer/Excel2007.php';
	//include 'ajax/Classes/PHPExcel/Writer/Excel2007.php';
	//include 'PHPExcel/Shared/String.php';
	
	// instanciation de lobjet
	//$workbook = new PHPExcel;
	
	// activation sur la feuille de travail
	//$sheet = $workbook->getActiveSheet();
	
	//$sheet->setCellValue('A1','MaitrePylos');
	//$sheet->setCellValueByColumnAndRow(1, 4, 'MaitrePylos');
	
	// instanciation d'un objet decriture
	//$writer = new PHPExcel_Writer_Excel2007($workbook);
	
	
	// nommage et enregistrement du fichier
	//$records = './exports/fichier.xlsx';
	//$writer->save($records);
	
	//var_dump($data); die;