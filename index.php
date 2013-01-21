<?php
@session_start();
require_once 'config.php';
$C = new CamerticConfig;
$app = new camiron;
 
if($app->checkSession())
	$app->sendToDash();
else
	header('location:index.html');
?>