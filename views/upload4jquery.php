<?php
include($_SERVER['DOCUMENT_ROOT'].'/upload/foto_upload_script.php');

$foto_upload = new Foto_upload;	

$json['size'] = $_POST['MAX_FILE_SIZE'];
$json['img'] = '';

$foto_upload->upload_dir = $_SERVER['DOCUMENT_ROOT']."/uploads/";
$foto_upload->foto_folder = $_SERVER['DOCUMENT_ROOT']."/upload/";
// $foto_upload->thumb_folder = $_SERVER['DOCUMENT_ROOT']."/upload/thumb/";
$foto_upload->extensions = array(".jpg", ".gif", ".png", ".xlsx", ".docx");
$foto_upload->language = "en";
// $foto_upload->x_max_size = 480;
// $foto_upload->y_max_size = 360;
// $foto_upload->x_max_thumb_size = 120;
// $foto_upload->y_max_thumb_size = 120;

$foto_upload->the_temp_file = $_FILES['fileToUpload']['tmp_name'];
$foto_upload->the_file = $_FILES['fileToUpload']['name'];
$foto_upload->http_error = $_FILES['fileToUpload']['error'];
$foto_upload->rename_file = true; 

if ($foto_upload->upload()) {
	//$foto_upload->process_image(false, true, true, 80);
	$json['img'] = $foto_upload->file_copy;
} 

$json['error'] = strip_tags($foto_upload->show_error_string());
echo json_encode($json);
?>