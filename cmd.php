<?php
include 'ajax/Classes/PHPExcel.php';


//$objWriter = new PHPExcel_Writer_Excel2007();

$objPHPExcel = new PHPExcel;
// set default font
$objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
// set default font size
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
// create the writer
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");

/**
 * Define currency and number format.
 */
// currency format, € with < 0 being in red color
$currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';
// number format, with thousands separator and two decimal points.
$numberFormat = '#,#0.##;[Red]-#,#0.##';

// writer already created the first sheet for us, let's get it
$objSheet = $objPHPExcel->getActiveSheet();
// rename the sheet
require_once 'config.php';
require_once 'lib/library.php';
require_once 'camertic/classes/bd.class.php';
require_once 'lib/classes/entity.class.php';
require_once 'lib/classes/tasks.class.php';
switch($_GET['data']) {
	case 'my-conditions' : $title = 'My tasks on Conditions'; $t = new tasks(); $datum = $t->getMyConditionsTasks(); break;

}
// echo "<pre>";
// var_dump($datum); die;
$objSheet->setTitle($title);

// let's bold and size the header font and write the header
// as you can see, we can specify a range of cells, like here
$objSheet->getStyle('A4:N4')->getFont()->setBold(true)->setSize(12);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);

$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);

// write header
$objSheet->getCell('A4')->setValue('Conditions Precedents to be satisfied');
$objSheet->getCell('B4')->setValue('Required actions or operation');
$objSheet->getCell('C4')->setValue('Date for compliance (time frame, deadline)');
$objSheet->getCell('D4')->setValue('Party accountable for compliance');
$objSheet->getCell('E4')->setValue('Party accountable for compliance');
$objSheet->getCell('F4')->setValue('Person in charge of action (CamIron/Sundance)');
$objSheet->getCell('G4')->setValue('Due date for action');
$objSheet->getCell('H4')->setValue('Authority accountable for compliance (State)');
$objSheet->getCell('I4')->setValue('Status');
$objSheet->getCell('J4')->setValue('CamIron Input (information and documents required for compliance)');
$objSheet->getCell('K4')->setValue('CamIron Input (information and documents required for compliance)');
$objSheet->getCell('L4')->setValue('Output (deliverable resulting from compliance)');
$objSheet->getCell('M4')->setValue('Output (deliverable resulting from compliance)');
$objSheet->getCell('N4')->setValue('Risk/sanction');
$objSheet->getCell('O4')->setValue('Risk/sanction');
$i = 5;
foreach($datum as $d) {
	$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(-1);
	$objSheet->getCell("A$i")->setValue($d->cond_cat_title);
	$objPHPExcel->getActiveSheet()->getStyle("A$i")->getAlignment()->setWrapText(true);
	$objSheet->getCell("B$i")->setValue($d->required_action);
	$objSheet->getCell("C$i")->setValue($d->deadline);
	// $objSheet->getCell('D4')->setValue('Party accountable for compliance');
	// $objSheet->getCell('E4')->setValue('Party accountable for compliance');
	// $objSheet->getCell('F4')->setValue('Person in charge of action (CamIron/Sundance)');
	// $objSheet->getCell('G4')->setValue('Due date for action');
	// $objSheet->getCell('H4')->setValue('Authority accountable for compliance (State)');
	// $objSheet->getCell('I4')->setValue('Status');
	// $objSheet->getCell('J4')->setValue('CamIron Input (information and documents required for compliance)');
	// $objSheet->getCell('K4')->setValue('CamIron Input (information and documents required for compliance)');
	// $objSheet->getCell('L4')->setValue('Output (deliverable resulting from compliance)');
	// $objSheet->getCell('M4')->setValue('Output (deliverable resulting from compliance)');
	// $objSheet->getCell('N4')->setValue('Risk/sanction');
	// $objSheet->getCell('O4')->setValue('Risk/sanction');
	$i++;
}
// we could get this data from database, but for simplicty, let's just write it


// bold and resize the font of the last row
// $objSheet->getStyle('A5:D5')->getFont()->setBold(true)->setSize(12);

// set number and currency format to columns
// $objSheet->getStyle('B2:B5')->getNumberFormat()->setFormatCode($numberFormat);
// $objSheet->getStyle('C2:D5')->getNumberFormat()->setFormatCode($currencyFormat);

// create some borders
// first, create the whole grid around the table
// $objSheet->getStyle('A1:D5')->getBorders()->
// getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
// create medium border around the table
// $objSheet->getStyle('A1:D5')->getBorders()->
// getOutline()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
// create a double border above total line
// $objSheet->getStyle('A5:D5')->getBorders()->
// getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_DOUBLE);
// create a medium border on the header line
// $objSheet->getStyle('A1:D1')->getBorders()->
// getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);

// autosize the columns
// $objSheet->getColumnDimension('A')->setAutoSize(true);
// $objSheet->getColumnDimension('B')->setAutoSize(true);
// $objSheet->getColumnDimension('C')->setAutoSize(true);
// $objSheet->getColumnDimension('D')->setAutoSize(true);

// write the file
$filetitle = str_replace(" ", "-", $title) . '.xlsx';
$fichier = "exports" . DIRECTORY_SEPARATOR . $filetitle;
$objWriter->save($fichier);
include("downloadfileclass.inc.php");

$downloadfile = new DOWNLOADFILE($fichier, "application/xlsx");
// var_dump($fichier);
// die;
if (!$downloadfile->df_download()) 
	echo "Sorry, we are experiencing technical difficulties downloading this file. Please report this error to Technical Support.";

?>