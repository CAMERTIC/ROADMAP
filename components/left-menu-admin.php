<ul>
	<li <?php if(isset($_GET['view'])) if($_GET['view']=='tasks' || $_GET['view']=='sheet') { echo 'class="current"'; } ?>><a href="#formsub" class="editor">TASKS</a>
		<span class="arrow"></span>
		<ul id="formsub">
			<li><a href="?view=tasks">tasks</a></li>
			<li><a href="?view=sheet&layout=upload">Upload Sheet</a></li>
			<li><a href="?view=sheet&layout=create">Create new</a></li>
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
			<li><a href="?view=exploitation&filter=Services Applications stage 2">Services Applications stage 2</a></li>
			<li><a href="?view=exploitation&filter=Services Feasibility Study stage 2">Services Feasibility Study stage 2</a></li>
			<li><a href="?view=exploitation&filter=Compliance Relating to Construction and Expansion Capacity stage 2">Compliance Relating to Construction and Expansion Capacity stage 2</a></li>
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
			<li><a href="?view=report-setting">Add a Report</a></li>
			<li><a href="?view=reports1">Report Precontratual Phase</a></li>
			<li><a href="?view=reports2">Report Construction Phase</a></li>
			<li><a href="?view=reports3">Report BF Construction Phase</a></li>
			<li><a href="?view=reports4">Report Exploitation Phase</a></li>
			<li><a href="?view=dictionnaire">Dictionary</a></li>
            
		</ul>
        
        
        
    <li><a href="?view=reportall">Report in Conditions phase</a></li>
			<li><a href="?view=reportall1">Report in Constructions phase</a></li>
			<li><a href="?view=reportall2">Report in Exploitation Phase</a></li>
            
            </ul>
    </li>
	</li>
    
    
    
  
</ul>
<br /><br />