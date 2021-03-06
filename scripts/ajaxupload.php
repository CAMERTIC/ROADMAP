<?php
	function uploadImage($fileName, $maxSize, $maxW, $fullPath, $relPath, $colorR, $colorG, $colorB, $maxH = null){
		$folder = $relPath;
		$maxlimit = $maxSize;
		$allowed_ext = "jpg,jpeg,gif,png,bmp";
		$match = "";
		$errorList = array();
		$filesize = $_FILES[$fileName]['size'];
		if($filesize > 0){	
			$filename = strtolower($_FILES[$fileName]['name']);
			$filename = preg_replace('/\s/', '_', $filename);
		   	if($filesize < 1){ 
				$errorList[] = "Taille du fichier vide.";
			}
			if($filesize > $maxlimit){ 
				$errorList[] = "Le fichier est trop grand.";
			}
			if(count($errorList)<1){
				$file_ext = preg_split("/\./",$filename);
				$allowed_ext = preg_split("/\,/",$allowed_ext);
				foreach($allowed_ext as $ext){
					if($ext==end($file_ext)){
						$match = "1"; // File is allowed
						$NUM = time();
						$front_name = substr($file_ext[0], 0, 15);
						$newfilename = $front_name."_".$NUM.".".end($file_ext);
						$filetype = end($file_ext);
						$save = $folder.$newfilename;
						if(!file_exists($save)){
							list($width_orig, $height_orig) = getimagesize($_FILES[$fileName]['tmp_name']);
							if($maxH == null){
								if($width_orig < $maxW){
									$fwidth = $width_orig;
								}else{
									$fwidth = $maxW;
								}
								$ratio_orig = $width_orig/$height_orig;
								$fheight = $fwidth/$ratio_orig;
								
								$blank_height = $fheight;
								$top_offset = 0;
									
							}else{
								if($width_orig <= $maxW && $height_orig <= $maxH){
									$fheight = $height_orig;
									$fwidth = $width_orig;
								}else{
									if($width_orig > $maxW){
										$ratio = ($width_orig / $maxW);
										$fwidth = $maxW;
										$fheight = ($height_orig / $ratio);
										if($fheight > $maxH){
											$ratio = ($fheight / $maxH);
											$fheight = $maxH;
											$fwidth = ($fwidth / $ratio);
										}
									}
									if($height_orig > $maxH){
										$ratio = ($height_orig / $maxH);
										$fheight = $maxH;
										$fwidth = ($width_orig / $ratio);
										if($fwidth > $maxW){
											$ratio = ($fwidth / $maxW);
											$fwidth = $maxW;
											$fheight = ($fheight / $ratio);
										}
									}
								}
								if($fheight == 0 || $fwidth == 0 || $height_orig == 0 || $width_orig == 0){
									die("FATAL ERROR REPORT ERROR CODE [add-pic-line-67-orig] to <a href='http://www.atwebresults.com'>AT WEB RESULTS</a>");
								}
								if($fheight < 45){
									$blank_height = 45;
									$top_offset = round(($blank_height - $fheight)/2);
								}else{
									$blank_height = $fheight;
								}
							}
							$image_p = imagecreatetruecolor($fwidth, $blank_height);
							$white = imagecolorallocate($image_p, $colorR, $colorG, $colorB);
							imagefill($image_p, 0, 0, $white);
							switch($filetype){
								case "gif":
									$image = @imagecreatefromgif($_FILES[$fileName]['tmp_name']);
								break;
								case "jpg":
									$image = @imagecreatefromjpeg($_FILES[$fileName]['tmp_name']);
								break;
								case "jpeg":
									$image = @imagecreatefromjpeg($_FILES[$fileName]['tmp_name']);
								break;
								case "png":
									$image = @imagecreatefrompng($_FILES[$fileName]['tmp_name']);
								break;
							}
							@imagecopyresampled($image_p, $image, 0, $top_offset, 0, 0, $fwidth, $fheight, $width_orig, $height_orig);
							switch($filetype){
								case "gif":
									if(!@imagegif($image_p, $save)){
										$errorList[]= "PERMISSION DENIED [GIF]";
									}
								break;
								case "jpg":
									if(!@imagejpeg($image_p, $save, 100)){
										$errorList[]= "PERMISSION DENIED [JPG]";
									}
								break;
								case "jpeg":
									if(!@imagejpeg($image_p, $save, 100)){
										$errorList[]= "PERMISSION DENIED [JPEG]";
									}
								break;
								case "png":
									if(!@imagepng($image_p, $save, 0)){
										$errorList[]= "PERMISSION DENIED [PNG]";
									}
								break;
							}
							@imagedestroy($filename);
						}else{
							$errorList[]= "CANNOT MAKE IMAGE IT ALREADY EXISTS";
						}	
					}
				}		
			}
		}else{
			$errorList[]= "NO FILE SELECTED";
		}
		if(!$match){
		   	$errorList[]= "File type isn't allowed: $filename";
		}
		if(sizeof($errorList) == 0){
			return $fullPath.$newfilename;
		}else{
			$eMessage = array();
			for ($x=0; $x<sizeof($errorList); $x++){
				$eMessage[] = $errorList[$x];
			}
		   	return $eMessage;
		}
	}
	
	$filename = strip_tags($_REQUEST['filename']);
	$maxSize = strip_tags($_REQUEST['maxSize']);
	$maxW = strip_tags($_REQUEST['maxW']);
	$fullPath = strip_tags($_REQUEST['fullPath']);
	$relPath = strip_tags($_REQUEST['relPath']);
	$colorR = strip_tags($_REQUEST['colorR']);
	$colorG = strip_tags($_REQUEST['colorG']);
	$colorB = strip_tags($_REQUEST['colorB']);
	$maxH = strip_tags($_REQUEST['maxH']);
	$filesize_image = $_FILES[$filename]['size'];
	//var_dump($_REQUEST); die;
	if($filesize_image > 0){
		$upload_image = uploadImage($filename, $maxSize, $maxW, $fullPath, $relPath, $colorR, $colorG, $colorB, $maxH);
		if(is_array($upload_image)){
			foreach($upload_image as $key => $value) {
				if($value == "-ERROR-") {
					unset($upload_image[$key]);
				}
			}
			$document = array_values($upload_image);
			for ($x=0; $x<sizeof($document); $x++){
				$errorList[] = $document[$x];
			}
			$imgUploaded = false;
		}else{
			$imgUploaded = true;
		}
	}else{
		$imgUploaded = false;
		$errorList[] = "Taille du fichier vide!";
	}
