<?php
	$t = new tasks();
	$cmt = new comment();
	global $app;
	
?>
<div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Team Tasks</h1>
            <span class="pagedesc">There are all tasks of your team</span>
            
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
				<h3>All Team Tasks in Conditions</h3>
			</div>
			<?php
				if(isset($_GET['status']))
					$tasks = $t->getMyTeamConditionsTasks($_GET['status']);
				else
					$tasks = $t->getMyTeamConditionsTasks();
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
                             <td class="con0" height="3" width="75"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . utf8_encode($app->replaceDefinitions($ts->cond_cat_title)) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo utf8_encode($app->replaceDefinitions($ts->cond_cat_title)); ?> </td>
                             
                            <td class="center" height="3" width="57"><?php /*?><?php if($ts->sector_c != '') echo '<span class="task">' . utf8_encode($ts->sector) . "<span>$ts->sector_c</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->sector)); ?><?php */?></td>
                            
                            
                            <td class="con1" height="3" width="74"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td>
                            
                            
                            <td class="center" height="3" width="87"><?php if($ts->authority_accountable_c != '') echo '<span class="task">' . $ts->authority_accountable . "<span>$ts->authority_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->authority_accountable); ?></td>
                            
                       
                            
                            <td class="con0" height="3" width="65"><?php if($ts->due_date_c != '') echo '<span class="task">' . $ts->due_date . "<span>$ts->due_date_c</span></span>" ; else echo getMysqlToCamironDate($ts->due_date); ?></td>
                            
                            
                            <td class="con0" height="3" width="80"> <?php if($ts->rate != '') echo '<span class="task">' . $ts->rate . "<span>$ts->rate</span></span>" ; else echo $ts->rate; ?> </td>
                                         
                            
                            
                            <td class="center" height="3" width="74"><?php echo utf8_encode($cmt->getLastComment($ts->id)); ?></td>
                            
                            <td class="center" height="3" width="95">
								<a href="?view=team-tasks1"> MORE DETAILS</a>
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
				<h3>All Team Tasks in Construction phase</h3>
			</div>
			<?php
				if(isset($_GET['status']))
					$tasks = $t->getMyTeamConstructionsTasks($_GET['status']);
				else
					$tasks = $t->getMyTeamConstructionsTasks();
				
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
                            <th width="201" class="head0">Main conditions</th>
                            <th width="128" class="head1">Sector of the task</th>
                            <th class="head0">Date of compliance</th>
                            <th width="190" class="head1">Acountable Person</th>
                            <th width="192" class="head1">Due date of main task</th>
                            <th class="head1">Realisation rate </th>
                            <th class="head1"> Comments</th>
                            <th width="192" class="head1">View details</th>
                            <th width="41" class="head0">&nbsp;</th>
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
                             <td class="con0" height="3" width="201"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . utf8_encode($app->replaceDefinitions($ts->cond_cat_title)) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo $app->replaceDefinitions($ts->cond_cat_title); ?> </td>
                             <!--sector-->
                            <td class="center"><?php /*?><?php if($ts->sector_c != '') echo '<span class="task">' . utf8_encode($ts->sector) . "<span>$ts->sector_c</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->sector)); ?><?php */?></td>
                            
                             <!--date of complaint-->
                            <td class="con1" height="3" width="263"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td>
                            
                            
                           
                            <!--<td class="con1"><?php /*?><?php if($ts->party_accountable_c != '') echo '<span class="task">' . $ts->party_accountable . "<span>$ts->party_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->party_accountable); ?><?php */?></td>-->
                            
                             <!--acountable personne-->
                            <td class="center" height="3" width="190"><?php if($ts->authority_accountable_c != '') echo '<span class="task">' . $ts->authority_accountable . "<span>$ts->authority_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->authority_accountable); ?></td>
                            
                             <!--due date-->
                            <td class="con0" height="3" width="192"><?php if($ts->due_date_c != '') echo '<span class="task">' . $ts->due_date . "<span>$ts->due_date_c</span></span>" ; else echo getMysqlToCamironDate($ts->due_date); ?></td>
                            
                            
                            <!--taux de realisation -->
                             <td class="con0" height="3" width="267"><td class="con0" height="3" width="176"> <td class="con0" height="3" width="192"> <?php if($ts->rate != '') echo '<span class="task">' . $ts->rate . "<span>$ts->rate</span></span>" ; else echo $ts->rate; ?> </td> </td>
                                         
                            
                            
                            <td class="center" height="3" width="192"><?php echo utf8_encode($cmt->getLastComment($ts->id)); ?></td>
                            
                            <td class="center" height="3" width="123">
								<a href="?view=team-tasks1" class="toggle">more details</a>
							</td>
                            
                            <td class="center" height="3" width="199">
								<a href="ajax/update.php?id=<?php echo $ts->id; ?>" class="toggle">Update</a>
							</td>
                        </tr> 
						<?php } ?>                 
                    </tbody>
                </table>  
                
                
                
                
				<br /><br />
			
			<div class="contenttitle2">
				<h3>All Team Tasks in Exploitation phase</h3>
			</div>
			<?php
				if(isset($_GET['status']))
					$tasks = $t->getMyTeamExploitationsTasks($_GET['status']);
				else
					$tasks = $t->getMyTeamExploitationsTasks();
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
                         
                             <th width="177" class="head0">Main conditions</th>
                            <th width="152" class="head1">Sector of the task</th>
                            <th class="head0">Date for compliance</th>
                            <th width="222" class="head1">Acountable Person</th>
                            <th width="197" class="head1">Due date of the main task</th>
                            <th class="head1">Realisation rate</th>
                            <th class="head1"> Comments</th>
                            <th width="344" class="head1">View details</th>
                            <th width="132" class="head0">&nbsp; </th> 
                         
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
                             <td class="con0" height="3" width="177"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . utf8_encode($app->replaceDefinitions($ts->cond_cat_title)) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo $app->replaceDefinitions($ts->cond_cat_title); ?> </td>
                             <!--sector-->
                            <td class="center"><?php /*?><?php if($ts->sector_c != '') echo '<span class="task">' . utf8_encode($ts->sector) . "<span>$ts->sector_c</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->sector)); ?><?php */?></td>
                            
                             <!--date of complaint-->
                            <td class="con1" height="3" width="219"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td>
                            
                            
                           
                            <!--<td class="con1"><?php /*?><?php if($ts->party_accountable_c != '') echo '<span class="task">' . $ts->party_accountable . "<span>$ts->party_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->party_accountable); ?><?php */?></td>-->
                            
                             <!--acountable personne-->
                            <td class="center" height="3" width="222"><?php if($ts->authority_accountable_c != '') echo '<span class="task">' . $ts->authority_accountable . "<span>$ts->authority_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->authority_accountable); ?></td>
                            
                             <!--due date-->
                            <td class="con0" height="3" width="197"><?php if($ts->due_date_c != '') echo '<span class="task">' . $ts->due_date . "<span>$ts->due_date_c</span></span>" ; else echo getMysqlToCamironDate($ts->due_date); ?></td>
                            
                            
                            <!--taux de realisation -->
                             <td class="con0" height="3" width="225"><td class="con0" height="3" width="276"> <?php if($ts->rate != '') echo '<span class="task">' . $ts->rate . "<span>$ts->rate</span></span>" ; else echo $ts->rate; ?> </td></td>
                                         
                            
                            
                            <td class="center" height="3" width="132"><?php echo utf8_encode($cmt->getLastComment($ts->id)); ?></td>
                            
                            <td class="center" height="3" width="88">
								<a href="?view=all-tasks1" class="toggle">more details</a>
							</td>
                            
                            <td class="center" height="3" width="132">
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