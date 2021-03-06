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
		
		$this->step = 10;
		parent::__construct(__CLASS__);
	}
	
	public function getMyTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE person_in_charge = '" . $_SESSION['u']['utilisateur'] . "' ORDER BY id";
		$res = $this->select($req);
		return $res;
	}
	
	public function getMyConditionsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE  person_in_charge = '" . $_SESSION['u']['utilisateur'] . "' AND type = 'conditions' ORDER BY id" ;
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE person_in_charge = '" . $_SESSION['u']['utilisateur'] . "' AND type = 'conditions' AND status = '".$filter."' ORDER BY id";
		$res = $this->select($req);
		return $res;
		
	
	}
	
	
	
	
	public function getConditionsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE type = 'conditions' ORDER BY deadline  DESC";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE type = 'conditions' AND status = '".$filter."' ORDER BY deadline  DESC";
		$res = $this->select($req);
		return $res;
	}
	
	public function getMyConstructionsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE person_in_charge = '" . $_SESSION['u']['utilisateur'] . "' AND type = 'constructions' ORDER BY id";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE person_in_charge = '" . $_SESSION['u']['utilisateur'] . "' AND type = 'constructions' AND status = '".$filter."' ORDER BY id";
		$res = $this->select($req);
		return $res;
	}
	
	public function getConstructionsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE type = 'constructions' ORDER BY deadline  DESC";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE type = 'constructions' AND status = '".$filter."' ORDER BY deadline  DESC";
		$res = $this->select($req);
		return $res;
	}
	
	public function getMyExploitationsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE person_in_charge = '" . $_SESSION['u']['utilisateur'] . "' AND type = 'exploitations' ORDER BY id";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE person_in_charge = '" . $_SESSION['u']['utilisateur'] . "' AND type = 'exploitations' AND status = '".$filter."' ORDER BY id";
		$res = $this->select($req);
		return $res;
	}
	
	public function getExploitationsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE type = 'exploitations' ORDER BY deaDline DESC";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE type = 'exploitations' AND status = '".$filter."' ORDER BY deaDline DESC";
		$res = $this->select($req);
		return $res;
	}
	
	public function getMyTeamConditionsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE person_in_charge IN (SELECT `login` FROM `rc_users` WHERE `team` = ".$_SESSION['u']['team'].") AND type = 'conditions' ORDER BY id";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE person_in_charge IN (SELECT `login` FROM `rc_users` WHERE `team` = ".$_SESSION['u']['team'].") AND status = '".$filter."' AND type = 'conditions' ORDER BY id";
		$res = $this->select($req);
		return $res;
	}
	
	
		public function getReportsTasksConditionsDocument($filter = null) {
		$req = "SELECT * FROM $this->table WHERE type = 'conditions' AND sector_new ='Document' ORDER BY due_date_main_task";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE sector_new = '".$filter."' AND type = 'conditions'  AND sector_new ='Document' ORDER BY due_date_main_task";
		$res = $this->select($req);
		return $res;
	}
	
	public function getReportsTasksConditionsRail($filter = null) {
		$req = "SELECT * FROM $this->table WHERE type = 'conditions' AND sector_new ='rail' ORDER BY due_date_main_task";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE sector_new = '".$filter."' AND type = 'conditions'  AND sector_new ='rail' ORDER BY due_date_main_task";
		$res = $this->select($req);
		return $res;
	}
	
	
	public function getReportsTasksConditionsMine($filter = null) {
		$req = "SELECT * FROM $this->table WHERE type = 'conditions' AND sector_new ='mine' ORDER BY due_date_main_task";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE sector_new = '".$filter."' AND type = 'conditions'  AND sector_new ='mine' ORDER BY due_date_main_task";
		$res = $this->select($req);
		return $res;
	}
	
	
	
		public function getReportsTasksConditionsPort($filter = null) {
		$req = "SELECT * FROM $this->table WHERE type = 'conditions' AND sector_new ='port' ORDER BY due_date_main_task";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE sector_new = '".$filter."' AND type = 'conditions'  AND sector_new ='port' ORDER BY due_date_main_task";
		$res = $this->select($req);
		return $res;
	}
	
	
	public function getReportsConstructions($filter = null) {
		$req = "SELECT * FROM $this->table WHERE type = 'constructions' ORDER BY due_date_main_task";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table  WHERE type = 'constructions' AND sector_new = '".$filter."' ORDER BY due_date_main_task";
		$res = $this->select($req);
		return $res;
	}
	
	
	
		public function getReportsExploitations($filter = null) {
		$req = "SELECT * FROM $this->table WHERE type = 'exploitations' ORDER BY due_date_main_task";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table  WHERE type = 'exploitations' AND sector_new = '".$filter."' ORDER BY due_date_main_task";
		$res = $this->select($req);
		return $res;
	}
	
	
	
	
	
	
	
	public function getMyTeamConstructionsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE person_in_charge IN (SELECT `login` FROM `rc_users` WHERE `team` = ".$_SESSION['u']['team'].") AND type = 'constructions' ORDER BY id";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE person_in_charge IN (SELECT `login` FROM `rc_users` WHERE `team` = ".$_SESSION['u']['team'].") AND type = 'constructions' AND status = '".$filter."' ORDER BY id";
		$res = $this->select($req);
		return $res;
	}
	
	public function getMyTeamExploitationsTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE person_in_charge IN (SELECT `login` FROM `rc_users` WHERE `team` = ".$_SESSION['u']['team'].") AND type = 'exploitations' ORDER BY id";
		if(!is_null($filter))
			$req = "SELECT * FROM $this->table WHERE person_in_charge IN (SELECT `login` FROM `rc_users` WHERE `team` = ".$_SESSION['u']['team'].") AND status = '".$filter."' AND type = 'exploitations' ORDER BY id";
		$res = $this->select($req);
		return $res;
	}
	
	
	
	public function getMyTeamTasks($filter = null) {
		$req = "SELECT * FROM $this->table WHERE  = '" . $_SESSION['u']['utilisateur'] . "' ORDER BY id";
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
					case 'me' : $req = "SELECT * FROM $this->table WHERE type = 'conditions' AND person_in_charge = '".$_SESSION['u']['utilisateur']."' AND deadline BETWEEN '$date_convention' AND '$date' ORDER BY id"; break;
					case 'team' : $req = "SELECT * FROM $this->table WHERE type = 'conditions' AND person_in_charge IN (SELECT `login` FROM `rc_users` WHERE `team` = ".$_SESSION['u']['team'].") AND deadline BETWEEN '$date_convention' AND '$date' ORDER BY id"; break;
					case 'all' : $req = "SELECT * FROM $this->table WHERE type = 'conditions' AND deadline BETWEEN '$date_convention' AND '$date' ORDER BY id"; break;
				}
			} else 
				$req = "SELECT * FROM $this->table WHERE type = 'conditions' AND sector = '$filter' ORDER BY id";
		} else {
			$req = "SELECT * FROM $this->table WHERE type = 'conditions' ORDER BY id";
		}
		//var_dump($req); die;
		$res = $this->select($req);
		return $res;
	}
	
