<?php
	if(isset($_GET['layout'])) {
		$file =  '.' . DS . 'views' . DS . $_GET['view'] . '.' . $_GET['layout'] . '.php';
		include $file; 
	}
?>
