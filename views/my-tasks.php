<?php
	$t = new tasks();
	$cmt = new comment();
	global $app;
	
?>
<div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">My Tasks</h1>
            <span class="pagedesc">There are all tasks you are responsible of</span>
            
        </div><!--pageheader-->
        <div class="overviewhead">
			
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
        <div id="contentwrapper" class="contentwrapper">                                
		
		
            <div class="contenttitle2">
				<h3>All My Tasks in Conditions &nbsp;&nbsp;<a title="Export to excel" target="_blank" href="cmd.php?view=my-tasks&action=export&data=my-conditions"><img src="images/page_excel.png" /></a></h3>
			</div>
			<?php
				if(isset($_GET['status']))
					$tasks = $t->getMyConditionsTasks($_GET['status']);
				else
					$tasks = $t->getMyConditionsTasks();
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
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Main Conditions </th>
                            <th class="head1">Sector of the task </th>
                            <th class="head0">Date of compliance</th>
                            <th class="head1">Acountable Person</th>
                            <th class="head1">Due date of the main task</th>
                            <th class="head1">Realisation rate </th>
                            <th class="head0">Comments</th>
                            <th class="head1">View details</th>
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
                        
                             <td class="con0" height="3" width="75"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . utf8_encode($app->replaceDefinitions($ts->cond_cat_title)) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo utf8_encode($app->replaceDefinitions($ts->cond_cat_title_c)); ?>
                             
                              <?php /*?>if($ts->cond_cat_title_c != '') { echo '<span class="task">' . $t->getConditions(utf8_encode($app->replaceDefinitions($ts->cond_cat_title))) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo $t->getCconditions(utf8_encode($app->replaceDefinitions($ts->cond_cat_title))); ?><?php */?>
                              </td>
                                                    
                             
                             
                             
                            <td class="center" height="3" width="57"><?php if($ts->sector_new != '') echo '<span class="task">' . utf8_encode($ts->sector_new) . "<span>$ts->sector_new</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->sector_new)); ?></td>
                            
                            
                            <td class="con1" height="3" width="74"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td>
                            
                            
                            <td class="center" height="3" width="87"><?php if($ts->authority_accountable_c != '') echo '<span class="task">' . $ts->authority_accountable . "<span>$ts->authority_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->authority_accountable); ?></td>
                            
                       
                            
                            <td class="con0" height="3" width="65"><?php if($ts->due_date_c != '') echo '<span class="task">' . $ts->due_date . "<span>$ts->due_date_c</span></span>" ; else echo getMysqlToCamironDate($ts->due_date); ?></td>
                            
                            
                            <td class="con0" height="3" width="80"> <?php if($ts->rate != '') echo '<span class="task">' . $ts->rate . "<span>$ts->rate</span></span>" ; else echo $ts->rate; ?> </td>
                                         
                            
                            
                            <td class="center" height="3" width="74"><?php echo utf8_encode($cmt->getLastComment($ts->id)); ?></td>
                            
                            <td class="center" height="3" width="95">
								<a href="?view=my-tasks1"> MORE DETAILS</a>
							</td>
                            
                            <td class="center" height="3" width="113">
								<a href="ajax/update.php?id=<?php echo $ts->id; ?>" class="toggle">Update</a>
							</td>
                        </tr> 
						<?php } ?>                 
                    </tbody>
                </table>
              
                <br /><br />
			<div class="contenttitle2">
				<h3>All My Tasks in Construction phase&nbsp;&nbsp;<a title="Export to excel" href="cmd.php?view=my-tasks&action=export&data=my-construction"><img src="images/page_excel.png" /></a></h3>
			</div>
			<?php
				if(isset($_GET['status']))
					$tasks = $t->getMyConstructionsTasks($_GET['status']);
				else
					$tasks = $t->getMyConstructionsTasks();
			?>
                <table style="width:200%" cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick">
                    <colgroup >
                        <col class="con0"  />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con0" />
                        <col class="con0" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr >
                            <th width="71" class="head0">Main conditions</th>
                            <th width="101" class="head1">Sector of the task</th>
                            <th class="head0">Date of compliance</th>
                            <th width="79" class="head1">Acountable Person</th>
                            <th width="121" class="head1">Due date of main task</th>
                            <th class="head1">Realisation rate </th>
                            <th class="head1"> Comments</th>
                            <th width="154" class="head1">View details</th>
                            <th width="161" class="head0">&nbsp;</th>
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
                             <td class="con0" height="3" width="71"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . utf8_encode($app->replaceDefinitions($ts->cond_cat_title)) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo $app->replaceDefinitions($ts->cond_cat_title_c); ?> </td>
                             <!--sector-->
                            <td class="center"><?php if($ts->sector_new != '') echo '<span class="task">' . utf8_encode($ts->sector_new) . "<span>$ts->sector_new</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->sector_new)); ?></td>
                            
                             <!--date of complaint-->
                            <td class="con1" height="3" width="74"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td>
                            
                            
                           
                            <!--<td class="con1"><?php /*?><?php if($ts->party_accountable_c != '') echo '<span class="task">' . $ts->party_accountable . "<span>$ts->party_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->party_accountable); ?><?php */?></td>-->
                            
                             <!--acountable personne-->
                            <td class="center" height="3" width="79"><?php if($ts->authority_accountable_c != '') echo '<span class="task">' . $ts->authority_accountable . "<span>$ts->authority_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->authority_accountable); ?></td>
                            
                             <!--due date-->
                            <td class="con0" height="3" width="121"><?php if($ts->due_date_c != '') echo '<span class="task">' . $ts->due_date . "<span>$ts->due_date_c</span></span>" ; else echo getMysqlToCamironDate($ts->due_date); ?></td>
                            
                            
                            <!--taux de realisation -->
                             <td class="con0" height="3" width="103"><td class="con0" height="3" width="71"> <td class="con0" height="3" width="154"> <?php if($ts->rate != '') echo '<span class="task">' . $ts->rate . "<span>$ts->rate</span></span>" ; else echo $ts->rate; ?> </td> 
                                         
                            
                            
                            <td class="center" height="3" width="123"><?php echo utf8_encode($cmt->getLastComment($ts->id)); ?></td>
                            
                            <td class="center" height="3" width="202">
								<a href="?view=my-tasks1" class="toggle">more details</a>
							</td>
                            
                            <td class="center" height="3" width="120">
								<a href="ajax/update.php?id=<?php echo $ts->id; ?>" class="toggle">Update</a>
							</td>
                        </tr> 
						<?php } ?>                 
                    </tbody>
                </table>
				<br /><br />
			
			<div class="contenttitle2">
				<h3>All My Tasks in Exploitation phase&nbsp;&nbsp;<a title="Export to excel" href="cmd.php?view=my-tasks&action=export&data=my-exploitations"><img src="images/page_excel.png" /></a></h3>
			</div>
			<?php
				if(isset($_GET['status']))
					$tasks = $t->getMyExploitationsTasks($_GET['status']);
				else	
					$tasks = $t->getMyExploitationsTasks();
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
                    </colgroup>
                    <thead>
                        <tr>
                         
                             <th width="168" class="head0">Main conditions</th>
                            <th width="167" class="head1">Sector of the task</th>
                            <th class="head0">Date for compliance</th>
                            <th width="152" class="head1">Acountable Person</th>
                            <th width="210" class="head1">Due date of the main task</th>
                            <th class="head1">Realisation rate</th>
                            <th class="head1"> Comments</th>
                            <th width="275" class="head1">View details</th>
                            <th width="87" class="head0">&nbsp; </th> 
                         
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
                             <td class="con0" height="3" width="168"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . utf8_encode($app->replaceDefinitions($ts->cond_cat_title)) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo $app->replaceDefinitions($ts->cond_cat_title_c); ?> </td>
                             <!--sector-->
                            <td class="center"><?php if($ts->sector_new != '') echo '<span class="task">' . utf8_encode($ts->sector_new) . "<span>$ts->sector_new</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->sector_new)); ?></td>
                            
                             <!--date of complaint-->
                            <td class="con1" height="3" width="155"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td>
                            
                            
                           
                            <!--<td class="con1"><?php /*?><?php if($ts->party_accountable_c != '') echo '<span class="task">' . $ts->party_accountable . "<span>$ts->party_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->party_accountable); ?><?php */?></td>-->
                            
                             <!--acountable personne-->
                            <td class="center" height="3" width="152"><?php if($ts->authority_accountable_c != '') echo '<span class="task">' . $ts->authority_accountable . "<span>$ts->authority_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->authority_accountable); ?></td>
                            
                             <!--due date-->
                            <td class="con0" height="3" width="210"><?php if($ts->due_date_c != '') echo '<span class="task">' . $ts->due_date . "<span>$ts->due_date_c</span></span>" ; else echo getMysqlToCamironDate($ts->due_date); ?></td>
                            
                            
                            <!--taux de realisation -->
                             <td class="con0" height="3" width="155"><td class="con0" height="3" width="177"> <?php if($ts->rate != '') echo '<span class="task">' . $ts->rate . "<span>$ts->rate</span></span>" ; else echo $ts->rate; ?> </td>
                                         
                            
                            
                            <td class="center" height="3" width="87"><?php echo utf8_encode($cmt->getLastComment($ts->id)); ?></td>
                            
                            <td class="center" height="3" width="197">
								<a href="?view=my-tasks1" class="toggle">more details</a>
							</td>
                            
                            <td class="center" height="3" width="421">
								<a href="ajax/update.php?id=<?php echo $ts->id; ?>" class="toggle">Update</a>
							</td>
                        </tr> 
						<?php } ?>                   
                        
                        
                        
                        
                    </tbody>
                </table>
        
        </div><!--contentwrapper-->
        
</div><!-- centercontent -->
<script type="text/javascript">
	jQuery('#overviewselect3').change(function(){
		window.location = '<?php echo $_SERVER['REQUEST_URI']; ?>&status='+jQuery('#overviewselect3').val();
	});
</script>