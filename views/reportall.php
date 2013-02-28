<?php
	$t = new tasks();
	$cmt = new comment();
	global $app;
	
?>
<div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">REPORT VALUE</h1>
            <span class="pagedesc">There are all reports from sector</span>
            
        </div><!--pageheader-->
         <div class="overviewhead">
			<div class="overviewselect">
				<?php /*?><!--<select id="overviewselect3" name="sector_new">
					<option value="">Sector</option>
					<option <?php if(isset($_GET['sector_new']))if($_GET['sector_new']=='Document') echo "SELECTED"; ?> value="Document">Document</option>
					<option <?php if(isset($_GET['sector_new']))if($_GET['sector_new']=='Mine') echo "SELECTED"; ?> value="Mine">Mine</option>
					<option <?php if(isset($_GET['sector_new']))if($_GET['sector_new']=='Rail') echo "SELECTED"; ?> value="Rail">Rail</option>
                    <option <?php if(isset($_GET['sector_new']))if($_GET['sector_new']=='Port') echo "SELECTED"; ?> value="Port">Port</option>
                    
				</select>--><?php */?>
			</div>
		</div><!--overviewhead-->
  <div id="contentwrapper" class="contentwrapper">                                
			
            <div class="contenttitle2">
				<h3>All Reports in Sector : Document</h3>
			</div>
			<?php
				if(isset($_GET['sector_new']))
					$tasks = $t->getReportsTasksConditionsDocument($_GET['sector_new']);
				else
					$tasks = $t->getReportsTasksConditionsDocument();
			?>
<table style="width:100%" cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Main Conditions </th>
                            <th class="head1">Acountable Person</th>
                          <th class="head1">Rate </th>
                            <th class="head1">Date of Compliance </th>
                            <th class="head1">Due date of the main task</th>
                            <th class="head1">Sector</th>
                           
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
                             <td class="con0" height="3" width="200"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . utf8_encode($app->replaceDefinitions($ts->cond_cat_title)) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo utf8_encode($app->replaceDefinitions($ts->cond_cat_title)); ?> </td>
                             
                             
                              <td class="center" height="3" width="150"><?php if($ts->acountable_pers_task != '') echo '<span class="task">' . utf8_encode($ts->acountable_pers_task) . "<span>$ts->acountable_pers_task</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->acountable_pers_task)); ?></td>
                             
                           <td class="con0" height="3" width="100"> <?php if($ts->rate != '') echo '<span class="task">' . $ts->rate . "<span>$ts->rate</span></span>" ; else echo $ts->rate; ?> </td>
                           
                                         <td class="con1" width="100"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td> 
                                         
                                         
                                          <td class="con0" height="3" width="150"><?php if($ts->due_date_main_task != '') echo '<span class="task">' . $ts->due_date_main_task . "<span>$ts->due_date_main_task </span></span>" ; else echo getMysqlToCamironDate($ts->due_date_main_task); ?></td>
                             
                             
                       <td class="center" height="3" width="150"><?php if($ts->sector_new != '') echo '<span class="task">' . utf8_encode($ts->sector_new) . "<span>$ts->sector_new</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->sector_new)); ?></td>
                       
                            
               
                        </tr> 
						<?php } ?> 
                        <?php } ?>                 
                    </tbody>
    </table>              
              
              
              
          <br />
          
          
          
          <div class="contenttitle2">
				<h3>All Reports in sector : Rail</h3>
			</div>
			<?php
				if(isset($_GET['sector_new']))
					$tasks = $t->getReportsTasksConditionsRail($_GET['sector_new']);
				else
					$tasks = $t->getReportsTasksConditionsRail();
			?>
<table style="width:100%" cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Main Conditions </th>
                            <th class="head1">Acountable Person</th>
                          <th class="head1">Rate </th>
                            <th class="head1">Date of Compliance </th>
                            <th class="head1">Due date of the main task</th>
                            <th class="head1">Sector</th>
                           
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
                             <td class="con0" height="3" width="200"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . utf8_encode($app->replaceDefinitions($ts->cond_cat_title)) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo utf8_encode($app->replaceDefinitions($ts->cond_cat_title)); ?> </td>
                             
                             
                              <td class="center" height="3" width="150"><?php if($ts->acountable_pers_task != '') echo '<span class="task">' . utf8_encode($ts->acountable_pers_task) . "<span>$ts->acountable_pers_task</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->acountable_pers_task)); ?></td>
                             
                           <td class="con0" height="3" width="100"> <?php if($ts->rate != '') echo '<span class="task">' . $ts->rate . "<span>$ts->rate</span></span>" ; else echo $ts->rate; ?> </td>
                           
                                         <td class="con1" width="100"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td> 
                                         
                                         
                                          <td class="con0" height="3" width="150"><?php if($ts->due_date_main_task != '') echo '<span class="task">' . $ts->due_date_main_task . "<span>$ts->due_date_main_task </span></span>" ; else echo getMysqlToCamironDate($ts->due_date_main_task); ?></td>
                             
                             
                       <td class="center" height="3" width="150"><?php if($ts->sector_new != '') echo '<span class="task">' . utf8_encode($ts->sector_new) . "<span>$ts->sector_new</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->sector_new)); ?></td>
                       
                            
               
                        </tr> 
						<?php } ?> 
                        <?php } ?>                 
                    </tbody>
    </table>              
           <br>
           
              
		
          <div class="contenttitle2">
				<h3>All Reports in Sector : Mine</h3>
			</div>
			<?php
				if(isset($_GET['sector_new']))
					$tasks = $t->getReportsTasksConditionsMine($_GET['sector_new']);
				else
					$tasks = $t->getReportsTasksConditionsMine();
			?>
