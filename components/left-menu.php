<ul>
	<li <?php if(isset($_GET['view'])) if($_GET['view']=='my-tasks') { echo 'class="current"'; } ?>><a href="#formsub" class="editor">MY TASKS</a>
		<span class="arrow"></span>
		<ul id="formsub">
			<li><a href="?view=my-tasks&filter=all">ALL</a></li>
			<li><a href="?view=my-tasks&filter=in-progress">In progress</a></li>
			<li><a href="?view=my-tasks&filter=on-hold">On hold</a></li>
			<li><a href="?view=my-tasks&filter=closed">Closed</a></li>
		</ul>
	</li>
	<li <?php if(isset($_GET['view'])) if($_GET['view']=='conditions') { echo 'class="current"'; } ?>><a href="#addons" class="addons">Conditions</a>
		<span class="arrow"></span>
		<ul id="addons">
			<li><a href="?view=conditions&period=6">6 months</a></li>
			<li><a href="?view=conditions&period=12">12 months</a></li>
			<li><a href="?view=conditions&period=18">18 months</a></li>
		</ul>
	</li>
	<li <?php if(isset($_GET['view'])) if($_GET['view']=='construction') { echo 'class="current"'; } ?>><a href="#error" class="error">Construction</a>
		<span class="arrow"></span>
		<ul id="error">
			<li><a href="?view=construction&period=6">6 months</a></li>
			<li><a href="?view=construction&period=12">12 months</a></li>
			<li><a href="?view=construction&period=18">18 months</a></li>
		</ul>
	</li>
	<li <?php if(isset($_GET['view'])) if($_GET['view']=='exploitation') { echo 'class="current"'; } ?>><a href="#add" class="typo">Exploitation</a>
		<span class="arrow"></span>
		<ul id="add">
			<li><a href="?view=exploitation&period=6">6 months</a></li>
			<li><a href="?view=exploitation&period=12">12 months</a></li>
			<li><a href="?view=exploitation&period=18">18 months</a></li>
		</ul>
	</li>
</ul>
<a class="togglemenu"></a>
<br /><br />