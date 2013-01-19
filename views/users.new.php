<?php
	$user_ldap = new ldap_users();
	$users = $user_ldap->getAllRecords();
	//var_dump($users);
?>
<div class="centercontent">
	<div id="contentwrapper" class="contentwrapper">
		<div id="basicform" class="subcontent">
                                
                    <div class="contenttitle2">
                        <h3>Create a new user</h3>
                    </div><!--contenttitle-->
                    <div class="notibar msgsuccess hidden">
                        <a class="close"></a>
                        <p>This is a success message.</p>
                    </div><!-- notification msgsuccess -->
					<form class="stdform stdform2" id="userform" method="post" action="">
                    	<p>
                        	<label>Select a user</label>
                            <span class="field">
								<select name="login" id="login">
									<option value="">Choose One</option>
								<?php foreach($users as $u) { ?>
									<option value="<?php echo $u->username ?>"><?php echo $u->firstname . " " . $u->lastname; ?></option>
								<?php } ?>
								</select>
							</span>
                        </p>
                        
                        <p>
                        	<label>password</label>
                            <span class="field"><input type="password" name="pw" id="pw" class="smallinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Group</label>
                            <span class="field">
								<select name="gp" id="gp">
									<option value="">Choose One</option>
									<option value="1">Manager</option>
									<option value="2">User</option>
								</select>
							</span>
                        </p>
                        
                        <p id="">
                        	<label>Select a manager</label>
                            <span class="field">
								<select name="manager" id="manager">
									<option value="">Choose One</option>
								<?php foreach($users as $u) { ?>
									<option value="<?php echo $u->username ?>"><?php echo $u->firstname . " " . $u->lastname; ?></option>
								<?php } ?>
								</select>
							</span>
                        </p>
                        
                        <p class="stdformbutton">
                        	<button type="button" class="submit radius2" onclick="addUser()">Create</button>
                            <input type="reset" class="reset radius2" value="Cancel" />
                        </p>
                    </form>
					
                    <br />

    </div><!--subcontent-->
</div>
</div>
<script type="text/javascript" src="js/users.js"></script>