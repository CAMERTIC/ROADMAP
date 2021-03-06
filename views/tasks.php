<?php
	function removeqsvar($url, $varname) {
		return preg_replace('/([?&])'.$varname.'=[^&]+(&|$)/','$1',$url);
	}
	$t = new tasks();
	$cmt = new comment();
	if(isset($_GET['type']) || isset($_GET['person_in_charge']) || isset($_GET['status'])) {
		$tasks = $t->getAllTasks($_GET);
	} else {
		if(isset($_GET['page'])) {
			$tasks = $t->getAllRecords(null, $t->step, $_GET['page']);
		} else 
			$tasks = $t->getAllRecords();
	}
	
	$u = new rc_users;
	$users = $u->getAllRecords();
	global $app;
	// echo "<pre>";
	// var_dump($tasks);
	// die;
?>
<div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Tasks</h1>
            <span class="pagedesc">There are all tasks</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">                                
			<div class="contenttitle2">
				<h3>
					<?php if(isset($_GET['filter'])) {
						switch($_GET['filter']) {
							case '6' :  echo 'Tasks within 6 months of date compliance'; break;
							case '12' :  echo 'Tasks within 12 months of date compliance'; break;
							case '18' :  echo 'Tasks within 18 months of date compliance'; break;
							default  :  echo 'All Tasks'; break;
						}
						}
						else
							echo 'All tasks';
						?>
				</h3>
			</div><!--contenttitle-->
            
			<div class="overviewhead">
				<div class="overviewselect">
					<select id="overviewselect" name="overviewselect">
						<option value="">Type</option>
						<option value="conditions" <?php if(isset($_GET['type']))if($_GET['type']=='conditions') echo "SELECTED"; ?>>Conditions</option>
						<option value="constructions" <?php if(isset($_GET['type']))if($_GET['type']=='constructions') echo "SELECTED"; ?>>Constructions</option>
						<option value="exploitations" <?php if(isset($_GET['type']))if($_GET['type']=='exploitations') echo "SELECTED"; ?>>Exploitation</option>
					</select>
				</div>
				<div class="overviewselect">
					<select id="overviewselect2" name="person_in_charge">
						<option value="">Person in Charge</option>
					<?php foreach($users as $u) { ?>
						<option <?php if(isset($_GET['person_in_charge']))if($_GET['person_in_charge']==$u->login) echo "SELECTED"; ?> value="<?php echo $u->login; ?>"><?php echo $u->login; ?></option>
					<?php } ?>
					</select>
				</div>
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
			
			<br clear="all" />
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
                            <td class="con0"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . utf8_encode($app->replaceDefinitions($ts->cond_cat_title)) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo $app->replaceDefinitions($ts->cond_cat_title); ?> </td>
                            <td class="center"><?php if($ts->required_action_c != '') echo '<span class="task">' . $app->replaceDefinitions($ts->required_action) . "<span>$ts->required_action_c</span></span>" ; else echo $app->replaceDefinitions($ts->required_action); ?></td>
                            <?php if($ts->type=='conditions') { ?>
								<td class="con1" width="5%"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td>
                            <?php } else { ?>
								<td class="con1" width="5%"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline_text . "<span>$ts->deadline_c</span></span>" ; else echo $ts->deadline_text; ?></td>
							<?php } ?>
							<td class="con1"><?php if($ts->party_accountable_c != '') echo '<span class="task">' . $app->replaceDefinitions($ts->party_accountable) . "<span>$ts->party_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->party_accountable); ?></td>
                            <td class="con0"><?php if($ts->person_in_charge_c != '') echo '<span class="task">' . $ts->person_in_charge . "<span>$ts->person_in_charge_c</span></span>" ; else echo $ts->person_in_charge; ?></td>
                            <td class="con0"><?php if($ts->due_date_c != '') echo '<span class="task">' . $ts->due_date . "<span>$ts->due_date_c</span></span>" ; else echo getMysqlToCamironDate($ts->due_date); ?></td>
                            <td class="con0"><?php if($ts->status_c != '') echo '<span class="task">' . $ts->status . "<span>$ts->status_c</span></span>" ; else echo $ts->status; ?></td>
                            <td class="center"><?php if($ts->authority_accountable_c != '') echo '<span class="task">' . $app->replaceDefinitions($ts->authority_accountable) . "<span>$ts->authority_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->authority_accountable); ?></td>
                            <td class="center"><?php if($ts->input_camiron_c != '') echo '<span class="task">' . $app->replaceDefinitions($ts->input_camiron) . "<span>$ts->input_camiron_c</span></span>" ; else echo $app->replaceDefinitions($ts->input_camiron); ?></td>
                            <td class="center"><?php if($ts->input_state_c != '') echo '<span class="task">' . $app->replaceDefinitions($ts->input_state) . "<span>$ts->input_state_c</span></span>" ; else echo $app->replaceDefinitions($ts->input_state); ?></td>
                            <td class="center"><?php if($ts->output_c != '') echo '<span class="task">' . $app->replaceDefinitions($ts->output) . "<span>$ts->output_c</span></span>" ; else echo $app->replaceDefinitions($ts->output); ?></td>
                            <td class="center"><?php if($ts->risk_sanction_c != '') echo '<span class="task">' . $app->replaceDefinitions($ts->risk_sanction) . "<span>$ts->risk_sanction_c</span></span>" ; else echo $app->replaceDefinitions($ts->risk_sanction); ?></td>
                            <td class="center"><?php echo utf8_encode($cmt->getLastComment($ts->id)); ?></td>
                            <td class="center"><a href="ajax/updatetask.php?id=<?php echo $ts->id; ?>" class="toggle">Update</a></td>
                            <td class="center"><a id="<?php echo $ts->id; ?>" class="btn btn3 btn_black btn_trash" href="#"></a></td>
                        </tr> 
						<?php } ?>
                    </tbody>
                </table>
               <br /><br />
			   <?php $pages = $t->getPagesNb(); 
					$maxPag = 5;
			   ?>
				<ul class="pagination">
					<?php if(isset($_GET['page'])) { if($_GET['page'] > 1) { ?>
					<li class="first"><a class="" href="?view=tasks">« First</a></li>
					<?php } } ?>
					<?php if(isset($_GET['page'])) { if($_GET['page'] > 1) { ?>
                       <li class="previous"><a class="" href="?view=tasks&page=<?php echo $_GET['page'] - 1; ?>">‹ Previous</a></li>
                    	<?php } }  ?>
					<?php for($i = 1; $i <= $pages; $i++) {
							if(isset($_GET['page'])) {
								if($_GET['page'] > ($maxPag/2)) {
									$min = $_GET['page'] - 2;
									$max = $_GET['page'] + 2;
								} else {
									$min = $_GET['page'] - 1;
									$max = $_GET['page'] + 4;
								}
							} else {
								$min = 1;
								$max = 5;
							}
					?>
                    	
                        <?php 
						if($i <= $max  && $i >= $min) {
							if(isset($_GET['page'])) { 
								if($_GET['page'] == $i) { ?>
								<li><a class="current" href="?view=tasks&page=<?php echo $i; ?>"><?php echo $i; ?></a></li><?php }
								else { ?><li><a href="?view=tasks&page=<?php echo $i; ?>"><?php echo $i; ?></a></li><?php } 
							} else { 
								
							?>
								<li><a <?php if($i==1) echo 'class="current"'; ?> href="?view=tasks&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
							<?php }

							} else {}
						?>
                       
                        
                        
					<?php } ?>
					<?php if($pages > $maxPag) { ?>
						<li class="next"><a href="?view=tasks&page=<?php if(isset($_GET['page'])) { echo $_GET['page'] + 1; } else { echo $maxPag+1; } ?>">Next ›</a></li>
					<?php } ?>
					<?php if($pages > $maxPag) { ?>
					<li class="last"><a href="?view=tasks&page=<?php echo $pages; ?>">Last »</a></li>
					<?php }  ?>
                    </ul>
                <br /><br />
        
        </div><!--contentwrapper-->
        
