<?php
	$t = new tasks();
	$tasks = $t->getAllRecords();
	
	$u = new rc_users;
	$users = $u->getAllRecords();
	//var_dump($tasks);
?>
<div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Within 6 months Tasks</h1>
            <span class="pagedesc">There are all tasks you are responsible of</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">                                
			<div class="contenttitle2">
				<h3>
					<?php if(isset($_GET['filter']))
						switch($_GET['filter']) {
							case '6' :  echo 'Tasks within 6 months of date compliance'; break;
							case '12' :  echo 'Tasks within 12 months of date compliance'; break;
							case '18' :  echo 'Tasks within 18 months of date compliance'; break;
						}
						?>
				</h3>
			</div><!--contenttitle-->
            
			<div class="overviewhead">
				<div class="overviewselect">
					<select id="overviewselect" name="select">
						<option value="">Type</option>
						<option value="">Conditions</option>
						<option value="">Constructions</option>
						<option value="">Exploitation</option>
					</select>
				</div>
				<div class="overviewselect">
					<select id="overviewselect2" name="select2">
						<option value="">User</option>
						<option value="">Bruno</option>
						<option value="">Herve</option>
						<option value="">Admin</option>
					</select>
				</div>
				<div class="overviewselect">
					<select id="overviewselect3" name="select3">
						<option value="">Status</option>
						<option value="">All</option>
						<option value="">In progress</option>
						<option value="">On hold</option>
						<option value="">Closed</option>
					</select>
				</div>
				<h3>Apply Filters: &nbsp;</h3>
			</div><!--overviewhead-->
			
			<br clear="all" />
                <table style="width:150%" cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick">
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
                            <th class="head1">&nbsp;</th>
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
                        <tr>
                            <td class="con0"> <?php /*if($ts->cond_cat_title_c != '') */ echo $ts->cond_cat_title; ?> </td>
                            <td class="center"><a href="my-task.php?id=2"><?php echo $ts->required_action; ?></a></td>
                            <td class="con1"><?php echo getMysqlToCamironDate($ts->deadline);; ?></td>
                            <td class="con1"><?php echo $ts->party_accountable; ?></td>
                            <td class="con0"><?php echo $ts->person_in_charge; ?></td>
                            <td class="con0"><?php echo getMysqlToCamironDate($ts->due_date); ?></td>
                            <td class="con0"><?php echo $ts->status; ?></td>
                            <td class="center"><?php echo $ts->authority_accountable; ?></td>
                            <td class="center"><?php echo $ts->input_camiron; ?></td>
                            <td class="center"><?php echo $ts->input_state; ?></td>
                            <td class="center"><?php echo $ts->output; ?></td>
                            <td class="center"><?php echo $ts->risk_sanction; ?></td>
                            <td class="center"><a href="ajax/updatetask.php?id=<?php echo $ts->id; ?>" class="toggle">Update</a></td>
                            <td class="center"><a class="btn btn4 btn_yellow btn_search radius50" href="#"></a></td>
                        </tr> 
						<?php } ?>
                    </tbody>
                </table>
              
                <br /><br />
        
        </div><!--contentwrapper-->
        
</div><!-- centercontent -->
   