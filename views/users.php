
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Users</h2>
			<span onclick="window.location='?view=lusers'" class="add">List</span>
		</div>
		<div class="content forms">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<div id="subhead">
				<a href="#"><img src="gfx/table-first.gif" /></a>
				<input id="user" type="text" class="medium" value="" />
				<a href="#"><img src="gfx/table-last.gif" /></a>
			</div>
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Users</legend>
					<div id="lesinputs">
						<div class="line">
							<div class="finput">
								<label>User</label>
								<input id="username" type="text" class="small" value="" />
							</div>
							<div class="finput">
								<label>Name</label>
								<input id="name" type="text" class="small" value="" />
							</div>
							<div class="finput">
								<label>Phone</label>
								<input id="phone" type="text" class="small" value="" />
							</div>
							<div class="finput">
								<label>Enterprise</label>
								<input type="text" id="enterprise" class="small" value="" />
								<span onclick="selectentreprise();" class="list" style="opacity: 1;">Last</span>
							</div>
						</div>
						<div class="nextline">
							<div class="finput">
								<label>Pass</label>
								<input id="pass" type="password" class="small" value="" />
							</div>
							<div class="finput">
								<label>Surname</label>
								<input id="surname" type="text" class="small" value="" />
							</div>
							<div class="finput">
								<label>Email</label>
								<input id="email" type="text" class="small" value="" />
							</div>
							<div class="finput">
								<label>Group</label>
								<input id="group" type="text" class="small" value="" />
								<span onclick="selectgroup();" class="list" style="opacity: 1;">Last</span>
							</div>
						</div>
						<div class="line">
							<div class="finput">
								<label>Group</label>
								<select id="group">
									<option value="es">Spanish</value>
									<option value="en">English</value>
								</select>
							</div>
						</div>
						
					</div>
				</fieldset>
				<div class="centerbutton" style="width: 70%; float: left; text-align: center;">
					<button class="green medium" type="button" onclick="addUser();"><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
				<div style="text-align : right">
					<button class="green medium" onclick="showForm('newuser');" type="button"><span>Add</span></button>
				</div>
			</form> 
		</div>
	</div>
</div>
<div id="list" class="box" style="position:absolute; display:none;">
	<div class="title">
		<h2>Users</h2>
		<span class="hide"></span>
	</div>
</div>
<script type="text/javascript" src="js/users.js"></script>