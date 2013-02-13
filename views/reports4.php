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
                    
			<table style="border: 1px solid #CCCCCC;color:#000" width="81%" border="1" cellspacing="0" cellpadding="2">
  <tr>
    <th width="14%" rowspan="2" style="font-size: 15px;line-height: 17px;padding: 0;text-align: center;vertical-align: middle;" scope="row">Date of First Commercial Shipping</th>
    <td width="8%" rowspan="2" style="height: 50px;padding: 0;text-align: center;vertical-align: middle;" ><img height="50px" src="images/losange.png" style="width:" /></td>
    <td width="40%" rowspan="2"  style="background-color: #6f763f;color: white;font-size: 20px;line-height: 25px;padding: 0;text-align: center;vertical-align: middle;">Conditions Precedent  / Obligation</td>
    <td colspan="3"  style="background-color: #6f763f;color: white;font-size: 20px;line-height: 25px;padding: 0;text-align: center;">Status</td>
    <td width="20%" rowspan="2"  style="background-color: #6f763f;color: white;font-size: 20px;line-height: 25px;padding: 0;text-align: center;vertical-align: middle;">Comments</td>
  </tr>
  <tr>
    <td width="6%"><div style="border : 1px solid #ddd;width:96%;background-color:orange;height:30px"></div></td>
    <td width="6%"><div style="border : 1px solid #ddd;width:96%;background-color:green;height:30px"></div></td>
    <td width="6%"><div style="border : 1px solid #ddd;width:96%;background-color:#c92b66;height:30px"></div></td>
  </tr>
  <tr style="line-height: 50px;" border="1">
    <th valign="bottom" scope="row">End of Stage 1</th>
    <td style="border: 1px solid #000000;text-align: center;vertical-align: middle;"><img src="images/fleche2.png" width="47" height="252" /></td>
    <td style="vertical-align: middle; border: 1px solid #000000; padding: 5px;">Exploitation Stage 1: the maximum capacity of the Railway Facilities and Mineral Terminal Facilities acheives or is demonstrated to acheive 35 millions Tonne per year or fourth anniversary from the Date of First Commercial Shipping</td>
    <td colspan="3" style="vertical-align: middle;border: 1px solid #000000;padding: 5px;">&nbsp;</td>
    <td style="vertical-align: middle;border: 1px solid #000000;padding: 5px;">&nbsp;</td>
  </tr>
  </table>

					
                    <br />
                    <br />
                    <br />
			<table style="border: 1px solid #CCCCCC;color:#000" width="90%" border="1" cellspacing="0" cellpadding="2">
  <tr>
    <th width="19%" rowspan="2" style="font-size: 15px;line-height: 17px;padding: 0;text-align: center;vertical-align: middle;" scope="row">Starting Point</th>
    <td width="8%" rowspan="2" style="height: 50px;padding: 0;text-align: center;vertical-align: middle;" ><img height="50px" src="images/losange.png" style="width:" /></td>
    <td width="37%" rowspan="2"  style="background-color: #6f763f;color: white;font-size: 20px;line-height: 25px;padding: 0;text-align: center;vertical-align: middle;">Conditions Precedent  / Obligation</td>
    <td colspan="3"  style="background-color: #6f763f;color: white;font-size: 20px;line-height: 25px;padding: 0;text-align: center;">Status</td>
    <td width="16%" rowspan="2"  style="background-color: #6f763f;color: white;font-size: 20px;line-height: 25px;padding: 0;text-align: center;vertical-align: middle;">Comments</td>
  </tr>
  <tr>
    <td width="6%"><div style="border : 1px solid #ddd;width:96%;background-color:orange;height:30px"></div></td>
    <td width="7%"><div style="border : 1px solid #ddd;width:96%;background-color:green;height:30px"></div></td>
    <td width="7%"><div style="border : 1px solid #ddd;width:96%;background-color:#c92b66;height:30px"></div></td>
  </tr>
  <tr style="line-height: 50px;" border="1">
    <th valign="top" scope="row">End of Stage 1</th>
    <td rowspan="2" style="border: 1px solid #000000;text-align: center;vertical-align: middle;"><img src="images/fleche2.png" width="47" height="252" /></td>
    <td rowspan="2" style="vertical-align: middle; border: 1px solid #000000; padding: 5px;">Exploitation Stage 1: the maximum capacity of the Railway Facilities and Mineral Terminal Facilities acheives or is demonstrated to acheive 35 millions Tonne per year or fourth anniversary from the Date of First Commercial Shipping</td>
    <td colspan="3" rowspan="2" style="vertical-align: middle; border: 1px solid #000000; padding: 5px;">&nbsp;</td>
    <td rowspan="2" style="vertical-align: middle; border: 1px solid #000000; padding: 5px;">&nbsp;</td>
  </tr>
  <tr style="line-height: 50px;" border="1">
    <th valign="bottom" scope="row">Term of the Convention</th>
  </tr>
  </table>



    </div><!--subcontent-->
</div>
</div>
<script type="text/javascript" src="js/users.js"></script>