<?php
@session_start();
/**
 * Classe de gestion des provinces
 * @author 		Patient Assontia <assontia@gmail.com>
 * @package 	Camertic Framework
 * @since 		Version 1.0
 * @version		1.1
 * @copyright 	Copyright (c) 2012, Patient
 * @license		GNU General Public License
 */

class dico extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function getAllRecords($filter = null, $limit = null) {
		$req = "SELECT * FROM $this->table ORDER BY expression ASC";
		$res = $this->select($req);
		return $res;
	}
	
	public function getAllDefinitions($word) {
		$word = strtolower($word);
		$req = "SELECT * FROM $this->table WHERE LOWER(`expression`) LIKE '%$word%' ORDER BY expression ASC";
		$res = $this->select($req);
		return $res;
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>