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

class parametres extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function getEmailRappel() {
		$req = "SELECT email_rappel FROM $this->table";
		//var_dump($req); die;
		$res = $this->select($req);
		return $res[0]->email_rappel;
	}
	
	public function setEmailRappel() {
		$req = "UPDATE $this->table SET email_rappel = ''; ";
		$res = $this->update($req);
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>