public function getNamePerson($login) {
  $req = "SELECT * FROM rc_users WHERE login = '$login' LIMIT 1";
  $res = $this->select($req);
  return $res[0]->noms;
 }
	
	
	
	
	
	
	
	public function getAllConstructions($filter = null, $person = null) {
		global $date_convention;
		//var_dump($date_convention);
		if(!is_null($filter)) {
			if(!is_null($person)) {
				switch($person) {
					case 'me' : $req = "SELECT * FROM $this->table WHERE type = 'constructions' AND person_in_charge = '".$_SESSION['u']['utilisateur']."' AND sector = '".$filter."' ORDER BY id"; break;
					case 'team' : $req = "SELECT * FROM $this->table WHERE type = 'constructions' AND person_in_charge IN (SELECT `login` FROM `rc_users` WHERE `team` = ".$_SESSION['u']['team'].") AND sector = '".$filter."' ORDER BY id"; break;
					case 'all' : $req = "SELECT * FROM $this->table WHERE type = 'constructions' AND sector = '".$filter."' ORDER BY id"; break;
				}
			} else 
				$req = "SELECT * FROM $this->table WHERE type = 'constructions' AND sector = '".$filter."' ORDER BY id ASC";
		} else {
			$req = "SELECT * FROM $this->table WHERE type = 'constructions' ORDER BY id";
		}
		//var_dump($req); die;
		$res = $this->select($req);
		return $res;
	}
	
	// fonction qui renvoie les tasks dont le type est exploitions ajouter par thalex
	public function getAllExploitations($filter = null, $person = null) {
		global $date_convention;
		//var_dump($date_convention);
		if(!is_null($filter)) {
			if(!is_null($person)) {
				switch($person) {
					case 'me' : $req = "SELECT * FROM $this->table WHERE type = 'exploitations' AND person_in_charge = '".$_SESSION['u']['utilisateur']."' AND sector = '".$filter."' ORDER BY id"; break;
					case 'team' : $req = "SELECT * FROM $this->table WHERE type = 'exploitations' AND person_in_charge IN (SELECT `login` FROM `rc_users` WHERE `team` = ".$_SESSION['u']['team'].") AND sector = '".$filter."' ORDER BY id"; break;
					case 'all' : $req = "SELECT * FROM $this->table WHERE type = 'exploitations' AND sector = '".$filter."' ORDER BY id"; break;
				}
			} else 
				$req = "SELECT * FROM $this->table WHERE type = 'exploitations' AND sector = '".$filter."' ORDER BY id ASC";
		} else {
			$req = "SELECT * FROM $this->table WHERE type = 'exploitations' ORDER BY id";
		}
		//var_dump($req); die;
		$res = $this->select($req);
		return $res;
	}
	//fin fonction renvoie les tasks************************************************ 
	
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
				if($_SESSION['u']['idgroupe'] ==3) 
				$req .= ' WHERE 1=1 ';
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