<table style="width:100%" cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Main Conditions </th>
                            <th class="head1">Acountable Person</th>
                          <th class="head1">Rate </th>
                            <th class="head1">Date of Compliance </th>
                            <th class="head1">Due date of the main task</th>
                            <th class="head1">Sector</th>
                           
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
                             <td class="con0" height="3" width="200"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . utf8_encode($app->replaceDefinitions($ts->cond_cat_title)) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo utf8_encode($app->replaceDefinitions($ts->cond_cat_title)); ?> </td>
                             
                             
                              <td class="center" height="3" width="150"><?php if($ts->acountable_pers_task != '') echo '<span class="task">' . utf8_encode($ts->acountable_pers_task) . "<span>$ts->acountable_pers_task</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->acountable_pers_task)); ?></td>
                             
                           <td class="con0" height="3" width="100"> <?php if($ts->rate != '') echo '<span class="task">' . $ts->rate . "<span>$ts->rate</span></span>" ; else echo $ts->rate; ?> </td>
                           
                                         <td class="con1" width="100"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td> 
                                         
                                         
                                          <td class="con0" height="3" width="150"><?php if($ts->due_date_main_task != '') echo '<span class="task">' . $ts->due_date_main_task . "<span>$ts->due_date_main_task </span></span>" ; else echo getMysqlToCamironDate($ts->due_date_main_task); ?></td>
                             
                             
                       <td class="center" height="3" width="150"><?php if($ts->sector_new != '') echo '<span class="task">' . utf8_encode($ts->sector_new) . "<span>$ts->sector_new</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->sector_new)); ?></td>
                       
                            
               
                        </tr> 
						<?php } ?> 
                        <?php } ?>                 
                    </tbody>
    </table>              	
        </div>
        
        
          <div class="contenttitle2">
				<h3>All Reports in Sector : Port</h3>
			</div>
			<?php
				if(isset($_GET['sector_new']))
					$tasks = $t->getReportsTasksConditionsPort($_GET['sector_new']);
				else
					$tasks = $t->getReportsTasksConditionsPort();
			?>
<table style="width:100%" cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Main Conditions </th>
                            <th class="head1">Acountable Person</th>
                          <th class="head1">Rate </th>
                            <th class="head1">Date of Compliance </th>
                            <th class="head1">Due date of the main task</th>
                            <th class="head1">Sector</th>
                           
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
                             <td class="con0" height="3" width="200"> <?php if($ts->cond_cat_title_c != '') { echo '<span class="task">' . utf8_encode($app->replaceDefinitions($ts->cond_cat_title)) . "<span>$ts->cond_cat_title_c</span></span>" ; } else echo utf8_encode($app->replaceDefinitions($ts->cond_cat_title)); ?> </td>
                             
                             
                              <td class="center" height="3" width="150"><?php if($ts->acountable_pers_task != '') echo '<span class="task">' . utf8_encode($ts->acountable_pers_task) . "<span>$ts->acountable_pers_task</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->acountable_pers_task)); ?></td>
                             
                           <td class="con0" height="3" width="100"> <?php if($ts->rate != '') echo '<span class="task">' . $ts->rate . "<span>$ts->rate</span></span>" ; else echo $ts->rate; ?> </td>
                           
                                         <td class="con1" width="100"><?php if($ts->deadline_c != '') echo '<span class="task">' . $ts->deadline . "<span>$ts->deadline_c</span></span>" ; else echo getMysqlToCamironDate($ts->deadline); ?></td> 
                                         
                                         
                                          <td class="con0" height="3" width="150"><?php if($ts->due_date_main_task != '') echo '<span class="task">' . $ts->due_date_main_task . "<span>$ts->due_date_main_task </span></span>" ; else echo getMysqlToCamironDate($ts->due_date_main_task); ?></td>
                             
                             
                       <td class="center" height="3" width="150"><?php if($ts->sector_new != '') echo '<span class="task">' . utf8_encode($ts->sector_new) . "<span>$ts->sector_new</span></span>" ; else echo utf8_encode($app->replaceDefinitions($ts->sector_new)); ?></td>
                       
                            
               
                        </tr> 
						<?php } ?> 
                        <?php } ?>                 

                    </tbody>
    </table>              	
        </div>
        
</div>
<script type="text/javascript">
jQuery('#overviewselect3').change(function(){
		window.location = '<?php echo $_SERVER['REQUEST_URI']; ?>&sector_new='+jQuery('#overviewselect3').val();
	});
</script>