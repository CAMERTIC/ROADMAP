<?php
// Tout début du code PHP. Situé en haut de la page web
ini_set("display_errors",0);error_reporting(0);
$s = new settings;
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$_POST['id'] = 1;
	$s->saveRecord($_POST);
}

	
	$settings = $s->getAllRecords();
	
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
                            <span class="field"><input type="text" name="r1_feasability_study_status" id="r1_feasability_study_status" class="smallinput" value="<?php echo $settings[0]->r1_feasability_study_status; ?>" /></span>
                        </p>
						
						<p style="padding:10px 0;">
							<label>Comment</label>
							<textarea id="r1_feasability_study_cmt" name="r1_feasability_study_cmt" cols="20" rows="3"><?php echo $settings[0]->r1_feasability_study_cmt; ?></textarea>
						</p>
                        
						<p style="height : 90px">
                        	<label>Submit to the State the Commitment Letter for the Debt required by the Project %</label>
                            <span class="field"><input type="text" name="r1_p2_status" id="r1_p2_status" class="smallinput" value="<?php echo $settings[0]->r1_p2_status; ?>" /></span>
                        </p>
                        <p style="padding:10px 0;">
							<label>Comment</label>
							<textarea id="r1_p2_cmt" name="r1_p2_cmt"  cols="20" rows="3" value="<?php echo $settings[0]->r1_p2_cmt; ?>"></textarea>
						</p>
                        <p>
                        	<label>Complete the Project Financing %</label>
                            <span class="field"><input type="text" name="r1_p3_status" id="r1_p3_status" class="smallinput" /></span>
                        </p>
						
						<p style="padding:10px 0;">
							<label>Comment</label>
							<textarea id="r1_p3_cmt" name="r1_p3_cmt"  cols="20" rows="3"></textarea>
						</p>
						
						<p>
                        	<label>Incorporate the Project Companies %</label>
                            <span class="field"><input type="text" name="r1_p4_status" id="r1_p4_status" class="smallinput" /></span>
                        </p>
						
						<p style="padding:10px 0;">
							<label>Comment</label>
							<textarea id="r1_p4_cmt" name="r1_p4_cmt"  cols="20" rows="3"></textarea>
						</p>
						
						<p>
                        	<label>Execute all Agreements necessary for the Project %</label>
                            <span class="field"><input type="text" name="r1_p5_status" id="r1_p5_status" class="smallinput" /></span>
                        </p>
						
						<p style="padding:10px 0;">
							<label>Comment</label>
							<textarea id="r1_p5_cmt" name="r1_p5_cmt"  cols="20" rows="3"></textarea>
						</p>
						
						<p>
                        	<label>Agree with the Government on a list of pre-approved Qualified Contractors %</label>
                            <span class="field"><input type="text" name="r1_p6_status" id="r1_p6_status" class="smallinput" /></span>
                        </p>
						
						<p style="padding:10px 0;">
							<label>Comment</label>
							<textarea id="r1_p6_cmt" name="r1_p6_cmt"  cols="20" rows="3"></textarea>
						</p>
						
						<p>
                        	<label>Completion of the Convention and issuance of the Mining Permit %</label>
                            <span class="field"><input type="text" name="r1_p7_status" id="r1_p7_status" class="smallinput" /></span>
                        </p>
						
						<p style="padding:10px 0;">
							<label>Comment</label>
							<textarea id="r1_p7_cmt" name="r1_p7_cmt"  cols="20" rows="3"></textarea>
						</p>
						
						<input type="submit" value="Mettre a jour" />
						
                    </form>
					
                    <br />

    </div><!--subcontent-->
</div>
</div>
<script type="text/javascript" src="js/users.js"></script>