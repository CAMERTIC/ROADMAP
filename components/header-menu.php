<ul class="headermenu">
	<li <?php if(!isset($_GET['view'])) { echo 'class="current"'; } ?>><a href="dashboard.php"><span class="icon icon-flatscreen"></span>Dashboard</a></li>
	<li <?php if(isset($_GET['view'])) if($_GET['view']=='my-tasks') { echo 'class="current"'; } ?> ><a href="?view=my-tasks&filter=all"><span class="icon icon-pencil"></span>Tasks</a></li>
</ul>