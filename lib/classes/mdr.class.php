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

class mdr extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function getAutocaristes() {
		$req = "SELECT * FROM $this->table WHERE mdr_categorie = 'autocar' LIMIT 0, 10";
		//var_dump($req); die;
		$res = $this->select($req);
		return $res;
	}
	
	public function getNbDevis($id) {
		$requete = "SELECT * FROM devis WHERE id_autocariste = '$id';";
		return $this->countResult($requete);
	}
	
	
	public function getAllRecords($filter = null, $limit = null) {
		$req = "SELECT aut.mdr_id, aut.mdr_nom, aut.mdr_tel, aut.mdr_ville, aut.mdr_resp, aut.nb_visites, aut.valid, DATE_FORMAT(MAX(p.date_payement), '%d %M %Y') as date_payement, p.choix_plan FROM $this->table AS aut LEFT JOIN payements AS p ON p.id_autocariste = aut.mdr_id";
		if(!is_null($filter)) {
			$req .= " WHERE ";
			foreach($filter as $k => $v) {
				$req .= " $k = '$v'";
			}
			if(!is_null($limit)){
				$req .= " AND mdr_categorie = 'autocar' GROUP BY aut.mdr_id ORDER BY date_payement DESC $limit";
			}
		} else {
			$req .= " WHERE mdr_categorie = 'autocar' GROUP BY aut.mdr_id ORDER BY date_payement DESC $limit";
		}
		
		//var_dump($req); die;
		$res = $this->select($req);
		return $res;
	}
	
	public function demandeInscription($data) {
		$this->saveRecord($data);
	}
	
	public function login($form) {
		
	}
	
	public function getNbAutocariste() {
		$requete = "SELECT * FROM $this->table WHERE mdr_categorie = 'autocar';";
		return $this->countResult($requete);
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>