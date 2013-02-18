<?php
/*
 * Class has simple interface to download any file from a server
 * without displaying the location of the file
 *
 * Author: Assontia Patient;
 * mail: assontia@gmail.com;
 * web: http://assontia.blogspot.com;
 * version: 1.0 /05.31.2012
 *
 */

if ( !defined("DOWNLOADFILE_H") ) {

	define("DOWNLOADFILE_H",1);

	class DOWNLOADFILE {
		var $df_path = "";
		var $df_contenttype = "";
		var $df_contentdisposition = "";
		var $df_filename = "";

		function DOWNLOADFILE($df_path, $df_contenttype = "application/octet-stream", $df_contentdisposition = "attachment", $df_filename = "") {
			$this->df_path = $df_path;
			$this->df_contenttype = $df_contenttype;
			$this->df_contentdisposition = $df_contentdisposition;
			$this->df_filename = ($df_filename)? $df_filename : basename($df_path);
			//var_dump($this);
		}

		// check is specified file exists?
		function df_exists() {
			if(file_exists($this->df_path)) return true;
			return false;
		}

		// get file size
		function df_size() {
			if($this->df_exists()) return filesize($this->df_path);
			return false;
		}

		// return permission number for user 'other'
		function df_permitother() {
			return substr(decoct(fileperms($this->df_path)),-1);
		}

		// download file
		function df_download() {
			if($this->df_exists() && $this->df_permitother() >= 4) {
				header("Content-type: ".$this->df_contenttype);
				header("Content-Disposition: ".$this->df_contentdisposition."; filename=\"".$this->df_filename."\"");
				header("Content-Length: ".$this->df_size());

				$fp = readfile($this->df_path, "r");
				return $fp;
			}
			return false;
		}

	}

} //if ( !defined("DOWNLOADFILE_H") )

?>