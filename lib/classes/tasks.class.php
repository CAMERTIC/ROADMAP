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

class tasks extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function getMyTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE person_in_charge = '" . $_SESSION['u']['utilisateur'] . "' ORDER BY due_date";
		$res = $this->select($req);
		return $res;
	}
	
	public function getMyConditionsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE person_in_charge = '" . $_SESSION['u']['utilisateur'] . "' AND type = 'conditions' ORDER BY due_date";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE person_in_charge = '" . $_SESSION['u']['utilisateur'] . "' AND type = 'conditions' AND status = '".$filter."' ORDER BY due_date";
		$res = $this->select($req);
		return $res;
	}
	
	public function getConditionsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE type = 'conditions' ORDER BY due_date";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE type = 'conditions' AND status = '".$filter."' ORDER BY due_date";
		$res = $this->select($req);
		return $res;
	}
	
	public function getMyConstructionsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE person_in_charge = '" . $_SESSION['u']['utilisateur'] . "' AND type = 'constructions' ORDER BY due_date";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE person_in_charge = '" . $_SESSION['u']['utilisateur'] . "' AND type = 'constructions' AND status = '".$filter."' ORDER BY due_date";
		$res = $this->select($req);
		return $res;
	}
	
	public function getConstructionsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE type = 'constructions' ORDER BY due_date";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE type = 'constructions' AND status = '".$filter."' ORDER BY due_date";
		$res = $this->select($req);
		return $res;
	}
	
	public function getMyExploitationsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE person_in_charge = '" . $_SESSION['u']['utilisateur'] . "' AND type = 'exploitations' ORDER BY due_date";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE person_in_charge = '" . $_SESSION['u']['utilisateur'] . "' AND type = 'exploitations' AND status = '".$filter."' ORDER BY due_date";
		$res = $this->select($req);
		return $res;
	}
	
	public function getExploitationsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE type = 'exploitations' ORDER BY due_date";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE type = 'exploitations' AND status = '".$filter."' ORDER BY due_date";
		$res = $this->select($req);
		return $res;
	}
	
	public function getMyTeamConditionsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE person_in_charge IN (SELECT `login` FROM `rc_users` WHERE `team` = ".$_SESSION['u']['team'].") AND type = 'conditions' ORDER BY due_date";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE person_in_charge IN (SELECT `login` FROM `rc_users` WHERE `team` = ".$_SESSION['u']['team'].") AND status = '".$filter."' AND type = 'conditions' ORDER BY due_date";
		$res = $this->select($req);
		return $res;
	}
	
	public function getMyTeamConstructionsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE person_in_charge IN (SELECT `login` FROM `rc_users` WHERE `team` = ".$_SESSION['u']['team'].") AND type = 'constructions' ORDER BY due_date";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE person_in_charge IN (SELECT `login` FROM `rc_users` WHERE `team` = ".$_SESSION['u']['team'].") AND type = 'constructions' AND status = '".$filter."' ORDER BY due_date";
		$res = $this->select($req);
		return $res;
	}
	
	public function getMyTeamExploitationsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE person_in_charge IN (SELECT `login` FROM `rc_users` WHERE `team` = ".$_SESSION['u']['team'].") AND type = 'exploitations' ORDER BY due_date";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE person_in_charge IN (SELECT `login` FROM `rc_users` WHERE `team` = ".$_SESSION['u']['team'].") AND status = '".$filter."' AND type = 'exploitations' ORDER BY due_date";
		$res = $this->select($req);
		return $res;
	}
	
	
	
	public function getMyTeamTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE  = '" . $_SESSION['u']['utilisateur'] . "' ORDER BY due_date";
		$res = $this->select($req);
		return $res;
	}
	
	public function getAllConditions($filter = null, $person = null) {
		global $date_convention;
		//var_dump($date_convention);
		if(!is_null($filter)) {
			$date = date("Y-m-d", strtotime(date("Y-m-d", strtotime($date_convention)) . " +$filter month"));
			if(!is_null($person)) {
				switch($person) {
					case 'me' : $req = "SELECT * FROM $this->table WHERE type = 'conditions' AND person_in_charge = '".$_SESSION['u']['utilisateur']."' AND deadline BETWEEN '$date_convention' AND '$date' ORDER BY due_date"; break;
					case 'team' : $req = "SELECT * FROM $this->table WHERE type = 'conditions' AND person_in_charge IN (SELECT `login` FROM `rc_users` WHERE `team` = ".$_SESSION['u']['team'].") AND deadline BETWEEN '$date_convention' AND '$date' ORDER BY due_date"; break;
					case 'all' : $req = "SELECT * FROM $this->table WHERE type = 'conditions' AND deadline BETWEEN '$date_convention' AND '$date' ORDER BY due_date"; break;
				}
			} else 
				$req = "SELECT * FROM $this->table WHERE type = 'conditions' AND deadline BETWEEN '$date_convention' AND '$date' ORDER BY due_date";
		} else {
			$req = "SELECT * FROM $this->table WHERE type = 'conditions' ORDER BY due_date";
		}
		//var_dump($req); die;
		$res = $this->select($req);
		return $res;
	}
	
	public function getAllConstructions($filter = null, $person = null) {
		global $date_convention;
		//var_dump($date_convention);
		if(!is_null($filter)) {
			if(!is_null($person)) {
				switch($person) {
					case 'me' : $req = "SELECT * FROM $this->table WHERE type = 'constructions' AND person_in_charge = '".$_SESSION['u']['utilisateur']."' AND sector = '".$filter."' ORDER BY due_date"; break;
					case 'team' : $req = "SELECT * FROM $this->table WHERE type = 'constructions' AND person_in_charge IN (SELECT `login` FROM `rc_users` WHERE `team` = ".$_SESSION['u']['team'].") AND sector = '".$filter."' ORDER BY due_date"; break;
					case 'all' : $req = "SELECT * FROM $this->table WHERE type = 'constructions' AND sector = '".$filter."' ORDER BY due_date"; break;
				}
			} else 
				$req = "SELECT * FROM $this->table WHERE type = 'constructions' AND sector = '".$filter."' ORDER BY due_date";
		} else {
			$req = "SELECT * FROM $this->table WHERE type = 'constructions' ORDER BY due_date";
		}
		//var_dump($req); die;
		$res = $this->select($req);
		return $res;
	}
	public function getAllTasks($filter = null) {
		if($_SESSION['u']['idgroupe'] == 2)
			$req = "SELECT * FROM $this->table WHERE person_in_charge = '" . $_SESSION['u']['utilisateur'];
		else if($_SESSION['u']['idgroupe'] ==3 )
			$req = "SELECT * FROM $this->table";
		else
			$req = "SELECT * FROM $this->table WHERE is_assigned_to = '" . $_SESSION['u']['utilisateur'];
		if(is_null($filter))
			$filter = '';
		else if(is_array($filter)) {
			foreach($filter as $f => $cond) {
				if($cond == '')
					unset($filter[$f]);
			}
			if(empty($filter)) {
				
			} else {
				if(isset($filter['view'])) unset($filter['view']);
				//$req .= ' WHERE ';
				if($_SESSION['u']['idgroupe'] ==3) $req .= ' WHERE 1=1 ';
				foreach($filter as $f => $cond) {
					$req .= ' AND ' . $f . " = '" . $cond . "' ";
				}
				//var_dump($filter);
			}
		}
	//var_dump($req); die;
		$res = $this->select($req);
		return $res;
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>