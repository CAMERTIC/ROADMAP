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
                        <h3>Support</h3>
                    </div><!--contenttitle-->
                    <div class="notibar msginfo">
                        <a class="close"></a>
                        <p>The support is not yet vailable ... You will be informed as soon as it is. Thank you.</p>
                    </div><!-- notification msgsuccess -->
					

		</div><!--subcontent-->
	</div>
</div>