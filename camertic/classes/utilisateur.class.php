<?php

/**
 * Classe de traitements et layoutions sur les fichier
 * @author 		Patient Assontia <assontia@gmail.com>
 * @package 	MyFramework
 * @since 		Version 1.0
 * @version		1.0
 * @copyright 	Copyright (c) 2011, Bertrand, Patient et Fabrice
 * @license		GNU General Public License
 */

class utilisateur extends bd {

	var $tableusers = 'users';
	var $loginfield = 'utilisateur';
	var $passfield = 'password';
	var $statusfield = 'etat';
	var $categoryfield = 'categorie';
	var $tablegroups = 'grupos';
	var $tablemenus = 'menus';
	var $isLoggedIn = false;
	var $utilisateur;
	var $userDatas;
	var $lastKey;
	//private $salt = 'duo';
	
	public function __construct() {
		parent::__construct();
	}
	
	
	
	/*
	
	*/
	public function login($user, $pass) {
		$this->utilisateur = parent::cleanData($user);
		$pass = parent::cleanData($pass);
		//$this->salt = 'duo';
		
		die('do');
		$requete = "SELECT id, motdepasse, salt FROM $this->tableusers WHERE utilisateur = '$this->utilisateur' AND etat NOT IN(0,-1) LIMIT 1;";
		
		if(parent::countResult($requete) == 0) {
			// utilisateur n'existe pas
			// die;
			return false;
		} else { // utilisateur existe
			$userdatas = parent::select($requete); 
			$userdatas = $userdatas[0];
			$hash = md5($pass.$userdatas->salt); // hashage du mot de passe entree par lutilisateur
			
			if($userdatas->motdepasse == $hash) {
				$this->isLoggedIn = true;
				
				$this->authenticateUser($userdatas->id);
				return true;
			}
			else {
				return false;
			}
			//$hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
		}
	}
	
	public function simpleLogin($username, $pass) {
		$this->utilisateur = parent::cleanData($username);
		//$pass = parent::cleanData($pass);
		
		$requete = "SELECT * FROM $this->tableusers WHERE $this->loginfield = '$this->utilisateur' AND $this->statusfield NOT IN(0) LIMIT 1;";
		//var_dump($requete);// die;
		if(parent::countResult($requete) == 0) {
			// utilisateur n'existe pas
			//die('test3');
			 die('Usario does not exist!');
			return false;
		} else { // utilisateur existe
			//die('test3');
			$userdatas = parent::select($requete, "Trying to connect.");			
			//var_dump($userdatas); die;
			$userdatas = $userdatas[0];
			//
			$hash = md5($pass); // hashage du mot de passe entree par lutilisateur
			// var_dump($pass);
			// var_dump($hash); die;
			if($userdatas->{$this->passfield} == $hash) {
				$this->isLoggedIn = true;
				$this->authenticateUser($userdatas->{$this->loginfield});
				return true;
			}
			else {
				return false;
			}	
		}
	}
	
	public function createUserSimple($post) {
		
		$password = md5($post['password']);
		$login = $post['utilisateur'];
		$categorie = $post['categorie'];
		$fiche_id = $post['fiche_id'];
		$etat = $post['etat'];
		// insertion des parametres utilisateur
		if(isset($post['id'])){
			$req = "UPDATE $this->tableusers SET utilisateur = '$login', password = '$password', etat = '$etat' WHERE id = '".$post['id']."'";
			$res = $this->update($req);
		}else {
			$req = "INSERT INTO  $this->tableusers(utilisateur, categorie, password, fiche_id, etat) VALUES ('$login', '$categorie', '$password', '$fiche_id', '$etat')";
			$res = $this->insert($req);
		}
		// mise a jour de la cle de validation des ventes 
		// $this->lastKey = $pass. $this->lastId();
		// $req1 = "UPDATE $this->tableusers SET code = '$this->lastKey' WHERE id = ". $this->lastId() ."";
		return $res;
	
	}
	