?>
<?php
	session_start();
	require_once '../config.php';
	require_once '../lib/library.php';
	require_once '../camertic/classes/bd.class.php';
	require_once '../lib/classes/entity.class.php';
	require_once '../lib/classes/premiumAutocar.class.php';
	require_once '../lib/classes/mdr_flotte.class.php';
	GLOBAL $app;
	$C = new CamerticConfig;
	$app = new premiumAutocar;
	if(!$app->checkSession()) {
		header('location:login.php');
		die();
	}
	$autocar = new mdr_flotte;
	//var_dump($upload_image); die;
	if($imgUploaded){
		echo '<img src="./images/success.gif" width="16" height="16" border="0" style="marin-bottom: -4px;" /> Enregistrement Success!<br />';
		//<img style="float:left;margin:5px" src="'.$upload_image.'" border="0" />';
		// echo 'Marque : ' . $_REQUEST['marque'] . '<br />';
		// echo 'Modele : ' . $_REQUEST['modele'] . '<br />';
		// echo 'Quantite : ' . $_REQUEST['quantite'] . '<br />';
		// echo 'Nombre de places : ' . $_REQUEST['places'] . '<br />';
		// echo 'Equipement : ' . $_REQUEST['equipement'] . '<br />';
		$_REQUEST['image'] = $upload_image;
	}else{
		//echo '<img src="./images/error.gif" width="16" height="16px" border="0" style="marin-bottom: -3px;" /> Erreur(s) Trouv&eacute;(s): ';
		// foreach($errorList as $value){
	    		// echo $value.'<br> ';
		// }
		if(!isset($_REQUEST['image']))
			$_REQUEST['image'] = $C->rootUrl . "img/car2.png";
		// echo '<img style="float:left;margin:5px" height="80" src="'.$_REQUEST['image'].'" border="0" />';
		// echo 'Marque : ' . $_REQUEST['marque'] . '<br />';
		// echo 'Modele : ' . $_REQUEST['modele'] . '<br />';
		// echo 'Quantite : ' . $_REQUEST['quantite'] . '<br />';
		// echo 'Nombre de places : ' . $_REQUEST['places'] . '<br />';
		// echo 'Equipement : ' . $_REQUEST['equipement'] . '<br />';
	}
	foreach($_REQUEST['equipement'] as $k => &$equip)
		if($equip == '')
			unset($_REQUEST['equipement'][$k]);
	$_REQUEST['equipement'] = implode(',', $_REQUEST['equipement']);
	//$date = new DateTime("2012-07-05 16:43:21", new DateTimeZone('Europe/Paris'));
	//date_default_timezone_set('America/New_York')
	$_REQUEST['date_modif'] = @date('Y-m-d h:i:s');
	//echo "<pre>"; var_dump($_REQUEST);
	$autocar->saveRecord($_REQUEST, array('_', 'filename', 'maxSize', 'maxW', 'fullPath', 'relPath', 'colorR', 'colorG', 'colorB', 'maxH', '__utma', '__utmc', '__utmb', '__utmz', 'PHPSESSID'));
?>