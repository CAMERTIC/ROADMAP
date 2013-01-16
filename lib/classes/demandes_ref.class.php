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

class demandes_ref extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	/* public function getAutocaristes() {
		
	} */
	
	public function getAllRecords($filter = null, $limit = null) {
		$req = "SELECT * FROM $this->table";
		if(!is_null($filter)) {
			$req .= " WHERE ";
			foreach($filter as $k => $v) {
				$req .= " $k = '$v'";
			}
		}
		$req .= ' ORDER BY id DESC';
		$res = $this->select($req);
		return $res;
	}
	
	public function getDemandes() {
		$req = "SELECT * FROM $this->table WHERE id_autocariste = '".$_SESSION['fiche_id']."' LIMIT 0, 40";
		$res = $this->select($req);
		return $res;
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>