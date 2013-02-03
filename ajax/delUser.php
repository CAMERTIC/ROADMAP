<?php 
@session_start();
require_once '../config.php';
require_once '../lib/library.php';
require_once '../camertic/classes/bd.class.php';
require_once '../lib/classes/entity.class.php';
require_once '../lib/classes/rc_users.class.php';

$C = new CamerticConfig;
$p = new rc_users; 

try {	
	$p->delRecord($_POST);
	// think to delete associate comments
} catch (Exception $e) {
	echo 'Error message : ' . $e->getMessage() . "\n";
}
?>