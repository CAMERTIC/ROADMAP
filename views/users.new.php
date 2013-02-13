<?php
	$user_ldap = new ldap_user();
	$users = $user_ldap->getAllRecords();
	
	$team = new team();
	$teams = $team->getAllRecords();
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
                        	<label>Names</label>
                            <span class="field"><input type="text" name="noms" id="noms" class="smallinput" /></span>
                        </p>
						<p>
                        	<label>Login</label>
                            <span class="field"><input type="text" name="login" id="login" class="smallinput" /></span>
                        </p>
                        
                        <p>
                        	<label>password</label>
                            <span class="field"><input type="password" name="pw" id="pw" class="smallinput" /></span>
                        </p>
                        
						<p>
                        	<label>Email</label>
                            <span class="field"><input type="text" name="email" id="email" class="smallinput" /></span>
                        </p>
						
                        <p>
                        	<label>Role</label>
                            <span class="field">
								<select name="gp" id="gp">
									<option value="2">Manager</option>
									<option value="1">User</option>
									<option value="5">Overview Account</option>
								</select>
							</span>
                        </p>
                        
                        <p id="">
                        	<label>Select a Team</label>
                            <span class="field">
								<select name="team" id="team">
									<option value="">Choose One</option>
								<?php foreach($teams as $u) { ?>
									<option value="<?php echo $u->id ?>"><?php echo $u->name; ?></option>
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