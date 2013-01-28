<?php 
@session_start();
require_once '../config.php';
require_once '../lib/library.php';
require_once '../camertic/classes/bd.class.php';
require_once '../lib/classes/entity.class.php';
require_once '../lib/classes/tasks.class.php';
require_once '../lib/classes/comment.class.php';

$C = new CamerticConfig;
$p = new tasks; 
if(isset($_POST['deadline_a'])) {
	$_POST['deadline'] = $_POST['deadline_a'] . '-' . $_POST['deadline_m'] . '-' . $_POST['deadline_j'];
	unset($_POST['deadline_a']); 
	unset($_POST['deadline_m']); 
	unset($_POST['deadline_j']); 
}
if(isset($_POST['due_date_a'])) {
	$_POST['due_date'] = $_POST['due_date_a'] . '-' . $_POST['due_date_m'] . '-' . $_POST['due_date_j'];
	unset($_POST['due_date_a']); 
	unset($_POST['due_date_j']); 
	unset($_POST['due_date_m']); 
}
//var_dump($_POST);
try {
	if(isset($_POST['is_assigned_to']))
		$_POST['person_in_charge'] = $_POST['is_assigned_to'];
	$p->saveRecord($_POST);
	if($_POST['comment'] != '') {
		$cmt = new comment($_POST['id']);
		$cmt->setComment(addslashes($_POST['comment']));
		
	}
} catch (Exception $e) {
	echo 'Error message : ' . $e->getMessage() . "\n";
}
?>