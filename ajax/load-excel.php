<?php
// function CamironDateToMysqlDate($date) {
	// $data = explode(",", $date);
	// $y = $data[1];
	// $data = explode(" ", $data[0]);
	// $d = $data[1];
	// switch($data[0]) {
		// case 'January' : $m = '01'; break;
		// case 'February' : $m = '02'; break;
		// case 'March' : $m = '03'; break;
		// case 'April' : $m = '04'; break;
		// case 'May' : $m = '05'; break;
		// case 'June' : $m = '06'; break;
		// case 'July' : $m = '07'; break;
		// case 'August' : $m = '08'; break;
		// case 'September' : $m = '09'; break;
		// case 'October' : $m = '10'; break;
		// case 'November' : $m = '11'; break;
		// case 'Demcember' : $m = '12'; break;
		// default : 'January';
	// }
	// return "$y-$m-$d";
// }
include 'Classes/PHPExcel.php';

$objReader = new PHPExcel_Reader_Excel2007();

$file = $_POST['file'];

$objReader->setLoadSheetsOnly( array("Feuil1", "My special sheet") );
$objPHPExcel = $objReader->load($file);

$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

//var_dump($sheetData);

require_once '../config.php';
require_once '../lib/library.php';
require_once '../camertic/classes/bd.class.php';
require_once '../lib/classes/entity.class.php';
require_once '../lib/classes/tasks.class.php';

$C = new CamerticConfig;
$p = new tasks; 
// try {
	// $p->saveRecord($_POST);
// } catch (Exception $e) {
	// echo 'Error message : ' . $e->getMessage() . "\n";
// }	
	
for($i = 6; $i <= count($sheetData)+5; $i++) {
	$task = array(); // nouvelle tache
	foreach($sheetData[$i] as $k => $s) {
		
		$valeur = '';
		$valeur_c = '';
		if($s == '' && $k != 'J') {
				$sheetData[$i][$k] = $sheetData[$i-1][$k];
				echo $sheetData[$i][$k];
		} else {
			$cmt = $objPHPExcel->getActiveSheet()->getComment("$k$i")->getText()->getPlainText();
			if($cmt != '') {
				$valeur_c = $cmt;
			} else {
				
			}
			$valeur = $s;
		}
		if($valeur == '') $valeur = $sheetData[$i-1][$k];
		
		if($k == 'A') $task['cond_cat_title'] = addslashes($valeur);
		if($k == 'A') $task['cond_cat_title_c'] = addslashes($valeur_c);
		if($k == 'B') $task['required_action'] = addslashes($valeur);
		if($k == 'B') $task['required_action_c'] = addslashes($valeur_c);
		if($k == 'C') {
			if($task['type']=='contructions' || $task['type']=='exploitations')
				$task['deadline_text'] = $valeur;
			else
				$task['deadline'] = CamironDateToMysqlDate($valeur);
		}
		if($k == 'C') $task['deadline_c'] = addslashes($valeur_c);
		if($k == 'D') $task['party_accountable'] = addslashes($valeur);
		if($k == 'D') $task['party_accountable_c'] = addslashes($valeur_c);
		if($k == 'E') $task['person_in_charge'] = '';
		if($k == 'E') $task['person_in_charge_c'] = '';
		if($k == 'F') {
			$task['due_date'] = CamironDateToMysqlDate($valeur);
		}
		if($k == 'F') $task['due_date_c'] = '';//addslashes($valeur_c);
		if($k == 'G') $task['authority_accountable'] = addslashes($valeur);
		if($k == 'G') $task['authority_accountable_c'] = addslashes($valeur_c);
		if($k == 'H') $task['status'] = '';
		if($k == 'H') $task['status_c'] = addslashes($valeur_c);
		if($k == 'I') $task['input_camiron'] = addslashes($valeur);
		if($k == 'I') $task['input_camiron_c'] = addslashes($valeur_c);
		if($k == 'J') $task['input_state'] = addslashes($valeur);
		if($k == 'J') $task['input_state_c'] = addslashes($valeur_c);
		if($k == 'K') $task['output'] = addslashes($valeur);
		if($k == 'K') $task['output_c'] = addslashes($valeur_c);

		if($k == 'L') $task['risk_sanction'] = addslashes($valeur);
		if($k == 'L') $task['risk_sanction_c'] = addslashes($valeur_c);
		$task['type'] = $_POST['type'];
		// if($task['type']=='contructions')
			// $task['sector'] == $cond_cat_title;
	} 
	//var_dump($task);
	try {
		$p->saveRecord($task);
	} catch (Exception $e) {
		echo 'Error message : ' . $e->getMessage() . "\n";
	}
	if(!isset($sheetData[$i+1])) break;
}