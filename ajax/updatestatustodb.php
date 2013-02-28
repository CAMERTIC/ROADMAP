<?php 
@session_start();
require_once '../config.php';
require_once '../lib/library.php';
require_once '../camertic/classes/bd.class.php';
require_once '../lib/classes/entity.class.php';
require_once '../lib/classes/tasks.class.php';

require_once '../lib/classes/rc_users.class.php';
require_once '../lib/classes/comment.class.php';

$C = new CamerticConfig;
$p = new tasks; 
if(isset($_POST['cpc']))
	unset($_POST['cpc']);
	
	
	
	
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
		$_POST['acountable_pers_task'] = $_POST['is_assigned_to'];
	$p->saveRecord($_POST);
	
} catch (Exception $e) {
	echo 'Error message : ' . $e->getMessage() . "\n";
}



if($_POST['comment'] != '') {
$u = new rc_users;
$pc = $u->getUserDetails($_POST['person_in_charge']);
	$cmt = new comment($_POST['id']);
	$msg = 'ROADMAP CONVENTION MESSAGE \n';
	$msg .= "Hi $pc->noms, \n";
	$msg .= $_SESSION['u']['nom'] . " has assigned you a task to deliver on the " . $_POST['due_date'] . ", \n";
	$msg .= "Below his/her comment : \n";
	$msg .= $_POST['comment'] . "\n";
	$msg .= "Thanks";
	@mail($pc->email, '[ROADMAP] You have been assigned a task', $msg);
	$msg = 'ROADMAP CONVENTION TASK ASSIGNMENT \n';
	$msg .= "Hi ".$_SESSION['u']['nom'].", \n";
	$msg .= $pc->noms . " has been assigned the last task you updated. \n";
	$msg .= "This is your comment : \n";
	$msg .= $_POST['comment'] . "\n";
	$msg .= "The new due date : \n";
	$msg .= $_POST['due_date'] . "\n";
	$msg .= "The new person in charge received your comment. Thanks";
	
	$cmt->setComment(addslashes($_POST['comment']));
	@mail($_SESSION['u']['email'], "[ROADMAP] The task has been assigned to $pc->noms!", $msg);
}
?>