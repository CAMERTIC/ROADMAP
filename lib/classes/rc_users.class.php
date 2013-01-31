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

class rc_users extends entity {
	
	public $login;
	public $pw;
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function login($username, $pass) {
		$this->login = parent::cleanData($username);
		//$pass = parent::cleanData($pass);
		
		$requete = "SELECT * FROM $this->table WHERE login = '$this->login' AND status NOT IN(0) LIMIT 1;";
		//var_dump($requete);// die;
		if(parent::countResult($requete) == 0) {
			// utilisateur n'existe pas
			//die('test3');
			 die('User does not exist!');
			return false;
		} else { // utilisateur existe
			//die('test3');
			$userdatas = parent::select($requete, "Trying to connect.");			
			//var_dump($userdatas); die;
			$userdatas = $userdatas[0];
			//
			$hash = $pass; // hashage du mot de passe entree par lutilisateur
			// var_dump($pass);
			// var_dump($hash); die;
			if($userdatas->pw == $hash) {
				$this->isLoggedIn = true;
				$this->authenticateUser($userdatas->login);
				return true;
			}
			else {
				return false;
			}	
		}
	}
	
	public function isLoggedIn() {
		if(isset($_SESSION['u']['statut']))
			if($_SESSION['u']['statut'] == '1')
			return true;
		return false;
	}
	
	public function authenticateUser($ids) {
	
		if($this->isLoggedIn == true) {
			$_SESSION['u'] = array();
			$this->getUserDatas($ids);//var_dump($this->userDatas); die;
			$_SESSION['u']['statut'] = 1;
			$_SESSION['u']['idgroupe'] = $this->userDatas->gp;
			$_SESSION['u']['utilisateur'] = $this->userDatas->login;
			$_SESSION['u']['email'] = $this->userDatas->email;
			$_SESSION['u']['nom'] = $this->userDatas->noms;
			$_SESSION['u']['team'] = $this->userDatas->team;
			$_SESSION['u']['derniere_con']= $this->userDatas->last_login;
		}
		else {
			
		}
	}
	
	public function getUserDatas($ids){
		$requete = "SELECT * FROM $this->table WHERE login = '$ids' LIMIT 1;";
		$userdatas = parent::select($requete, "Connection successful. Entering dashboard."); 
		return $this->userDatas = $userdatas[0];
	}
	
	public function getManagers() {
		$req = "SELECT * FROM $this->table WHERE gp = '2'";
		$res = $this->select($req);
		return $res;
		
	}
	
	public function getUsers() {
		$req = "SELECT * FROM $this->table WHERE gp IN (1, 2)";
		$res = $this->select($req);
		return $res;
	}
	
	public function getMyTeamMembers() {
		if($_SESSION['u']['idgroupe'] == 2) {
			$req = "SELECT * FROM $this->table WHERE manager = '". $_SESSION['u']['utilisateur'] ."'";
			$res = $this->select($req);
			return $res;
		}
	}
	
	public function getTeamName($id) {
		$req = "SELECT * FROM team WHERE id = '" . $id . "' LIMIT 1";
		$res = $this->select($req);
		if(isset($res[0]->name))
			return $res[0]->name;
		else
			return '';
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>