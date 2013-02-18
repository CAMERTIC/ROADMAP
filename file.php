<?php
// This is an example of PHP script using DOWNLOADFILE class.
// On any page you need to create a link to this script.
// By pressing on this link you will automatically get a dialog box to download the "filename.ext" file.
@session_start();
include("downloadfileclass.inc.php");

$fichier = "exports" . DIRECTORY_SEPARATOR . $_SESSION['file'] . ".xml";

$downloadfile = new DOWNLOADFILE($fichier, "application/xml");
// var_dump($fichier);
// die;
if (!$downloadfile->df_download()) 
	echo "Sorry, we are experiencing technical difficulties downloading this file. Please report this error to Technical Support.";
?>
