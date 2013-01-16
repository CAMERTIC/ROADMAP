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

class mdr_flotte extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function getFlotteAutocariste() {
		$req = "SELECT * FROM $this->table WHERE mdr_id = '$_SESSION['fiche_id']' LIMIT 0, 20";
		//var_dump($req); die;
		$res = $this->select($req);
		return $res;
	}
	
	public function demandeInscription($data) {
		$this->saveRecord($data);
	}
	
	public function getNbVehiculeFlotte() {
		$requete = "SELECT * FROM $this->table WHERE mdr_id = '$_SESSION['fiche_id']';";
		return $this->countResult($requete);
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>