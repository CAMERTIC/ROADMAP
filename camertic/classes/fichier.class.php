<?php

/**
 * Classe de traitements et layoutions sur les fichier
 * @author 		Patient Assontia <assontia@gmail.com>
 * @package 	MyFramework
 * @since 		Version 1.0
 * @version		1.0
 * @copyright 	Copyright (c) 2011, Bertrand, Patient et Fabrice
 * @license		GNU General Public License
 */

class fichier extends CamerticConfig {
	
	var $sqlLogsFile = 'queries';
	var $operationsLogsFile = 'operations';

	public function __construct() {
		//$this->sqlLogsFile = trouvefichier('queries.txt');
	}
	
	public function logAction($file, $log) {
		$fileloc = $file . '.txt';
		//var_dump($fileloc);
		$filename = $this->localizeFile($fileloc);
		$patron = '/'.$fileloc.'/';
		$newfile = $file.date('d-m-y').'.txt';
		$newfilename = preg_replace($patron, $newfile, $filename);
		if(!file_exists($newfilename))
			copy($filename, $newfilename);
		$filename = $newfilename;
		$somecontent = $log. " // On " . date('r') . " by ".$_SESSION['nom']."\n";

		// Assurons nous que le fichier est accessible en �criture
		if (is_writable($filename)) {

			// Dans notre exemple, nous ouvrons le fichier $filename en mode d'ajout
			// Le pointeur de fichier est plac� � la fin du fichier
			// c'est l� que $somecontent sera plac�
			if (!$handle = fopen($filename, 'a')) {
				 echo "Impossible d'ouvrir le fichier ($filename)";
				 exit;
			}

			// Ecrivons quelque chose dans notre fichier.
			if (fwrite($handle, $somecontent) === FALSE) {
				echo "Impossible d'�crire dans le fichier ($filename)";
				exit;
			}

			//echo "L'�criture de ($somecontent) dans le fichier ($filename) a r�ussi";

			fclose($handle);

		} else {
			echo "Le fichier $filename n'est pas accessible en �criture.";
		}
	}
	
	/*
	
	*/
	public function getFolders($dossier) {
		$sousdossiers = array();
		if($dh = opendir($dossier)) {
			while(($filename = readdir($dh))) {
				if(is_dir($filename)) {
					$sousdossiers[] = $dossier."/".$filename; 
				}
			}
		}
		
		return $sousdossiers;
	}
	
	public function getFoldersRecursion($folder) {
		$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder));
		$touslesfichiers = array();
		//echo "<pre>";
		//var_dump($it);die;
		foreach( $it as $key => $file ) {
			//echo $file;
			$touslesfichiers[] = $file;
		}
		//echo "</pre>";
		return $touslesfichiers;
	}
	
	public function localizeFile($file) {
		$dossierappli = $_SERVER['DOCUMENT_ROOT'] . $this->appfolder;
		$files = $this->getFoldersRecursion($dossierappli);
		foreach($files as $f) {
			if(preg_match("/$file/", $f))
				return $f;
			else
				continue;
		}
	}
	
	public function cheminReel($fichier) {
		return realpath($fichier);
	}
	
	public function __destructor() {
		
	}
	
}

?>