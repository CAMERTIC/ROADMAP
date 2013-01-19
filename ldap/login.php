<?php

$error = array ();

if (isset ( $_REQUEST ['function'] ) && $_REQUEST ['function'] == 'logout') {
	$ldap->logout ();
}
if (isset ( $_POST ['username'] ) && isset ( $_POST ['password'] )) {
	
	if (empty ( $_POST ['username'] )) {
		$error [] = 'The username needs to be set';
	}
	if (empty ( $_POST ['password'] )) {
		$error [] = 'The password needs to be set';
	}
	
	if (count ( $error ) == 0) {
		if (! $ldap->login ( $_POST ['username'], $_POST ['password'] )) {
			$error [] = 'The username and/or password are incorrect<br />';
		} else {
			if (isset ( $_SESSION ['previous_page'] )) {
				header ( 'Location: ' . $_SESSION ['previous_page'] );
			}
		}
	}
}

?>
<h1>Login</h1>
<?php
if ($ldap->loggedIn ()) {
	?>
    Thank you, you are logged in
<br />
<br />
<a class="warning button" href="<?=$_SERVER['PHP_SELF']?>?function=logout">Logout</a>
<br />
<?php
} else {
	
	?>
<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
	<div id="login">
		<label>Username:</label> <input type="text" name="username" /><br /> <label>Password:</label> <input type="password" name="password" /><br /> <br /> <input type="submit" name="submit" value="Login" />
	</div>

</form>
<?php
	if (count ( $error ) > 0) {
		?>
<div>
	<h4>The following errors have occured:</h4>
	<p>
		<?php
		for($i = 0; $i < count ( $error ); $i ++) {
			echo $error [$i] . '<br />';
		}
		?>
		</p>
</div>
<?php
	}
}