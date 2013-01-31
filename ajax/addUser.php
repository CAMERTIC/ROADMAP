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
	if(isset($_POST['action'])) {
		unset($_POST['action']);
		$p->saveRecord($_POST);
	} else
		$p->newRecord($_POST);
} catch (Exception $e) {
	echo 'Error message : ' . $e->getMessage() . "\n";
}
?>