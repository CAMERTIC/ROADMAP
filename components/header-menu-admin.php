<ul class="headermenu">
	<li <?php if(!isset($_GET['view'])) { echo 'class="current"'; } ?>><a href="dashboard-admin.php"><span class="icon icon-flatscreen"></span>Dashboard</a></li>
	<li <?php if(isset($_GET['view'])) if($_GET['view']=='tasks' or $_GET['view']=='sheet') { echo 'class="current"'; } ?> ><a href="?view=tasks"><span class="icon icon-pencil"></span>Tasks</a></li>
	<li><a href="#"><span class="icon icon-chart"></span>Reports</a></li>
</ul>