	public function createUser($post) {
		$salt = time();
		$pass = 'pp';
		$hashedPassword = md5($pass . $salt);
		$login = $post['login'];
		$nom = $post['nom'];
		$groupe = $post['groupe'];
		// insertion des parametres utilisateur
		$req = "INSERT INTO  $this->tableusers(utilisateur, nom, idgroupe, motdepasse, salt) VALUES ('$login', '$nom', '$groupe', '$hashedPassword', '$salt')";
		$res = $this->insert($req);
		// mise a jour de la cle de validation des ventes 
		$this->lastKey = $pass. $this->lastId();
		$req1 = "UPDATE $this->tableusers SET code = '$this->lastKey' WHERE id = ". $this->lastId() ."";
		return $this->update($req1);
	
	}
	
	/* public function createUserSimple($post) {
		$hashedPassword = md5($post['pass']);
		$login = $post['login'];
		$nom = $post['nom'];
		$groupe = $post['groupe'];
		$apellidos = $post['surname'];
		$email = $post['email'];
		$idioma = $post['lang'];
		$tel = $post['phone'];
		if($post['enterprise'] == "") $enterprise = "NULL"; else $enterprise = "'".$post['enterprise']."'";
		// insertion des parametres utilisateur
		$req = "INSERT INTO $this->tableusers($this->loginfield, nombre, grupo, clave, apellidos, email, telefono, idioma, empresa, $this->statusfield) VALUES ('$login', '$nom', '$groupe', '$hashedPassword', '$apellidos', '$email', '$tel', '$idioma', $enterprise, '1')";
		//var_dump($req); die();
		$res = $this->insert($req);
		
		return $res;
		//return $this->update($res);
	} */
	
	public function editUserSimple($post) {
		$hashedPassword = ($post['pass'] == '') ? '' : md5($post['pass']);
		$login = $post['login'];
		$nom = $post['nom'];
		$groupe = $post['groupe'];
		$apellidos = $post['surname'];
		$email = $post['email'];
		$idioma = $post['idioma'];
		$tel = $post['phone'];
		$enterprise = $post['enterprise'];
		$fields = '';
		$fields .= ", empresa = ";
		$fields .= ($post['enterprise'] == '') ? "NULL" : "'$enterprise'";
		// insertion des parametres utilisateur
		if($hashedPassword == '')
			$req = "UPDATE $this->tableusers SET nombre = '$nom', grupo = '$groupe', apellidos = '$apellidos', email = '$email', $this->loginfield = '$login', telefono = '$tel', idioma = '$idioma' $fields WHERE $this->loginfield = '".$post['olduser']."'";
		else
			$req = "UPDATE $this->tableusers SET clave = '$hashedPassword',nombre = '$nom', grupo = '$groupe', apellidos = '$apellidos', email = '$email', telefono = '$tel', idioma = '$idioma', $this->loginfield = '$login' $fields WHERE $this->loginfield = '".$post['olduser']."'";
		//var_dump($req); die;
		$res = $this->insert($req);
		
		return $res;
		//return $this->update($res);
	
	}
	
	public function deleteUser($post) {
		$id = $post['user'];
		$req = "UPDATE $this->tableusers SET $this->statusfield = -1 WHERE $this->loginfield = '$id';";
		return $this->update($req);
	}
	
	public function generatePassword() {
	
	}
	
	public function isLoggedIn() {
		if(isset($_SESSION['u']['statut']))
			if($_SESSION['u']['statut'] == '1')
			return true;
		return false;
	}
	
	public function getIdUserFromCode($code) {
		$requete = "SELECT * FROM $this->tableusers WHERE code = '$code' LIMIT 1;";
		$userdatas = $this->select($requete); 
		return $this->userId = $userdatas[0]->id;
	}
	
	/*
	 * Fonction pour lire les donnees d'un utilisateur
	 */
	public function getUser($iduser) {
		$requete = "SELECT * FROM $this->tableusers WHERE $this->loginfield = '$iduser' LIMIT 1;";
		$userdata = $this->select($requete); 
		return $this->userId = $userdata[0];
	}
	
	public function getUserName($iduser) {
		$requete = "SELECT nombre FROM $this->tableusers WHERE identificador = '$iduser' LIMIT 1;";
		$userdata = $this->select($requete); 
		return $userdata[0]->nombre;
	}
	
