
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Contaminats</h2>
			<span class="add" onclick="window.location='?view=lcontaminat'">List</span>
		</div>
		<div class="content forms">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Contaminats</legend>
					<div class="line microps">
						<div class="finput first">
							<label>Name</label>
							<input id="contaminatname" name="contaminatname" type="text" class="small" value="" style="margin-left : 50px;" />
						</div>
						<div class="sfinput">
							<label style="margin-left : 20px;">GWP</label>
							<input id="gwp" name="gwp" type="text" class="small" value="" style="margin-left : 60px;" />
						</div>
						<div class="sfinput">
							<label style="margin-left : 20px;">Source</label>
							<input id="source" name="source" type="text" class="medium" value="" style="margin-left : 60px;" />
						</div>
					</div>
					
					<div id="newuser">
						
					</div>
				</fieldset>
				<div class="centerbutton" style="width: 100%; text-align: center;">
					<button class="green medium" type="button" onclick="addUser();"><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
				
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/users.js"></script>