<?php
/**
* @author Leigh Edwards
* @version 1.32
* @name PHPLdap
**/

class PHPLdap {
	private $LDAPServer = '';
	private $LDAPDomain = '';
	private $TLD = "";
	private $LDAPUser = '';
	private $LDAPPassword = '';
	
	private $connection = null;

	function __construct () {
	}
	/**
	 * method to connect to the ldap server
	 */
	public function connect (){
		$this->connection = ldap_connect ( $this->LDAPServer );
		ldap_set_option ( $this->connection, LDAP_OPT_PROTOCOL_VERSION, 3 );
		ldap_set_option ( $this->connection, LDAP_OPT_REFERRALS, 0 );
		$ldap_bind = ldap_bind ( $this->connection, $this->LDAPDomain."\\".$this->LDAPUser, $this->LDAPPassword );
	}

	/**
	 * method to set the ldap domain to query against
	 * @param string $domain
	 */
	public function setLDAPDomain($domain){
		$this->LDAPDomain = $domain;
	}
	
	/**
	 * method to set the top level domain of the ldap domain being queried 
	 * @param string $tld
	 */
	public function setLDAPTLD($tld){
		$this->TLD = $tld;
	}
	
	/**
	 * method to set the ip of the ldap server
	 * @param string $ip
	 */
	public function setLDAPServer($ip){
		$this->LDAPServer = $ip;
	}
	
	/**
	 * method to set the domain user that will be performing the ldap queries
	 * @param string $user
	 */
	public function setLDAPUser($user){
		$this->LDAPUser = $user;
	}
	
	/**
	 * set the password for the domain user that will be performing the ldap requests
	 * @param string $pw
	 */
	public function setLDAPPassword($pw){
		$this->LDAPPassword = $pw;
	}
	
	/**
	 * method to test username and password combo against that the ldap server/domain
	 * 
	 * if a group is given then this method will also test if the user is a member of that group as part of the login attempt
	 * login will fail if the user is not part of the given group
	 * 
	 * @param string $username
	 * @param string $password
	 * @param string $group optional
	 */
	public function login ($username, $password, $group = false) {
		
		$login = false;
		$full_username = $this->LDAPDomain . '\\' . $username;
		$login = @ldap_bind ( $this->connection, $full_username, $password );
		if ($login) {
			if ($group != false) {
				if ($this->isMemberOfGroup ( $username, $group )) {
					$_SESSION ['login'] = true;
					$_SESSION ['username'] = strtolower ( $username );
					$login = true;
				}
			} else {
				$_SESSION ['login'] = true;
				$_SESSION ['username'] = strtolower ( $username );
				$login = true;
			}
			$_SESSION ['userFullName'] = $this->getFullNameFromUsername ( $_SESSION ['username'] );
			$_SESSION ['email'] = $this->getEmailFromUsername ( $_SESSION ['username'] );
			$_SESSION ['clientHostName'] = gethostbyaddr ( getenv ( 'REMOTE_ADDR' ) );
		}
		return $login;
	}

	/**
	 * method to log the user out
	 */
	public function logout () {
		if (isset ( $_SESSION ['login'] )) {
			unset ( $_SESSION ['login'] );
			unset ( $_SESSION ['username'] );
			unset ( $_SESSION ['userFullName'] );
			unset ( $_SESSION ['email'] );
			unset ( $_SESSION ['clientHostName'] );
		}
		return true;
	}
	
