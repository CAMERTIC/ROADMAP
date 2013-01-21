<?php
@session_start();


if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['login']) && !empty($_POST['pw'])) {
	//require_once('_connect_.php');
	require_once('../config.php');
	require_once('../camertic/classes/bd.class.php');
	require_once('../lib/classes/entity.class.php');
	require_once('../lib/classes/rc_users.class.php');
	$clean = array();
	$mysql = array();
	
	$now = time();
	$max = $now - 15;
	
	$camertic = new CamerticConfig('../lib/library.php');
	
	$user = new rc_users;//var_dump(session_id()); die();
	//;
	
	if($user->login($_POST['login'], $_POST['pw'])) {
		//
		echo "true";
	}
	else {
		//$badattempt = true;
		echo "false";
	}
	
}
?>