</div><!-- centercontent -->
<script type="text/javascript">
	// jQuery(document).ready(function(){
		// jQuery("area[rel^='prettyPhoto']").prettyPhoto();
	// });
	jQuery('#overviewselect').change(function(){
		//removeqsvar($_SERVER['REQUEST_URI'], 'type');
			window.location = '<?php echo removeqsvar($_SERVER['REQUEST_URI'], 'type'); ?>&type='+jQuery('#overviewselect').val();
	});
	jQuery('#overviewselect2').change(function(){
		window.location = '<?php echo removeqsvar($_SERVER['REQUEST_URI'], 'person_in_charge'); ?>&person_in_charge='+jQuery('#overviewselect2').val();
	});
	jQuery('#overviewselect3').change(function(){
		window.location = '<?php echo removeqsvar($_SERVER['REQUEST_URI'], 'status'); ?>&status='+jQuery('#overviewselect3').val();
	});
	jQuery('.btn_trash').click(function(){
		
		if (confirm("You confirm you want to delete the task?")) {
			jQuery.ajax({
				  type: "POST",
				  url: "ajax/delTask.php",
				  data: "id="+jQuery(this).attr('id'),
				  cache: false,
				  success: function(html){
					if(html==""){
						jQuery(this).parents('tr').remove();
					}
				  }
				});	
		} else {
			
		}
		return false;
	});
</script>
   