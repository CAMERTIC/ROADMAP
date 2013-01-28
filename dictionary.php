<?php

//// DICTIONNAIRE DE L'APPLI

global $dic;

$dico = new dico;
$defs = $dico->getAllRecords();
// echo "<pre>";
// foreach($defs as $d)
	// var_dump($d->definition);
// die;
foreach($defs as $def) {
	//if(strlen(trim($def->expression)) < 8)
	$dic[trim($def->expression)] = trim($def->definition);
}
unset($dic['Project']);
unset($dic['Conservation Convention']);
unset($dic['Emission Scheme']);
 unset($dic['Project Company']);
// unset($dic['Project Economic Model']);
//unset($dic['Parties']);
// unset($dic['Equity']);
//unset($dic['Debt']);
// unset($dic['Specification(s)']);
// unset($dic['Treasury Agreement']);
 unset($dic['Dispute']);
?>