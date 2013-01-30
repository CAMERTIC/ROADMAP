<?php
error_reporting(E_ALL);
if(mail('emmanuel.ndimba@camiron.net', 'Test', 'Test')) {
	echo "votre mail a ete envoye";
} else {
	echo "impossible denvoyer le mail";
}
?>