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

class comment extends entity {
	
	public $task_id;
	
	public function __construct($id = null) {
		if(!is_null($id))
			$this->task_id = $id;
		parent::__construct(__CLASS__);
	}
	
	public function getLastComment($id) {
		$req = "SELECT * FROM $this->table WHERE id_task = '" . $id . "' ORDER BY id DESC LIMIT 1";
		//var_dump($req); die;
		$res = $this->select($req);
		$comment = '';
		if(!empty($res)) {
			$comment = $res[0]->text;
		$by = '';
		$user = new rc_users();
		$user->getUserDatas($res[0]->id_user);
		$comment = $comment . '<br />by ' . $user->userDatas->noms;
		//var_dump($user->userDatas->login); die;
		}
		return $comment;
	}
	
	public function getLastComments($id, $nb = null) {
	
	}
	
	public function getComments($id) {
		
	}
	
	public function setComment($comment) {
		//echo 
		$array = array('text' => $comment, 
						'date' => '', 
						'id_task' => $this->task_id, 
						'id_user' => $_SESSION['u']['utilisateur'],
						'date' => date("Y-m-d H:i:s")
						);
		$this->newRecord($array);
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>