	/*
	 * Fonction pour modifier nom, login, mot de passe et statut d'un utlisateur
	 */
	public function modifyUser($post) {
		$fieldsToUpdate = "";
		$userdatas = $this->getUser($post['iduser']);
		// Recapitulons les champs qui ont ete modifies
		if($userdatas->nom != $post['nom'])
			$fieldsToUpdate .= "nom = '".$post['nom']."', ";
		if($userdatas->utilisateur != $post['login'])
			$fieldsToUpdate .= "utilisateur = '".$post['login']."', ";
		if(!empty($post['pass'])) {
			$salt = time();
			$fieldsToUpdate .= "motdepasse = '".md5($post['pass'].$salt)."', ";
			$fieldsToUpdate .= "salt = '".$salt."', ";
		}
		if($userdatas->idgroupe != $post['groupe'])
			$fieldsToUpdate .= "idgroupe = '".$post['groupe']."', ";
		// Verifions s'il y a vraiment a mettre a jour
		if($fieldsToUpdate != "") {
			$sql = "UPDATE $this->tableusers SET ".removeLastChar($fieldsToUpdate)." WHERE id = '".$post['iduser']."'";
			var_dump($sql); die;
			return $this->update($sql);
		} else
			return NULL;
	
	}
	
	public function getListUsers() {
		$req = "SELECT u.$this->loginfield, u.nombre AS name, u.$this->statusfield, u.telefono AS tel, u.empresa AS enterprise, u.email, ug.nombre AS grupo FROM $this->tableusers AS u ";
		$req .= " INNER JOIN $this->tablegroups AS ug ON u.grupo = ug.identificador";
		$req .= " LEFT JOIN $this->tableenterprises AS ue ON u.empresa = ue.identificador";
		$req .= " WHERE u.$this->statusfield NOT IN(-1)";
		//var_dump($req); die;
		return $this->select($req);
	}
	
	public function getListUsersFromEnterprise($id) {
		$req = "SELECT u.$this->loginfield, u.nombre AS name, u.$this->statusfield, u.telefono AS tel, u.empresa AS enterprise, u.email, ug.nombre AS grupo FROM $this->tableusers AS u ";
		$req .= " INNER JOIN $this->tablegroups AS ug ON u.grupo = ug.identificador";
		$req .= " INNER JOIN $this->tableenterprises AS ue ON u.empresa = ue.identificador";
		$req .= " WHERE u.$this->statusfield NOT IN(-1) AND ue.identificador = " . $id;
		//var_dump($req); die;
		return $this->select($req);
	}
	
	public function getGroups() {
		$req = "SELECT * FROM $this->tablegroups";
		return $this->select($req);
	}
	
	public function getUserEnterprises() {
		$req = "SELECT * FROM $this->tableenterprises";
		return $this->select($req);
	}
	
	public function getNameEnterpriseFromId($id) {
		$req = "SELECT nombre FROM $this->tableenterprises WHERE identificador = '$id';";
		$res = $this->select($req);
		return $res[0]->nombre;
	}
	
	public function getUserGroupsActif() {
		$req = "SELECT * FROM $this->tablegroups WHERE etat = 1";
		return $this->select($req);
	}
	
	public function getEtatGroup($val) {
		return ($val == 1) ? "Actif" : "Bloque";
	}
	
	public function getEtatUser($val) {
		if($val==0 || $val == 1 || $val == -1) {
			switch($val) {
				case 0: return 'Bloque';
				case 1: return 'Actif';
				case 2: return 'Supprime';
			}
		} else
			throw new Exception('Etat utilisateur inexistant');
	}
	
	public function getUserDatas($ids){
		$requete = "SELECT * FROM $this->tableusers WHERE $this->loginfield = '$ids' LIMIT 1;";
		$userdatas = parent::select($requete, "Connection successful. Entering dashboard."); 
		return $this->userDatas = $userdatas[0];
	}
	
	public function getUserViews() {
		$req = "SELECT v.id, v.titre, v.fonction, v.ordre, v.etat, f.nom AS fonction FROM $this->tablevues AS v LEFT JOIN $this->tablefunctions AS f ON f.id = v.fonction WHERE parent = 0 LIMIT 0, 50";
		return $this->select($req, 'Affichage des droits des utilisateurs.');
	}
	
