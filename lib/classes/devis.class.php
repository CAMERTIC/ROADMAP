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

class devis extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	/* public function getAutocaristes() {
		
	} */
	
	public function getAllRecords($limit = null) {
		$req = "SELECT * FROM $this->table";
		if(!is_null($limit)){
			$req .= " ORDER BY id DESC LIMIT $limit";
		}
		$res = $this->select($req);
		return $res;
	}
	
	public function getDemandes() {
		$req = "SELECT * FROM $this->table WHERE id_autocariste = '".$_SESSION['fiche_id']."' LIMIT 0, 80";
		$res = $this->select($req);
		return $res;
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>