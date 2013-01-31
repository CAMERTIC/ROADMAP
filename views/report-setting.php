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
                        <h3>Set Reports value</h3>
                    </div><!--contenttitle-->
                    <div class="notibar msgsuccess hidden">
                        <a class="close"></a>
                        <p>This is a success message.</p>
                    </div><!-- notification msgsuccess -->
					<form class="stdform stdform2" id="userform" method="post" action="">
                    	
                        
                        <p>
                        	<label>Delivery of an update Feasibility Study %</label>
                            <span class="field"><input type="text" name="6months" id="6months" class="smallinput" /></span>
                        </p>
						
						<p style="padding:10px 0;">
							<label>Comment</label>
							<textarea id="6monthscomment" name="6monthscomment"  cols="20" rows="3"></textarea>
						</p>
                        
						<p style="height : 90px">
                        	<label>Submit to the State the Commitment Letter for the Debt required by the Project %</label>
                            <span class="field"><input type="text" name="9months" id="9months" class="smallinput" /></span>
                        </p>
                        <p style="padding:10px 0;">
							<label>Comment</label>
							<textarea id="9monthscomment" name="9monthscomment"  cols="20" rows="3"></textarea>
						</p>
                        <p>
                        	<label>Complete the Project Financing %</label>
                            <span class="field"><input type="text" name="6months" id="6months" class="smallinput" /></span>
                        </p>
						
						<p style="padding:10px 0;">
							<label>Comment</label>
							<textarea id="" name=""  cols="20" rows="3"></textarea>
						</p>
						
						<p>
                        	<label>Incorporate the Project Companies %</label>
                            <span class="field"><input type="text" name="6months" id="6months" class="smallinput" /></span>
                        </p>
						
						<p style="padding:10px 0;">
							<label>Comment</label>
							<textarea id="" name=""  cols="20" rows="3"></textarea>
						</p>
						
						<p>
                        	<label>Execute all Agreements necessary for the Project %</label>
                            <span class="field"><input type="text" name="6months" id="6months" class="smallinput" /></span>
                        </p>
						
						<p style="padding:10px 0;">
							<label>Comment</label>
							<textarea id="" name=""  cols="20" rows="3"></textarea>
						</p>
						
						<p>
                        	<label>Agree with the Government on a list of pre-approved Qualified Contractors %</label>
                            <span class="field"><input type="text" name="6months" id="6months" class="smallinput" /></span>
                        </p>
						
						<p style="padding:10px 0;">
							<label>Comment</label>
							<textarea id="" name=""  cols="20" rows="3"></textarea>
						</p>
						
						<p>
                        	<label>Completion of the Convention and issuance of the Mining Permit %</label>
                            <span class="field"><input type="text" name="6months" id="6months" class="smallinput" /></span>
                        </p>
						
						<p style="padding:10px 0;">
							<label>Comment</label>
							<textarea id="" name=""  cols="20" rows="3"></textarea>
						</p>
						
						<input type="submit" value="Update" />
						
                    </form>
					
                    <br />

    </div><!--subcontent-->
</div>
</div>
<script type="text/javascript" src="js/users.js"></script>