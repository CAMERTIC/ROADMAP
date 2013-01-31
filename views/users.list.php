<?php
	$user_ldap = new rc_users();
	$users = $user_ldap->getAllRecords();
	// echo "<pre>";
	// var_dump($users);
?>

<div class="centercontent tables">
			<div class="pageheader notab">
			<h1 class="pagetitle">Users management</h1>
			<span class="pagedesc">Edit informations on user or delete them</span>
			
		</div><!--pageheader-->
<div id="contentwrapper" class="contentwrapper">
		 <div class="contenttitle2">
                	<h3>Manage users</h3>
                </div><!--contenttitle-->
				 <div class="tableoptions">
                	<button class="deletebutton radius3" title="table2">Delete Selected</button> &nbsp;
                    <select class="radius3">
                        <option value="">Show All</option>
                    	<option value="">Managers</option>
                        <option value="">Users</option>
                    </select> &nbsp;
                    <button class="radius3">Apply Filter</button>
                </div><!--tableoptions-->	
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
                    <colgroup>
                        <col class="con0" style="width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                          <th class="head0 nosort"></th>
                            <th class="head0">Login</th>
                            <th class="head1">Names</th>
                            <th class="head0">User group</th>
                            <th class="head1">Team</th>
                            <th class="head0">Email</th>
                            <th class="head1"></th>
                        </tr>
                    </thead>
                   
                    <tbody>
                      <?php foreach($users as $u) { ?>
                    
                        <tr class="gradeA">
                          <td align="center"><span class="center">
                            <input type="checkbox" />
                          </span></td>
                            <td><a href="?view=users&layout=edit&login=<?php echo $u->login ?>"><?php echo $u->login ?></a></td>
                            <td><?php echo $u->noms ?></td>
                            <td><?php if($u->gp == 1) echo "User"; else "Manager"; ?></td>
                            <td class="center"><?php echo $user_ldap->getTeamName($u->team); ?></td>
                            <td class="center"><?php echo $u->email  ?></td>
                            <td class="center"></td>
                        </tr>
					<?php } ?>
                        
                    </tbody>
                </table>
           <br /><br />
	</div>
</div>
<script type="text/javascript" src="js/users.js"></script>
<script type="text/javascript">

</script>