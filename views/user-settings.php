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
                        <h3>Update password</h3>
                    </div><!--contenttitle-->
                    <div class="notibar msgsuccess hidden">
                        <a class="close"></a>
                        <p>This is a success message.</p>
                    </div><!-- notification msgsuccess -->
					<form class="stdform stdform2" id="userform" method="post" action="">
                    	<p>
                        	<label>Password</label>
                            <span class="field"><input type="password" name="pw" id="pw" class="smallinput" /></span>
                        </p>
                        
						<p>
                        	<label>Confirm password</label>
                            <span class="field"><input type="password" name="cpw" id="cpw" class="smallinput" /></span>
                        </p>
						
                        <p class="stdformbutton">
                        	<button  class="submit radius2">Update</button>
                            <input type="reset" class="reset radius2" value="Cancel" />
                        </p>
                    </form>
					
                    <br />

    </div><!--subcontent-->
</div>
</div>
<script type="text/javascript" src="js/users.js"></script>