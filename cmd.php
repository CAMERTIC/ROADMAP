<?php
include 'ajax/Classes/PHPExcel.php';

//$objWriter = new PHPExcel_Writer_Excel2007();

$objPHPExcel = new PHPExcel;
// set default font
$objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
// set default font size
$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);
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
//$objSheet->setTitle('My sales report');

// let's bold and size the header font and write the header
// as you can see, we can specify a range of cells, like here: cells from A1 to A4
//$objSheet->getStyle('A1:D1')->getFont()->setBold(true)->setSize(12);

// write header
// $objSheet->getCell('A1')->setValue('Product');
// $objSheet->getCell('B1')->setValue('Quanity');
// $objSheet->getCell('C1')->setValue('Price');
// $objSheet->getCell('D1')->setValue('Total Price');

// we could get this data from database, but for simplicty, let's just write it
// $objSheet->getCell('A2')->setValue('Motherboard');
// $objSheet->getCell('B2')->setValue(10);
// $objSheet->getCell('C2')->setValue(5);
// $objSheet->getCell('D2')->setValue('=B2*C2');

// $objSheet->getCell('A3')->setValue('Processor');
// $objSheet->getCell('B3')->setValue(6);
// $objSheet->getCell('C3')->setValue(3);
// $objSheet->getCell('D3')->setValue('=B3*C3');

// $objSheet->getCell('A4')->setValue('Memory');
// $objSheet->getCell('B4')->setValue(10);
// $objSheet->getCell('C4')->setValue(2.5);
// $objSheet->getCell('D4')->setValue('=B4*C4');

// $objSheet->getCell('A5')->setValue('TOTAL');
// $objSheet->getCell('B5')->setValue('=SUM(B2:B4)');
// $objSheet->getCell('C5')->setValue('-');
// $objSheet->getCell('D5')->setValue('=SUM(D2:D4)');

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
//$objWriter->save('test.xlsx');

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
?>