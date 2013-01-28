<?php
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
                        <h3>Reports of General overview</h3>
                    </div><!--contenttitle-->
                    
					<table style="border: 1px solid #CCCCCC;" width="100%" border="1" cellspacing="0" cellpadding="2">
  <tr>
    <th width="8%" scope="row">&nbsp;</th>
    <td width="6%">&nbsp;</td>
    <td width="42%"><img src="images/logot.png" style="width:100%" /></td>
    <td width="11%" colspan="3" style="padding:10px">
		<div style="border : 4px solid #ddd;width:96%;height:15px;background-color:orange; margin-bottom:10px"></div>
		<div style="border : 4px solid #ddd;width:96%;height:15px;background-color:green; margin-bottom:10px"></div>
		<div style="border : 4px solid #ddd;width:96%;height:15px;background-color:#c92b66; margin-bottom:10px"></div>
	</td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr>
    <th rowspan="2" scope="row" style="background-color: #718430;color: white;font-size: 20px;line-height: 50px;padding: 0;text-align: center;">Convention Signing: 29/11/2012</th>
    <td rowspan="2" style="background-color: #718430;color: white;font-size: 20px;line-height: 50px;padding: 0;text-align: center;">&nbsp;</td>
    <td rowspan="2">Conditions Precedent  / Obligation</td>
    <td colspan="3">Status</td>
    <td rowspan="2">Comments</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">6 months</th>
    <td rowspan="7">&nbsp;</td>
    <td>Delivery of an update Feasibility Study</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">9 months</th>
    <td>Submit to the State the Commitment Letter for the Debt required by the Project</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th rowspan="5" scope="row">18 months</th>
    <td>Complete the Project Financing</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Incorporate the Project Companies</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Execute all Agreements necessary for the Project</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Agree with the Government on a list of pre-approved Qualified Contractors</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Completion of the Convention and issuance of the Mining Permit</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
					
                    <br />

    </div><!--subcontent-->
</div>
</div>
<script type="text/javascript" src="js/users.js"></script>