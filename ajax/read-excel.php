<?php

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

$objReader = new PHPExcel_Reader_Excel2007();

/* $objReader->setReadDataOnly(true);
$objPHPExcel = $objReader->load("test1.xlsx"); */
$targetFolder = 'CAMIRON-ROADMAP/uploads/';
$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
$file = $targetPath . $_GET['file'];
var_dump($file);// die;
$objReader->setLoadSheetsOnly( array("Feuil1", "My special sheet") );
$objPHPExcel = $objReader->load($file);

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

// echo "Condition 1<br />";
// echo $conditions[1] . "<br />";
// echo "Required actions : <br />";
// foreach($actions[1] as $a){
	// echo " - " . $a . "/ date : <br />";
// }
//var_dump($sheetData);
?>
<div class="contenttitle2">
	<h3>Content of the sheet</h3>
</div><!--contenttitle-->
<table cellpadding="0" cellspacing="0" border="0" class="stdtable" style="width : 200%">
	
	<thead>
		<tr><?php
		foreach($sheetData[4] as $k => $head) { 
			if($k == 'I') {
				echo '<th colspan="2" style="width : 200px" class="head0">' . $head . '<br />Camiron / State' . '</th>';
			} elseif($k == 'J') {
			} else {
				echo '<th style="width : 150px" class="head0">' . $head . '</th>';
			 }
		}?>
		</tr>
	</thead>
	
	<tbody>
	<?php
		$i = 0;
		for($i = 6; $i <= 10; $i++) {
			
		?>
		<tr>
		<?php foreach($sheetData[$i] as $k => $s) { ?>
			<td><?php
			if($s == '' && $k != 'J')
				if($sheetData[$i-1][$k] == '')
					echo $sheetData[$i-2][$k];
				else
					echo $sheetData[$i-1][$k];
			else
				echo $s 
			
			?></td>
		<?php } ?>
		</tr>
		<?php if(!isset($sheetData[$i+1])) break;
		} ?>
	</tbody>
</table>

<br />