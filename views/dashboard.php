

<div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Dashboard</h1>
            <!--<span class="pagedesc">This is a sample description of a page</span>-->
            
            <ul class="hornav">
                <li class="current"><a href="#updates">Updates</a></li>
            </ul>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
        
        	<div id="updates" class="subcontent">
                    <div class="notibar announcement hidden">
                        <a class="close"></a>
                        <h3>Notifications</h3>
                        <p>Your manager has a reply on the alert concerning the task on condition Delivery of an updated Feasibility Study including the Project Economic Model (articles 4.1 and 4.3. (a) (ii)).</p>
                    </div><!-- notification announcement -->
                    
                    <div class="one_third last dashboard_right">
                    
                        <div class="contenttitle2 nomargintop">
                             <h3>Tasks Overview</h3>
                        </div><!--contenttitle-->
                       <?php
	$t = new tasks();
	$cmt = new comment();
	global $app;
	
?>  
    
        <div id="contentwrapper" class="contenttitle2 nomargintop">                                
	    <div class="overviewhead" style="width:720px;">
			
			<div class="overviewselect">
				<select id="overviewselect3" name="status">
					<option value="">Status</option>
					<option <?php if(isset($_GET['status']))if($_GET['status']=='pending') echo "SELECTED"; ?> value="pending">Pending</option>
					<option <?php if(isset($_GET['status']))if($_GET['status']=='in progress') echo "SELECTED"; ?> value="in progress">In progress</option>
					<option <?php if(isset($_GET['status']))if($_GET['status']=='on hold') echo "SELECTED"; ?> value="on hold">On hold</option>
					<option <?php if(isset($_GET['status']))if($_GET['status']=='closed') echo "SELECTED"; ?> value="closed">Closed</option>
				</select>
			</div>
			<h3>Apply Filters: &nbsp;</h3>
		</div><!--overviewhead-->	
		
            <div class="contenttitle2">
				<h3>All My Tasks in Conditions</h3>
			</div>
			<?php
				if(isset($_GET['status']))
					$tasks = $t->getMyConditionsTasks($_GET['status']);
				else
					$tasks = $t->getMyConditionsTasks();
			?>
	       <div style="width:730px; height:400px;overflow:auto;">
                <table style="width:200%" cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con0" />
                        <col class="con0" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Conditions or Category</th>
                            <th class="head1">Required actions or operations</th>
                            <th class="head0">Date for compliance</th>
                            <th class="head1">Party accountable for compliance</th>
                            <th class="head0">Person in charge of action</th>
                            <th class="head1">Due date</th>
                            <th class="head1">Status</th>
                            <th class="head0">Authority accountable for compliance</th>
                            <th colspan="2" class="head0">Input<br />Camiron / State</th>
                            <th class="head1">Output</th>
                            <th class="head0">Risk/Sanction</th>
                            <th class="head1">Last comment</th>
                            <th class="head0">&nbsp;</th>
                        </tr>
                    </thead><!--
                    <tfoot>
                        <tr>
                            <th class="head0"></th>
                            <th class="head1">Browser</th>
                            <th class="head0">Platform(s)</th>
                            <th class="head1">Engine version</th>
                            <th class="head0"></th>
                            <th class="head1">&nbsp;</th>
                        </tr>
                    </tfoot>-->
                    <tbody>
                        <?php foreach($tasks as $ts) { ?>
                        <tr id="<?php echo $ts->id; ?>">
                             <td class="con0"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . $app->replaceDefinitions($ts->cond_cat_title) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo $app->replaceDefinitions($ts->cond_cat_title); ?> </td>
                            <td class="center"><?php if($ts->required_action_c != '') echo '<span class="task">' . $ts->required_action . "<span>$ts->required_action_c</span></span>" ; else echo $app->replaceDefinitions($ts->required_action); ?></td>
                            <td class="con1" width="5%"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td>
                            <td class="con1"><?php if($ts->party_accountable_c != '') echo '<span class="task">' . $ts->party_accountable . "<span>$ts->party_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->party_accountable); ?></td>
                            <td class="con0"><?php if($ts->person_in_charge_c != '') echo '<span class="task">' . $ts->person_in_charge . "<span>$ts->person_in_charge_c</span></span>" ; else echo $ts->person_in_charge; ?></td>
                            <td class="con0"><?php if($ts->due_date_c != '') echo '<span class="task">' . $ts->due_date . "<span>$ts->due_date_c</span></span>" ; else echo getMysqlToCamironDate($ts->due_date); ?></td>
                            <td class="con0"><?php if($ts->status_c != '') echo '<span class="task">' . $ts->status . "<span>$ts->status_c</span></span>" ; else echo $ts->status; ?></td>
                            <td class="center"><?php if($ts->authority_accountable_c != '') echo '<span class="task">' . $ts->authority_accountable . "<span>$ts->authority_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->authority_accountable); ?></td>
                            <td class="center"><?php if($ts->input_camiron_c != '') echo '<span class="task">' . $ts->input_camiron . "<span>$ts->input_camiron_c</span></span>" ; else echo $app->replaceDefinitions($ts->input_camiron); ?></td>
                            <td class="center"><?php if($ts->input_state_c != '') echo '<span class="task">' . $ts->input_state . "<span>$ts->input_state_c</span></span>" ; else echo $app->replaceDefinitions($ts->input_state); ?></td>
                            <td class="center"><?php if($ts->output_c != '') echo '<span class="task">' . $ts->output . "<span>$ts->output_c</span></span>" ; else echo $app->replaceDefinitions($ts->output); ?></td>
                            <td class="center"><?php if($ts->risk_sanction_c != '') echo '<span class="task">' . $ts->risk_sanction . "<span>$ts->risk_sanction_c</span></span>" ; else echo $app->replaceDefinitions($ts->risk_sanction); ?></td>
                            <td class="center"><?php echo utf8_encode($cmt->getLastComment($ts->id)); ?></td>
                            <td class="center">
								<a href="ajax/updatetaskbyuser.php?id=<?php echo $ts->id; ?>" class="toggle">Update</a>
							</td>
                        </tr> 
						<?php } ?>                 
                    </tbody>
                </table>
                </div>
              
                <br /><br />
			<div class="contenttitle2">
				<h3>All My Tasks in Construction phase</h3>
			</div>
			<?php
				if(isset($_GET['status']))
					$tasks = $t->getMyConstructionsTasks($_GET['status']);
				else
					$tasks = $t->getMyConstructionsTasks();
			?>
	        <div style="width:730px; height:400px;overflow:auto;">
                <table style="width:200%" cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con0" />
                        <col class="con0" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Conditions or Category</th>
                            <th class="head1">Required actions or operations</th>
                            <th class="head0">Date for compliance</th>
                            <th class="head1">Party accountable for compliance</th>
                            <th class="head0">Person in charge of action</th>
                            <th class="head1">Due date</th>
                            <th class="head1">Status</th>
                            <th class="head0">Authority accountable for compliance</th>
                            <th colspan="2" class="head0">Input<br />Camiron / State</th>
                            <th class="head1">Output</th>
                            <th class="head0">Risk/Sanction</th>
                            <th class="head1">Last comment</th>
                            <th class="head0">&nbsp;</th>
                        </tr>
                    </thead><!--
                    <tfoot>
                        <tr>
                            <th class="head0"></th>
                            <th class="head1">Browser</th>
                            <th class="head0">Platform(s)</th>
                            <th class="head1">Engine version</th>
                            <th class="head0"></th>
                            <th class="head1">&nbsp;</th>
                        </tr>
                    </tfoot>-->
                    <tbody>
                        <?php foreach($tasks as $ts) { ?>
                        <tr id="<?php echo $ts->id; ?>">
                             <td class="con0"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . $app->replaceDefinitions($ts->cond_cat_title) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo $app->replaceDefinitions($ts->cond_cat_title); ?> </td>
                            <td class="center"><?php if($ts->required_action_c != '') echo '<span class="task">' . $ts->required_action . "<span>$ts->required_action_c</span></span>" ; else echo $app->replaceDefinitions($ts->required_action); ?></td>
                            <td class="con1" width="5%"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td>
                            <td class="con1"><?php if($ts->party_accountable_c != '') echo '<span class="task">' . $ts->party_accountable . "<span>$ts->party_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->party_accountable); ?></td>
                            <td class="con0"><?php if($ts->person_in_charge_c != '') echo '<span class="task">' . $ts->person_in_charge . "<span>$ts->person_in_charge_c</span></span>" ; else echo $ts->person_in_charge; ?></td>
                            <td class="con0"><?php if($ts->due_date_c != '') echo '<span class="task">' . $ts->due_date . "<span>$ts->due_date_c</span></span>" ; else echo getMysqlToCamironDate($ts->due_date); ?></td>
                            <td class="con0"><?php if($ts->status_c != '') echo '<span class="task">' . $ts->status . "<span>$ts->status_c</span></span>" ; else echo $ts->status; ?></td>
                            <td class="center"><?php if($ts->authority_accountable_c != '') echo '<span class="task">' . $ts->authority_accountable . "<span>$ts->authority_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->authority_accountable); ?></td>
                            <td class="center"><?php if($ts->input_camiron_c != '') echo '<span class="task">' . $ts->input_camiron . "<span>$ts->input_camiron_c</span></span>" ; else echo $app->replaceDefinitions($ts->input_camiron); ?></td>
                            <td class="center"><?php if($ts->input_state_c != '') echo '<span class="task">' . $ts->input_state . "<span>$ts->input_state_c</span></span>" ; else echo $app->replaceDefinitions($ts->input_state); ?></td>
                            <td class="center"><?php if($ts->output_c != '') echo '<span class="task">' . $ts->output . "<span>$ts->output_c</span></span>" ; else echo $app->replaceDefinitions($ts->output); ?></td>
                            <td class="center"><?php if($ts->risk_sanction_c != '') echo '<span class="task">' . $ts->risk_sanction . "<span>$ts->risk_sanction_c</span></span>" ; else echo $app->replaceDefinitions($ts->risk_sanction); ?></td>
                            <td class="center"><?php echo utf8_encode($cmt->getLastComment($ts->id)); ?></td>
                            <td class="center">
								<a href="ajax/updatetaskbyuser.php?id=<?php echo $ts->id; ?>" class="toggle">Update</a>
							</td>
                        </tr> 
						<?php } ?>                 
                    </tbody>
                </table>
                </div>
				<br /><br />
			
			<div class="contenttitle2">
				<h3>All My Tasks in Exploitation phase</h3>
			</div>
			<?php
				if(isset($_GET['status']))
					$tasks = $t->getMyExploitationsTasks($_GET['status']);
				else	
					$tasks = $t->getMyExploitationsTasks();
			?>
	        <div style="width:730px; height:400px;overflow:auto;">
                <table style="width:200%" cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con0" />
                        <col class="con0" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Conditions or Category</th>
                            <th class="head1">Required actions or operations</th>
                            <th class="head0">Date for compliance</th>
                            <th class="head1">Party accountable for compliance</th>
                            <th class="head0">Person in charge of action</th>
                            <th class="head1">Due date</th>
                            <th class="head1">Status</th>
                            <th class="head0">Authority accountable for compliance</th>
                            <th colspan="2" class="head0">Input<br />Camiron / State</th>
                            <th class="head1">Output</th>
                            <th class="head0">Risk/Sanction</th>
                            <th class="head1">Last comment</th>
                            <th class="head0">&nbsp;</th>
                        </tr>
                    </thead><!--
                    <tfoot>
                        <tr>
                            <th class="head0"></th>
                            <th class="head1">Browser</th>
                            <th class="head0">Platform(s)</th>
                            <th class="head1">Engine version</th>
                            <th class="head0"></th>
                            <th class="head1">&nbsp;</th>
                        </tr>
                    </tfoot>-->
                    <tbody>
                        <?php foreach($tasks as $ts) { ?>
                        <tr id="<?php echo $ts->id; ?>">
                             <td class="con0"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . $app->replaceDefinitions($ts->cond_cat_title) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo $app->replaceDefinitions($ts->cond_cat_title); ?> </td>
                            <td class="center"><?php if($ts->required_action_c != '') echo '<span class="task">' . $ts->required_action . "<span>$ts->required_action_c</span></span>" ; else echo $app->replaceDefinitions($ts->required_action); ?></td>
                            <td class="con1" width="5%"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td>
                            <td class="con1"><?php if($ts->party_accountable_c != '') echo '<span class="task">' . $ts->party_accountable . "<span>$ts->party_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->party_accountable); ?></td>
                            <td class="con0"><?php if($ts->person_in_charge_c != '') echo '<span class="task">' . $ts->person_in_charge . "<span>$ts->person_in_charge_c</span></span>" ; else echo $ts->person_in_charge; ?></td>
                            <td class="con0"><?php if($ts->due_date_c != '') echo '<span class="task">' . $ts->due_date . "<span>$ts->due_date_c</span></span>" ; else echo getMysqlToCamironDate($ts->due_date); ?></td>
                            <td class="con0"><?php if($ts->status_c != '') echo '<span class="task">' . $ts->status . "<span>$ts->status_c</span></span>" ; else echo $ts->status; ?></td>
                            <td class="center"><?php if($ts->authority_accountable_c != '') echo '<span class="task">' . $ts->authority_accountable . "<span>$ts->authority_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->authority_accountable); ?></td>
                            <td class="center"><?php if($ts->input_camiron_c != '') echo '<span class="task">' . $ts->input_camiron . "<span>$ts->input_camiron_c</span></span>" ; else echo $app->replaceDefinitions($ts->input_camiron); ?></td>
                            <td class="center"><?php if($ts->input_state_c != '') echo '<span class="task">' . $ts->input_state . "<span>$ts->input_state_c</span></span>" ; else echo $app->replaceDefinitions($ts->input_state); ?></td>
                            <td class="center"><?php if($ts->output_c != '') echo '<span class="task">' . $ts->output . "<span>$ts->output_c</span></span>" ; else echo $app->replaceDefinitions($ts->output); ?></td>
                            <td class="center"><?php if($ts->risk_sanction_c != '') echo '<span class="task">' . $ts->risk_sanction . "<span>$ts->risk_sanction_c</span></span>" ; else echo $app->replaceDefinitions($ts->risk_sanction); ?></td>
                            <td class="center"><?php echo utf8_encode($cmt->getLastComment($ts->id)); ?></td>
                            <td class="center">
								<a href="ajax/updatetaskbyuser.php?id=<?php echo $ts->id; ?>" class="toggle">Update</a>
							</td>
                        </tr> 
						<?php } ?>                 
                    </tbody>
                </table>
                </div>
        
        </div><!--contentwrapper-->