	public function getViews($id) {
		$req = "SELECT v.id, v.titre, v.fonction AS idfunction, v.lien, v.ordre, v.etat, f.nom AS fonction FROM $this->tablevues AS v LEFT JOIN $this->tablefunctions AS f ON f.id = v.fonction WHERE v.id = $id LIMIT 1";
		return $this->select($req, "Affichage d'une vue (id = $id).");
	}
	
	public function editView($id, $vars) {
		$req = "UPDATE $this->tablevues SET etat = '".$vars['etat']."', fonction = '".$vars['fonction']."', titre = '".$vars['titre']."', ordre = '".$vars['ordre']."', lien = '".$vars['lien']."'  WHERE id = '$id';";
		return $this->update($req);
	}
	
	public function createView($vars) {
		$req = "INSERT INTO  $this->tablevues(titre, lien, fonction, ordre, etat) VALUES ('".$vars['titre']."', '".$vars['lien']."', '".$vars['fonction']."', '".$vars['ordre']."', '".$vars['etat']."')";
		return $this->insert($req, "Creation d'une nouvelle vue.");
	}
	
	public function getFunctions() {
		$req = "SELECT * FROM $this->tablefunctions";
		return $this->select($req);
	}
	
	public function getSubViews($idParent) {
		$req = "SELECT v.id, v.titre, v.fonction, v.ordre, v.etat, f.nom AS fonction FROM $this->tablevues AS v LEFT JOIN $this->tablefunctions AS f ON f.id = v.fonction WHERE parent = $idParent LIMIT 0, 20";
		return $this->select($req);
	}
	
	public function isAdministrator() {
		if($this->isLoggedIn()) {//var_dump($_SESSION['u']['idgroupe']); die;
			if($this->getGroupOfUser() == 1)
				return true;
			else
				return false;
		} else {
			return false;
		}
	}
	
	public function getGroupOfUser() {
		
		return $_SESSION['u']['idgroupe'];
	}
	
	public function getCredentials($id) {
		$req = "SELECT * FROM $this->tableusers WHERE fiche_id = '$id' LIMIT 1;";
		$res = $this->select($req);
		if(!empty($res))
			return $res[0];
		else
			return false;
	}
	
	public function getEtatView($etat) {
		// switch($etat) {
			// case '1' : return 'Actif'; break;
			// case '0' : return 'Inactif'; break;
		// }
		return ($etat == 1) ? 'Actif' : 'Inactif';
	}
	
	public function logout() {
	
	}

	/*
	
	*/
	public function authenticateUser($ids) {
	
		if($this->isLoggedIn == true) {
			$_SESSION['u'] = array();
			$this->getUserDatas($ids);//var_dump($this->userDatas); die;
			$_SESSION['u']['statut'] = 1;
	//		$_SESSION['u']['nom'] = $this->userDatas->nombre;
	//		$_SESSION['u']['ip'] = $this->userDatas->ip;
	//		$_SESSION['u']['code'] = $this->userDatas->code;
	//		$_SESSION['u']['last_login'] = $this->userDatas->last_login;
	//		$_SESSION['u']['email'] = $this->userDatas->email;
			$_SESSION['u']['idgroupe'] = $this->userDatas->categorie;
	//		$_SESSION['u']['lang'] = $this->userDatas->idioma;
			$_SESSION['u']['utilisateur'] = $this->userDatas->{$this->loginfield};
	//		$_SESSION['u']['enterprise'] = $this->userDatas->empresa;
			$_SESSION['iduser']= $this->userDatas->id;
			$_SESSION['fiche_id']= $this->userDatas->fiche_id;
			$_SESSION['derniere_con']= $this->userDatas->derniere_con;
		}
		else {
			
		}
	}
	
	public function getUserLang(){
		return $_SESSION['u']['lang'];
	}
	
	public function isAuthenticated() {
	
	}
	
	public function getAuthorisedMenus() {
		$req = "SELECT ";
		return $this->select($req);
	}
	
	public function createGroup() {
	
	}
	
	public function addFunctionToGroup() {
	
	}
	
	public function deconnexion() {
	
	}
	
	public function isAuthorised() {
	
	}
	
	public function __destructor() {
		parent::__destructor();
	}
	
}

?>