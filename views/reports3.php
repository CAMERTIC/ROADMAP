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
                    
	<table style="border: 1px solid #CCCCCC;color:#000" width="100%" border="1" cellspacing="0" cellpadding="2">
  <tr>
    <th width="13%" scope="row">&nbsp;</th>
    <td width="8%">&nbsp;</td>
    <td width="42%"><img src="images/logot.png" style="width:100%" /></td>
    <td colspan="3" style="padding:10px">
		<div style="border : 4px solid #ddd;width:96%;height:15px;background-color:orange; margin-bottom:10px"></div>
		<div style="border : 4px solid #ddd;width:96%;height:15px;background-color:green; margin-bottom:10px"></div>
		<div style="border : 4px solid #ddd;width:96%;height:15px;background-color:#c92b66; margin-bottom:10px"></div>
	</td>
    <td width="21%">&nbsp;</td>
  </tr>
  <tr>
    <th rowspan="2" scope="row" style="font-size: 15px;line-height: 17px;padding: 0;text-align: center;vertical-align: middle;">Date of First Commercial Shipping</th>
    <td rowspan="2" style="height: 50px;padding: 0;text-align: center;vertical-align: middle;" ><img height="50px" src="images/losange.png" style="width:" /></td>
    <td rowspan="2"  style="background-color: #6f763f;color: white;font-size: 20px;line-height: 25px;padding: 0;text-align: center;vertical-align: middle;">Conditions Precedent  / Obligation</td>
    <td colspan="3"  style="background-color: #6f763f;color: white;font-size: 20px;line-height: 25px;padding: 0;text-align: center;">Status</td>
    <td rowspan="2"  style="background-color: #6f763f;color: white;font-size: 20px;line-height: 25px;padding: 0;text-align: center;vertical-align: middle;">Comments</td>
  </tr>
  <tr>
    <td width="6%"><div style="border : 1px solid #ddd;width:96%;background-color:orange;height:30px"></div></td>
    <td width="5%"><div style="border : 1px solid #ddd;width:96%;background-color:green;height:30px"></div></td>
    <td width="5%"><div style="border : 1px solid #ddd;width:96%;background-color:#c92b66;height:30px"></div></td>
  </tr>
  <tr style="line-height: 50px;" border="1">
    <th valign="bottom" scope="row">36 months</th>
    <td rowspan="4" style="border: 1px solid #000000;text-align: center;vertical-align: middle;"><img src="images/fleche.png" width="60px" /></td>
    <td style="vertical-align: middle; border: 1px solid #000000; padding: 5px;">Provide the State with the Beneficiation Feasibility Study and the Beneficiation Power Station Feasibility Study</td>
    <td colspan="3" style="vertical-align: middle;border: 1px solid #000000;padding: 5px;">&nbsp;</td>
    <td style="vertical-align: middle;border: 1px solid #000000;padding: 5px;">&nbsp;</td>
  </tr>
  <tr>
    <th valign="bottom"  style="-moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-right-colors: none; -moz-border-top-colors: none; border-color: #000000 #000000 #000000 -moz-use-text-color;  border-image: none; border-style: solid solid solid none; border-width: 1px 1px 1px medium; height: 122px; vertical-align: bottom; " scope="row">84 months</th>
    <td  style="vertical-align: middle; border: 1px solid #000000; padding: 5px;">BF Construction Commencement Date and BF Power Station Commencement Date</td>
    <td style="vertical-align: middle;border: 1px solid #000000;padding: 5px;" colspan="3">&nbsp;</td>
    <td style="vertical-align: middle;border: 1px solid #000000;padding: 5px;">&nbsp;</td>
  </tr>
  <tr>
    <th valign="bottom" style="-moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-right-colors: none; -moz-border-top-colors: none; border-color: #000000 #000000 #000000 -moz-use-text-color;  border-image: none; border-style: solid solid solid none; border-width: 1px 1px 1px medium; height: 122px; vertical-align: bottom; " scope="row">120 months</th>
    <td style="vertical-align: middle;border: 1px solid #000000;padding: 5px;">End of BF Construction Facility and End of BF Power Station Facility</td>
    <td colspan="3" style="vertical-align: middle;border: 1px solid #000000;padding: 5px;">&nbsp;</td>
    <td style="vertical-align: middle;border: 1px solid #000000;padding: 5px;">&nbsp;</td>
  </tr>
  <tr>
    <th valign="bottom" style="-moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-right-colors: none; -moz-border-top-colors: none; border-color: #000000 #000000 #000000 -moz-use-text-color;  border-image: none; border-style: solid solid solid none; border-width: 1px 1px 1px medium; height: 122px; vertical-align: bottom; " scope="row">365 Days after BF Construction</th>
    <td style="vertical-align: middle;border: 1px solid #000000;padding: 5px;">BF Commissioning</td>
    <td style="vertical-align: middle;border: 1px solid #000000;padding: 5px;" colspan="3">&nbsp;</td>
    <td style="vertical-align: middle;border: 1px solid #000000;padding: 5px;">&nbsp;</td>
  </tr>
</table>


					
                    <br />

    </div><!--subcontent-->
</div>
</div>
<script type="text/javascript" src="js/users.js"></script>