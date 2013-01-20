<?php

include '../Classes/PHPExcel.php';

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

$objReader = new PHPExcel_Reader_Excel2007();

/* $objReader->setReadDataOnly(true);
$objPHPExcel = $objReader->load("test1.xlsx"); */

$objReader->setLoadSheetsOnly( array("Feuil1", "My special sheet") );
$objPHPExcel = $objReader->load("test1.xlsx");

//$sheet = $objPHPExcel->getActiveSheet();

$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

// getting conditions
$conditions = array();
$i = 1;
foreach($sheetData as $k => $s) {
	if($k > 5) {
	
		if($s['A'] != '' && !is_null($s['A'])) {
			$conditions[$i] = $s['A'];
			$conditions["comment_c$i"] = $objPHPExcel->getActiveSheet()->getComment("A$k")->getText()->getPlainText();$i++;
		}
	}
	
}

// getting actions
$actions = array();
$i = 1;
foreach($sheetData as $k => $s) {
	if($k > 5) {
		if($k > 6 && $s['A'] != '')
			$i++;
		
		$actions[$i][] = $s['B'];
	}
}

// getting date
$datecompliance = array();
$i = 1;
$lastvalue = "";
foreach($sheetData as $k => $s) {
	if($k > 5) {
		if($k > 6 && $s['A'] != ''){
			$i++;
		}
		if($s['C'] == '')
			$datecompliance[$i][] = $lastvalue;
		else {
			$lastvalue = $datecompliance[$i][] = $s['C'];
		}
	}
}

// getting datedu
$datecompliancedue = array();
$i = 1;
$lastvalue = "";
foreach($sheetData as $k => $s) {
	if($k > 5) {
		if($k > 6 && $s['A'] != '') {
			$lastvalue = '';
			$i++;
		}
		if($s['F'] == '')
			$datecompliancedue[$i][] = $lastvalue;
		else {
			$lastvalue = $datecompliancedue[$i][] = $s['F'];
			
		}
	}
}

echo "Conditions<br />";
var_dump($conditions);
echo "Required Actions or Task<br />";
var_dump($actions);
echo "Date Compliance<br />";
var_dump($datecompliance);
echo "Due Date<br />";
var_dump($datecompliancedue);

echo "Condition 1<br />";
echo $conditions[1] . "<br />";
echo "Required actions : <br />";
foreach($actions[1] as $a){
	echo " - " . $a . "/ date : <br />";
}
//var_dump($sheetData);


?>