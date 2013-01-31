<?php
	$user = new rc_users();
	$user = $user->getRecord($_GET['login']);
	
	$team = new team();
	$teams = $team->getAllRecords();
	//var_dump($users);
?>
<div class="centercontent">
	<div id="contentwrapper" class="contentwrapper">
		<div id="basicform" class="subcontent">
                                
                    <div class="contenttitle2">
                        <h3>Update a user</h3>
                    </div><!--contenttitle-->
                    <div class="notibar msgsuccess hidden">
                        <a class="close"></a>
                        <p>This is a success message.</p>
                    </div><!-- notification msgsuccess -->
					<form class="stdform stdform2" id="userform" method="post" action="">
                    	<p>
                        	<label>Names</label>
                            <span class="field"><input type="text" name="noms" id="noms" class="smallinput" value="<?php echo $user->noms ?>" /></span>
                        </p>
						<p>
                        	<label>Login</label>
                            <span class="field"><input type="text" name="login" id="login" class="smallinput" value="<?php echo $user->login ?>" /></span>
                        </p>
                        
                        <p>
                        	<label>password</label>
                            <span class="field"><input type="password" name="pw" id="pw" class="smallinput" value="<?php echo $user->pw ?>" /></span>
                        </p>
                        
						<p>
                        	<label>Email</label>
                            <span class="field"><input type="text" name="email" id="email" class="smallinput" value="<?php echo $user->email ?>" /></span>
                        </p>
						
                        <p>
                        	<label>Role</label>
                            <span class="field">
								<select name="gp" id="gp">
									<option value="">Choose One</option>
									<option <?php if($user->gp == 2) echo "SELECTED"; ?> value="2">Manager</option>
									<option <?php if($user->gp == 1) echo "SELECTED"; ?> value="1">User</option>
								</select>
							</span>
                        </p>
                        
                        <p id="">
                        	<label>Select a Team</label>
                            <span class="field">
								<select name="team" id="team">
									<option value="">Choose One</option>
									<?php foreach($teams as $u) { ?>
									<option <?php if($user->team == $u->id) echo "SELECTED"; ?> value="<?php echo $u->id ?>"><?php echo $u->name; ?></option>
									<?php } ?>
								</select>
							</span>
                        </p>
                        
                        <p class="stdformbutton">
                        	<button type="button" class="submit radius2" onclick="updateUser()">Update</button>
                            <input type="reset" class="reset radius2" value="Cancel" />
                            <input type="hidden" name="action" value="edit" />
                        </p>
                    </form>
					
                    <br />

    </div><!--subcontent-->
</div>
</div>
<script type="text/javascript" src="js/users.js"></script>