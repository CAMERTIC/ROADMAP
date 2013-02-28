<?php
	$t = new tasks();
	$cmt = new comment();
	global $app;
	
?>
<div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">All Tasks</h1>
            <span class="pagedesc">There are all tasks</span>
            
        </div><!--pageheader-->
         <div class="overviewhead">
			<div class="overviewselect">
				<select id="overviewselect3" name="status">
					<option value="">Status</option>
					<option <?php if(isset($_GET['status']))if($_GET['status']=='in progress') echo "SELECTED"; ?> value="in progress">In progress</option>
					<option <?php if(isset($_GET['status']))if($_GET['status']=='on hold') echo "SELECTED"; ?> value="on hold">On hold</option>
					<option <?php if(isset($_GET['status']))if($_GET['status']=='closed') echo "SELECTED"; ?> value="closed">Closed</option>
				</select>
			</div>
			<h3>Apply Filters: &nbsp;</h3>
		</div><!--overviewhead-->
        <div id="contentwrapper" class="contentwrapper">                                
			
            <div class="contenttitle2">
				<h3>All Tasks in Conditions</h3>
			</div>
			<?php
				if(isset($_GET['status']))
					$tasks = $t->getConditionsTasks($_GET['status']);
				else
					$tasks = $t->getConditionsTasks();
			?>
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
                            <th width="106" class="head0">Conditions or Category</th>
                            <th width="140" class="head1">Required actions or operations</th>
                            <th class="head0">Date for compliance</th>
                            <th width="154" class="head1">Party accountable for compliance</th>
                            <th width="161" class="head0">Person in charge of action</th>
                            <th width="119" class="head1">Due date</th>
                            <th width="104" class="head1">Status</th>
                            <th width="182" class="head0">Authority accountable for compliance</th>
                            <th colspan="2" class="head0">Input<br />Camiron / State</th>
                            <th width="322" class="head1">Output</th>
                            <th width="172" class="head0">Risk/Sanction</th>
                            <th width="186" class="head1">Last comment</th>
                            <th width="146" class="head0">&nbsp;</th>
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
                        <?php foreach($tasks as $ts ) { ?>
                        
<?php  if(($ts->sector =='6')) { ?>   
                     
                        <tr id="<?php echo $ts->id; ?>">
                             <td class="con0" height="3" width="106"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . utf8_encode($app->replaceDefinitions($ts->cond_cat_title)) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo utf8_encode($app->replaceDefinitions($ts->cond_cat_title)); ?> </td>
                             
                             
                            <td class="center" height="3" width="140"><?php if($ts->required_action_c != '') echo '<span class="task">' . utf8_encode($ts->required_action) . "<span>$ts->required_action_c</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->required_action)); ?></td>
                            
                            <td class="con1" height="3" width="157"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td>
                            
                            <td class="con1" height="3" width="154"><?php if($ts->party_accountable_c != '') echo '<span class="task">' . $ts->party_accountable . "<span>$ts->party_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->party_accountable); ?></td>
                            
                            
                            <td class="con0" height="3" width="161"><?php if($ts->person_in_charge_c != '') echo '<span class="task">' . $ts->person_in_charge . "<span>$ts->person_in_charge_c</span></span>" ; else echo $ts->person_in_charge; ?></td>
                            
                            <td class="con0" height="3" width="119"><?php if($ts->due_date_c != '') echo '<span class="task">' . $ts->due_date . "<span>$ts->due_date_c</span></span>" ; else echo getMysqlToCamironDate($ts->due_date); ?></td>
                            
                            <td class="con0" height="3" width="104"><?php if($ts->status_c != '') echo '<span class="task">' . $ts->status . "<span>$ts->status_c</span></span>" ; else echo $ts->status; ?></td>
                            
                            <td class="coon1" height="3" width="182"><?php if($ts->authority_accountable_c != '') echo '<span class="task">' . $ts->authority_accountable . "<span>$ts->authority_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->authority_accountable); ?></td>
                            <td height="3" width="120" class="con1"><?php if($ts->input_camiron_c != '') echo '<span class="task">' . $ts->input_camiron . "<span>$ts->input_camiron_c</span></span>" ; else echo $app->replaceDefinitions($ts->input_camiron); ?></td>
                            
                            <td height="3" width="95" class="con0"><?php if($ts->input_state_c != '') echo '<span class="task">' . $ts->input_state . "<span>$ts->input_state_c</span></span>" ; else echo $app->replaceDefinitions($ts->input_state); ?></td>
                            
                            
                            <td class="con0" height="3" width="322"><?php if($ts->output_c != '') echo '<span class="task">' . $ts->output . "<span>$ts->output_c</span></span>" ; else echo $app->replaceDefinitions($ts->output); ?></td>
                            <td class="center"><?php if($ts->risk_sanction_c != '') echo '<span class="task">' . $ts->risk_sanction . "<span>$ts->risk_sanction_c</span></span>" ; else echo $app->replaceDefinitions($ts->risk_sanction); ?></td>
                            <td class="center"><?php echo utf8_encode($cmt->getLastComment($ts->id)); ?></td>
                            <td class="center">
								<a href="ajax/updatetaskbyuser.php?id=<?php echo $ts->id; ?>" class="toggle">Update</a>
							</td>
                        </tr> 
						<?php }  ?>
                        <?php }  ?>               
                    </tbody>
                </table>
</div>
</div>
<script type="text/javascript">
	jQuery('#overviewselect3').change(function(){
		window.location = '<?php echo $_SERVER['REQUEST_URI']; ?>&status='+jQuery('#overviewselect3').val();
	});
                </script>
