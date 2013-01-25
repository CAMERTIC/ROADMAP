<ul>
	<li><a href="#formsub" class="editor">TASKS</a>
		<span class="arrow"></span>
		<ul id="formsub">
			<li><a href="?view=tasks">tasks</a></li>
			<li><a href="?view=sheet&layout=upload">Upload Sheet</a></li>
			<li><a href="?view=sheet&layout=create">Create new</a></li>
		</ul>
	</li>
	<li><a href="#addons" class="addons">Conditions</a>
		<span class="arrow"></span>
		<ul id="addons">
			<li><a href="?view=conditions&filter=6&">6 months</a></li>
			<li><a href="?view=conditions&filter=12&">12 months</a></li>
			<li><a href="?view=conditions&filter=18&">18 months</a></li>
		</ul>
	</li>
	<li <?php if(isset($_GET['view'])) if($_GET['view']=='construction') { echo 'class="current"'; } ?>><a href="#error" class="error">Construction</a>
		<span class="arrow"></span>
		<ul id="error">
			<li><a href="?view=constructions&period=6">Mining Facilities</a></li>
			<li><a href="?view=constructions&period=6">Mineral Terminal Facilities</a></li>
			<li><a href="?view=constructions&period=6">Railway Facilities</a></li>
			<li><a href="?view=constructions&period=6">Other Facilities</a></li>
		</ul>
	</li>
	<li <?php if(isset($_GET['view'])) if($_GET['view']=='exploitation') { echo 'class="current"'; } ?>><a href="#add" class="typo">Exploitation</a>
		<span class="arrow"></span>
		<ul id="add">
			<li><a href="?view=exploitation&period=6">6 months</a></li>
		</ul>
	</li>
	<li <?php if(isset($_GET['view'])) if($_GET['view']=='users') { echo 'class="current"'; } ?>><a href="#users" class="editor">Users</a>
		<span class="arrow"></span>
		<ul id="users">
			<li><a href="?view=users&layout=list">All users</a></li>
			<li><a href="?view=users&layout=new">add new</a></li>
			<li><a href="?view=users&layout=logs">Logs</a></li>
		</ul>
	</li>
	<li><a href="#set" class="editor">Settings</a>
		<span class="arrow"></span>
		<ul id="set">
			<li><a href="#">Mail</a></li>
			<li><a href="#">parameters</a></li>
			<li><a href="#">dates</a></li>
			<li><a href="#">print reports</a></li>
			<li><a href="#">Dictionary</a></li>
		</ul>
	</li>
</ul>
<a class="togglemenu"></a>
<br /><br />