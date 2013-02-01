
<div class="centercontent">
	<div id="contentwrapper" class="contentwrapper">
		<div id="basicform" class="subcontent">
                                
                    <div class="contenttitle2">
                        <h3>Update password</h3>
                    </div><!--contenttitle-->
					<?php
							if($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
                    <div class="notibar msginfo">
                        <a class="close"></a>
                        <p>
						<?php
							if($_SERVER['REQUEST_METHOD'] == 'POST') {
								$error = '';
								if($_REQUEST['pw'] == '' || $_REQUEST['cpw'] == '')
									echo $error = 'Your password can not be empty!';
								if($_REQUEST['pw'] != $_REQUEST['cpw'])
									echo $error = 'Incorrect confirmation password';
								if(($_REQUEST['pw'] == $_REQUEST['cpw']) && ($_REQUEST['cpw'] != '')) {
									$user = new rc_users();
									 try {
										@$user->updateRecord(array('login' => $_SESSION['u']['utilisateur'], 'pw' => $_REQUEST['pw']));
									} catch (Exception $e) {
										echo $error = 'Error message : ' . $e->getMessage() . "\n";
									}
								}
								
								if($error == '')
									echo $error = 'Password updated successfully!';
							}
							
						?>
						</p>
                    </div><!-- notification msgsuccess --><?php } ?>
					<form class="stdform stdform2" id="userform" method="post" action="">
                    	<p>
                        	<label>New Password</label>
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