<script type="text/javascript">
	jQuery('#overviewselect3').change(function(){
		window.location = '<?php echo $_SERVER['REQUEST_URI']; ?>&status='+jQuery('#overviewselect3').val();
	});
</script>
                    
                    	<ul class="toplist hidden">
                        	<li>
                            	<div>
                                	<span class="three_fourth" style="width:67.5%">
                                    	<span class="left">
                                    		<span class="title"><a href="">Mining Facilities</a></span>
                                        	<span class="desc">Project Lease Request</span>
                                    	</span><!--left-->
                                    </span><!--three_fourth-->
                                    <span class="one_fourth last" style="width:29.5%">
                                    	<span class="right">
                                        	<span class="h3">PENDING</span>
                                        </span><!--right-->
                                    </span><!--one_fourth-->
                                    <br clear="all" />
                                </div>
                            </li>
							<li>
                            	<div>
                                	<span class="three_fourth" style="width:67.5%">
                                    	<span class="left">
                                    		<span class="title"><a href="">Mining Facilities</a></span>
                                        	<span class="desc">Mine Commissioning</span>
                                    	</span><!--left-->
                                    </span><!--three_fourth-->
                                    <span class="one_fourth last" style="width:29.5%">
                                    	<span class="right">
                                        	<span class="h3">CLOSED</span>
                                        </span><!--right-->
                                    </span><!--one_fourth-->
                                    <br clear="all" />
                                </div>
                            </li>
                        </ul>
           </div><!-- #updates -->
            
            <div id="activities" class="subcontent" style="display: none;">
            	&nbsp;
            </div><!-- #activities -->
        
        </div><!--contentwrapper-->
        
        <br clear="all" />
        
	</div><!-- centercontent -->
