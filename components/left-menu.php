<ul>
	<li <?php if(isset($_GET['view'])) if($_GET['view']=='my-tasks' || $_GET['view']=='team-tasks' || $_GET['view']=='all-tasks') { echo 'class="current"'; } ?>><a href="#formsub" class="editor">TASKS</a>
		<span class="arrow"></span>
		<ul id="formsub">
			<li <?php if(isset($_GET['view'])) if($_GET['view']=='my-tasks') { echo 'class="current"'; } ?>><a href="?view=my-tasks">My tasks</a></li>
			<li <?php if(isset($_GET['view'])) if($_GET['view']=='team-tasks') { echo 'class="current"'; } ?>><a href="?view=team-tasks">Team tasks</a></li>
			<li <?php if(isset($_GET['view'])) if($_GET['view']=='all-tasks') { echo 'class="current"'; } ?>><a href="?view=all-tasks">All tasks</a></li>
		</ul>
	</li>
	<li <?php if(isset($_GET['view'])) if($_GET['view']=='conditions') { echo 'class="current"'; } ?>><a href="#addons" class="addons">Conditions</a>
		<span class="arrow"></span>
		<ul id="addons">
			<li><a href="?view=conditions&filter=6">6 months</a></li>
			<li><a href="?view=conditions&filter=9">9 months</a></li>
			<li><a href="?view=conditions&filter=18">18 months</a></li>
		</ul>
	</li>
	<li <?php if(isset($_GET['view'])) if($_GET['view']=='constructions') { echo 'class="current"'; } ?>><a href="#error" class="error">Construction</a>
		<span class="arrow"></span>
		<ul id="error">
			<li><a href="?view=constructions&filter=Mining Facilities">Mining Facilities</a></li>
			<li><a href="?view=constructions&filter=Railway Facilities">Railway Facilities</a></li>
			<li><a href="?view=constructions&filter=Mineral Terminal Facilities">Mineral Terminal Facilities</a></li>
			<li><a href="?view=constructions&filter=Beneficiation Facilities">Beneficiation Facilities</a></li>
			<li><a href="?view=constructions&filter=Other Project Facilities">Other Project Facilities</a></li>
			<li><a href="?view=constructions&filter=Land Issues">Land Issues</a></li>
			<li><a href="?view=constructions&filter=Environemental and Security Issues">Environemental and Security Issues</a></li>
			<li><a href="?view=constructions&filter=Community">Community</a></li>
			<li><a href="?view=constructions&filter=Financial and Accounting Compliance">Financial and Accounting Compliance</a></li>
			<li><a href="?view=constructions&filter=Tax and customs Compliance">Tax and customs Compliance</a></li>
			<li><a href="?view=constructions&filter=Foreign Compliance">Foreign Compliance</a></li>
			<li><a href="?view=constructions&filter=Contractual Obligations Relating to the Personnel">Contractual Obligations Relating to the Personnel</a></li>
			<li><a href="?view=constructions&filter=Global Reporting">Global Reporting</a></li>
		</ul>
	</li>
	<li <?php if(isset($_GET['view'])) if($_GET['view']=='exploitation') { echo 'class="current"'; } ?>><a href="#add" class="typo">Exploitation</a>
		<span class="arrow"></span>
		<ul id="add">
			<li><a href="?view=exploitation&filter=Mining Operations Compliance">Mining Operations Compliance</a></li>
			<li><a href="?view=exploitation&filter=Beneficiation Operations Compliance">Beneficiation Operations Compliance</a></li>
			<li><a href="?view=exploitation&filter=Mineral Terminal Operations Compliance">Mineral Terminal Operations Compliance</a></li>
			<li><a href="?view=exploitation&filter=Railway Operations Compliance">Railway Operations Compliance</a></li>
			<li><a href="?view=exploitation&filter=Blending Operations Compliance">Blending Operations Compliance</a></li>
			<li><a href="?view=exploitation&filter=Marketing and Treasury Monitoring Issues">Marketing and Treasury Monitoring Issues</a></li>
			<li><a href="?view=exploitation&filter=Land Issues">Land Issues</a></li>
			<li><a href="?view=exploitation&filter=Environmental And Security Issues Exploitation Phase 1">Environmental And Security Issues Exploitation Phase 1</a></li>
			<li><a href="?view=exploitation&filter=Community exploitation phase 1">Community exploitation phase 1</a></li>
			<li><a href="?view=exploitation&filter=Contractual Obligations Relating to the Pesonnel">Contractual Obligations Relating to the Pesonnel</a></li>
			<li><a href="?view=exploitation&filter=Financial and Accounting Compliance exploitation phase">Financial and Accounting Compliance exploitation phase</a></li>
			<li><a href="?view=exploitation&filter=Tax and Customs Compliance">Tax and Customs Compliance</a></li>
			<li><a href="?view=exploitation&filter=Foreign Exchange Monitoring Issues">Foreign Exchange Monitoring Issues</a></li>
			<li><a href="?view=exploitation&filter=Rehabilitation exploitation phase stage 1">Rehabilitation exploitation phase stage 1</a></li>
		</ul>
	</li>
</ul>
<a class="togglemenu"></a>
<br /><br />