	/**
	 * method to test if the user is logged in
	 * Enter description here ...
	 */
	public function isLoggedIn () {
		if (isset ( $_SESSION ['login'] ) && isset ( $_SESSION ['username'] )) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * method to get a list of all members of the given ldap group
	 * @param string $group
	 */
	private function getMembersOfGroup ($group) {
		$members = array ();
		$sr = ldap_search ( $this->connection, "dc=".$this->LDAPDomain.",dc=".$this->TLD, "cn=$group" );
		if ($sr != false) {
			$entry = ldap_first_entry ( $this->connection, $sr );
			if ($entry != false) {
				$attrs = ldap_get_attributes ( $this->connection, $entry );
				if ($attrs != false) {
					$values = ldap_get_values ( $this->connection, $entry, "member" );
					if ($values != false) {
						for ($i = 0; $i < $values ['count']; $i ++) {
							if (substr_count ( $values [$i], 'OU=User Groups' ) == 0) {
								$user_dn = explode ( ',', $values [$i] );
								$sr = ldap_search ( $this->connection, "dc=".$this->LDAPDomain.",dc=".$this->TLD, $user_dn [0] );
								$entry = ldap_first_entry ( $this->connection, $sr );
								$user_id = ldap_get_values ( $this->connection, $entry, "sAMAccountName" );
								if (! in_array ( $user_id [0], $members )) {
									$members [] = $user_id [0];
								}
							} else {
								$group_dn = explode ( ',', $values [$i] );
								$group = substr_replace ( $group_dn [0], '', 0, 3 );
								$group_members = $this->getMembersOfGroup ( $group );
								for ($c = 0; $c < count ( $group_members ); $c ++) {
									if (! in_array ( $group_members [$c], $members )) {
										$members [] = $group_members [$c];
									}
								}
							}
						}
					}
				}
			}
		}
		return $members;
	}

	/**
	 * method to test if the given username is a member of the given ldap group
	 * @param string $username
	 * @param string $group
	 */
	public function isMemberOfGroup ($username, $group) {
		$members = $this->getMembersOfGroup ( $group );
		if (in_array ( $username, $members )) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * method to display a list of members in the given ldap group
	 * @param string $group
	 */
	public function printMembersOfGroup ($group) {
		$members = $this->getMembersOfGroup ( $group );
		for ($i = 0; $i < count ( $members ); $i ++) {
			echo $this->getFullNameFromUsername ( $members [$i] ) . "<br />";
		}
	}

	/**
	 * method to fet the ful name of the given ldap user
	 * @param string $username
	 */
	private function getFullNameFromUsername ($username) {
		$sr = ldap_search ( $this->connection, "dc=".$this->LDAPDomain.",dc=".$this->TLD, "sAMAccountName=$username" );
		$entry = ldap_first_entry ( $this->connection, $sr );
		$full_name = ldap_get_values ( $this->connection, $entry, "displayName" );
		return $full_name [0];
	}

	/**
	 * method to returb the email address of the given ldap user
	 * @param string $username
	 */
	private function getEmailFromUsername ($username) {
		$sr = ldap_search ( $this->connection, "dc=".$this->LDAPDomain.",dc=".$this->TLD, "sAMAccountName=$username" );
		$entry = ldap_first_entry ( $this->connection, $sr );
		$email = ldap_get_values ( $this->connection, $entry, "mail" );
		return $email [0];
	}

	/**
	 * method to return a list of all users on the ldap server
	 */
	public function listAllUsers () {
		$users = array ();
		$usernames = $this->getMembersOfGroup ( 'All Users' );
		for ($i = 0; $i < count ( $usernames ); $i ++) {
			$full_name = $this->getFullNameFromUsername ( $usernames [$i] );
			$users [$i] = $full_name;
		}
		return $users;
	}

	/**
	 * method to return the contact details of ldap users 
	 * based on the given filter and search values
	 * @param string $filter
	 * @param string $search
	 */
	public function getPhonebook ($filter, $search) {
		$users = false;
		switch ($filter) {
			case 'all' :
				$parameter = "(&(!(useraccountcontrol:1.2.840.113556.1.4.803:=2))(|(sn=$search*)(givenname=$search*)(physicaldeliveryofficename=$search*)(telephonenumber=$search*)))";
				break;
			case 'first_name' :
				$parameter = "(givenname=$search*)";
				break;
			case 'last_name' :
				$parameter = "(sn=$search*)";
				break;
			case 'extension' :
				$parameter = "(telephonenumber=$search*)";
				break;
			case 'department' :
				$parameter = "(physicaldeliveryofficename=*$search*)";
				break;
			case 'radio' :
				$parameter = "(pager=*$search*)";
				break;
		}
		$values = array (
								"cn",
								"telephonenumber",
								"physicaldeliveryofficename",
								"title",
								"mail",
								"givenname",
								"sn",
								"pager",
								"info",
								"distinguishedName",
								"OU" 
		);
		$base_dn [] = "OU=Telephone Contacts,OU=NEW AD STRUCTURE,DC=".$this->LDAPDomain.",dc=".$this->TLD;
		$base_dn [] = "OU=Generic Accounts,OU=Users,OU=NEW AD STRUCTURE,DC=".$this->LDAPDomain.",dc=".$this->TLD;
		$total = 0;
		for ($a = 0; $a < count ( $base_dn ); $a ++) {
			$sr = ldap_search ( $this->connection, $base_dn [$a], $parameter, $values );
			$result = ldap_get_entries ( $this->connection, $sr );
			for ($i = 0; $i < $result ['count']; $i ++) {
				for ($c = 0; $c < $result [$i] ["count"]; $c ++) {
					$users [$total] [$result [$i] [$c]] = $result [$i] [$result [$i] [$c]] [0];
				}
				$total ++;
			}
		}
		return $users;
	}
}
?>
