<?php
ini_set("display_errors",0);error_reporting(0);

	$t = new tasks();
	$cmt = new comment();
	global $app;
	
?>
<div class="centercontent tables" style=" width:360px ; height:800px" >
    
        <div class="pageheader notab "  >
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
                <table style="width:800px" cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick">
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
                            <th class="head1"> <p>Rate </p>
                          <p>(%)</p></th>
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
                        <?php  if($ts-> valeur == '1') { ?>
                        
                        <tr id="<?php echo $ts->id; ?>">
                             <td class="con0" height="3" width="177"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . utf8_encode($app->replaceDefinitions($ts->cond_cat_title)) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo utf8_encode($app->replaceDefinitions($ts->cond_cat_title)); ?> </td>
                             
                            <td class="center" height="3" width="81"><?php if($ts->sector != '') echo '<span class="task">' . utf8_encode($ts->sector) . "<span>$ts->sector</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->sector)); ?></td>
                            
                            
                            <td class="con1" height="3" width="98"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td>
                            
                            
                            <td class="center" height="3" width="100"><?php if($ts->acountable_pers_task != '') echo '<span class="task">' .$t->getNamePerson( $ts->acountable_pers_task ). "<span>$t->getNamePerson($ts->acountable_pers_task) </span></span>" ; else echo $t->getNamePerson($ts-> acountable_pers_task); ?></td>
                            
                      
                       
                       
                            
                            <td class="con0" height="3" width="95"><?php if($ts->due_date_c != '') echo '<span class="task">' . $ts->due_date . "<span>$ts->due_date_c</span></span>" ; else echo getMysqlToCamironDate($ts->due_date); ?></td>
                            
                            
                            <td class="con0" height="3" width="38"> <?php if($ts->rate != '') echo '<span class="task">' . $ts->rate . "<span>$ts->rate</span></span>" ; else echo $ts->rate; ?> </td>
                                         
                            
                            
                            <td class="center" height="3" width="71"><?php echo utf8_encode($cmt->getLastComment($ts->id)); ?></td>
                            
                            
                            <td class="center" height="3" width="70"> 
                            <?php
							if ($ts->sector=='6')
							echo '
								<a href="?view=all-tasks1" > MORE DETAILS </a> ';
							else 	
							if ($ts->sector=='9')
							echo '
								<a href="?view=all-tasks2"   > MORE DETAILS </a> ';
	
								else
									if (($ts->cond_cat_title == 'Either consumate the transaction' )&&($ts->sector=='18'))
							echo '
								<a href="?view=1"   > MORE DETAILS</a> ';
								
								else
								if($ts-> sector=='18')
								echo '
								<a href="?view=2 "   > MORE DETAILS</a> ';
								
								
								?>
                                
							</td>
                            
                            <td class="center" height="3" width="70">
								<a href="ajax/update.php?id=<?php echo $ts->id; ?>" class="toggle">Update</a>
							</td>
                        </tr> 
                        
                      <?php }   ?>
						<?php } ?>                 
                    </tbody>
                </table>
              
                <br /><br />
			<div class="contenttitle2">
				<h3>All Team Tasks in Construction phase</h3>
			</div>
			<?php
				if(isset($_GET['status']))
					$tasks = $t->getConstructionsTasks($_GET['status']);
				else
					$tasks = $t->getConstructionsTasks();
			?>
                <table style="width:800px" cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick">
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
                            <th width="146" class="head0">Main conditions</th>
                            <th width="75" class="head1">Sector of the task</th>
                            <th class="head0">Date of compliance</th>
                            <th width="79" class="head1">Acountable Person</th>
                            <th width="97" class="head1">Due date of main task</th>
                            <th class="head1">Rate(%) </th>
                            <th class="head1"> Comments</th>
                            <th width="82" class="head1">View details</th>
                            <th width="114" class="head0">&nbsp;</th>
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
                        <?php  if($ts-> valeur == '1') { ?>
                        <tr id="<?php echo $ts->id; ?>">
                             <td class="con0" height="3" width="146"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . utf8_encode($app->replaceDefinitions($ts->cond_cat_title)) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo $app->replaceDefinitions($ts->cond_cat_title); ?> </td>
                             <!--sector-->
                            <td class="center"><?php if($ts->sector_new != '') echo '<span class="task">' . utf8_encode($ts->sector_new) . "<span>$ts->sector_new</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->sector_new)); ?></td>
                            
                             <!--date of complaint-->
                            <td class="con1" height="3" width="74"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td>
                            
                            
                           
                            <!--<td class="con1"><?php /*?><?php if($ts->party_accountable_c != '') echo '<span class="task">' . $ts->party_accountable . "<span>$ts->party_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->party_accountable); ?><?php */?></td>-->
                            
                             <!--acountable personne-->
                           <td class="center" height="3" width="79"><?php if($ts->acountable_pers_task != '') echo '<span class="task">' .$t->getNamePerson( $ts->acountable_pers_task ). "<span>$t->getNamePerson($ts->acountable_pers_task) </span></span>" ; else echo $t->getNamePerson($ts-> acountable_pers_task); ?></td>
                            
                             <!--due date-->
                            <td class="con0" height="3" width="97"><?php if($ts->due_date_c != '') echo '<span class="task">' . $ts->due_date . "<span>$ts->due_date_c</span></span>" ; else echo getMysqlToCamironDate($ts->due_date); ?></td>
                            
                            
                            <!--taux de realisation -->
                             <td class="con0" height="3" width="54"> <?php if($ts->rate != '') echo '<span class="task">' . $ts->rate . "<span>$ts->rate</span></span>" ; else echo $ts->rate; ?> </td> 
                                         
                            
                            
                            <td class="center" height="3" width="79"><?php echo utf8_encode($cmt->getLastComment($ts->id)); ?></td>
                            
                            <td class="center" height="3" width="82">
<!--								<a href="?view=all-tasks1" class="toggle">more details</a>

-->							

       <?php
							if ($ts->sector=='MINING FACILITIES')
							echo '
								<a href="?view=all-tasks4"   > MORE DETAILS</a> ';
								
							if ($ts->sector=='RAILWAY FACILITIES')
							echo '
								<a href="?view=all-tasks5"   > MORE DETAILS</a> ';
									
								
								if ($ts->sector=='MINERAL TERMINAL FACILITIES')
							echo '
								<a href="?view=all-tasks6"   > MORE DETAILS</a> ';
								
								
								if ($ts->sector=='BENEFICIAL FACILITIES')
							echo '
								<a href="?view=all-tasks7"   > MORE DETAILS</a> ';
								
								
								if ($ts->sector=='OTHER PROJECT FACILITIES')
							echo '
								<a href="?view=all-tasks8"   > MORE DETAILS</a> ';
								
								if ($ts->sector=='LAND ISSUES')
							echo '
								<a href="?view=all-tasks9"   > MORE DETAILS</a> ';
								
								if ($ts->sector=='ENVIRONEMENTAL AND SECURITY ISSUES')
							echo '
								<a href="?view=all-tasks10"   > MORE DETAILS</a> ';
								
								
								if ($ts->sector=='COMMUNITY')
							echo '
								<a href="?view=all-tasks11"   > MORE DETAILS</a> ';
								
								
								if ($ts->sector=='FINANCIAL AND ACCOUNTING COMPLIANCE ')
							echo '
								<a href="?view=all-tasks12"   > MORE DETAILS</a> ';
								
								if ($ts->sector=='TAX AND CUSTOMS COMPLIANCE')
							echo '
								<a href="?view=all-tasks13"   > MORE DETAILS</a> ';
								
								if ($ts->sector=='FOREIGN COMPLIANCE')
							echo '
								<a href="?view=all-tasks14"   > MORE DETAILS</a> ';
								
								if ($ts->sector=='CONTRACTUEL OBLIGATIONS RELATING TO THE PERSONNEL')
							echo '
								<a href="?view=all-tasks15"   > MORE DETAILS</a> ';
								
								
								if ($ts->sector=='GLOBAL REPORTING')
							echo '
								<a href="?view=all-tasks16"   > MORE DETAILS</a> ';
								
								
								
								
								
								
								
								?>


</td>
                            
                            <td class="center" height="3" width="114">
								<a href="ajax/update.php?id=<?php echo $ts->id; ?>" class="toggle">Update</a>
							</td>
                        </tr> 
						<?php } ?>   
                        <?php } ?>               
                    </tbody>
                </table>
				<br /><br />
			
			<div class="contenttitle2">
				<h3>All Team Tasks in Exploitation phase</h3>
			</div>
			<?php
				if(isset($_GET['status']))
					$tasks = $t->getExploitationsTasks($_GET['status']);
				else
					$tasks = $t->getExploitationsTasks();
			?>
                <table style="width:800px" cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick">
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
                         
                             <th width="130" class="head0">Main conditions</th>
                            <th width="79" class="head1">Sector of the task</th>
                            <th class="head0">Date for compliance</th>
                            <th width="80" class="head1">Acountable Person</th>
                            <th width="104" class="head1">Due date of the main task</th>
                            <th class="head1">Rate(%)</th>
                            <th class="head1"> Comments</th>
                            <th class="head1">View details</th>
                            <th width="101" class="head0">&nbsp; </th> 
                         
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
                       <?php  if($ts-> valeur == '1') { ?>
                        <tr id="<?php echo $ts->id; ?>">
                             <td class="con0" height="3" width="130"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . utf8_encode($app->replaceDefinitions($ts->cond_cat_title)) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo $app->replaceDefinitions($ts->cond_cat_title); ?> </td>
                             <!--sector-->
                            <td class="center"><?php if($ts->sector_new != '') echo '<span class="task">' . utf8_encode($ts->sector_new) . "<span>$ts->sector_new</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->sector_new)); ?></td>
                            
                             <!--date of complaint-->
                            <td class="con1" height="3" width="85"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td>
                            
                            
                           
                            <!--<td class="con1"><?php /*?><?php if($ts->party_accountable_c != '') echo '<span class="task">' . $ts->party_accountable . "<span>$ts->party_accountable_c</span></span>" ; else echo $app->replaceDefinitions($ts->party_accountable); ?><?php */?></td>-->
                            
                             <!--acountable personne-->
                           <td class="center" height="3" width="80"><?php if($ts->acountable_pers_task != '') echo '<span class="task">' .$t->getNamePerson( $ts->acountable_pers_task ). "<span>$t->getNamePerson($ts->acountable_pers_task) </span></span>" ; else echo $t->getNamePerson($ts-> acountable_pers_task); ?></td>
                            
                             <!--due date-->
                            <td class="con0" height="3" width="104"><?php if($ts->due_date_c != '') echo '<span class="task">' . $ts->due_date . "<span>$ts->due_date_c</span></span>" ; else echo getMysqlToCamironDate($ts->due_date); ?></td>
                            
                            
                            <!--taux de realisation -->
                             <td class="con0" height="3" width="72"><?php if($ts->rate != '') echo '<span class="task">' . $ts->rate . "<span>$ts->rate</span></span>" ; else echo $ts->rate; ?> </td>
                                         
                            
                            
                            <td class="center" height="3" width="71"><?php echo utf8_encode($cmt->getLastComment($ts->id)); ?></td>
                            
                            <td class="center" height="3" width="78">
                           

 <?php
 
 
 
							if ($ts->sector=='MINING FACILITIES')
							echo '
								<a href="?view=all-tasks17"   > MORE DETAILS</a> ';
								else
								
							if ($ts->sector=='BENEFICIAL OPERATIONS COMPLIANCE')
							echo '
								<a href="?view=all-tasks18" > MORE DETAILS</a> ';
									
								else
								if ($ts->sector=='MINERAL TERMINAL OPERATIONS COMPLIANCE')
							echo '
								<a href="?view=all-tasks19" > MORE DETAILS</a> ';
								else
								
								if ($ts->sector=='RAILWAY OPERATIONS COMPLIANCE ')
							echo '
								<a href="?view=all-tasks20"   > MORE DETAILS</a> ';
								
								else
								if ($ts->sector=='BLENDING OPERATIONS COMPLIANCE')
							echo '
								<a href="?view=all-tasks21"   > MORE DETAILS</a> ';
								else
								if ($ts->sector=='MARKETING AND TREASURY MONITORING ISSUES')
							echo '
								<a href="?view=all-tasks22"   > MORE DETAILS</a> ';
								
								else
								if ($ts->sector=='land issues')
							echo '
								<a href="?view=all-tasks23"   > MORE DETAILS</a> ';
								
								else
								if ($ts->sector=='ENVIRONEMENTAL AND SECURITY ISSUES EXPLOITATION PHASE 1')
							echo '
								<a href="?view=all-tasks24"   > MORE DETAILS</a> ';
								else
								
								if ($ts->sector=='COMMUNITY  EXPLOITATION PHASE 1')
							echo '
								<a href="?view=all-tasks25"   > MORE DETAILS</a> ';
								else
								if ($ts->sector=='CONTRATUAL OBLIGATIONS RELATING TO THE PERSONNEL')
							echo '
								<a href="?view=all-tasks26"   > MORE DETAILS</a> ';
								
								else
								if ($ts->sector=='FINANCIAL AND ACCOUNTING COMPLIANCE EXPLOITATION PHASE ')
							echo '
								<a href="?view=all-tasks27"   > MORE DETAILS</a> ';
								else
								if ($ts->sector=='TAX AND CUSTOMS COMPLIANCE')
							echo '
								<a href="?view=all-tasks28"   > MORE DETAILS</a> ';
								else
								if ($ts->sector=='FOREIGN EXCHANGE MONITORING ISSUES')
							echo '
								<a href="?view=all-tasks29"   > MORE DETAILS</a> ';
								else
								if ($ts->sector=='REHABILITATION EXPLOITATION PHASE STAGE 1')
							echo '
								<a href="?view=all-tasks30"   > MORE DETAILS</a> ';
								else
								
								echo '<a href="?view=all-tasks30"   > MORE DETAILS</a>';
								
								
								
								
								
								?>

							</td>
                            
                            <td class="center" height="3" width="101">
								<a href="ajax/update.php?id=<?php echo $ts->id; ?>" class="toggle">Update</a>
							</td>
                        </tr> 
						<?php } ?>                   
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