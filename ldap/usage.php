<?php 
echo phpinfo();
$host = "192.168.56.25";
if (!$ldapconn = ldap_connect($host)) {
   echo "Error! Could not connect to LDAP host $host\n";
}
session_start ();
require_once 'class.PHPLdap.php';
$ldap = new PHPLdap();
$ldap->setLDAPServer('192.168.56.25'); // LDAP Server Address
$ldap->setLDAPTLD('.local'); // Top-level domain such as .com and .net and .org
$ldap->setLDAPDomain('CAMIRON'); //Second-level domain (SLD) names. These are the names directly to the left of .com, .net
var_dump($ldap);// die;
$users = $ldap->listAllUsers();
// $ldap->setLDAPUser(''); // LDAP user to perform LDAP requests
// $ldap->setLDAPPassword(''); // pass word for the LDAP user
// $ldap->connect(); // connect to the ldap server


// Simple logi script using the PHPLdap class

// $groupName = 'IT';

// include ('login.php');


// if ($ldap->loggedIn ())
// {
	// ?>You are logged in <?php
	
	// if ($ldap->isMemberOfGroup ( $_SESSION ['username'], $groupName )){
		// ?>to the given group <?=$groupName?><?php
	// }else{
		// ?>but you are not a member of the given group <?=$groupName?><?php
	// }
	
// }else{
	// ?>You are not logged in. Please use the form above  to gain access<?php
// }

// ?>