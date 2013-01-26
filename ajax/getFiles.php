<div class="notibar msgsuccess hidden">
	<a class="close"></a>
	<p>This is a success message.</p>
</div><!-- notification msgsuccess -->
<form id="Form1" class="stdform stdform2" method="post" action="">
<?php 
$targetFolder = 'CAMIRON-ROADMAP/uploads/';
$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
//var_dump(realpath('../uploads'));
$entries = scandir("../uploads");
$filelist = array();
foreach($entries as $entry) {
	if($entry != '.' & $entry != '..')
	$filelist[] = $entry;
}
$i = 1;
foreach($filelist as $f) { ?>
<p>
	<span class="field" style="margin-left:20px;padding:5px 5px 5px 10px;"><?php echo $i . '. '; ?>
	<a href="./ajax/read-excel.php?file=<?php echo $f; ?>" class=""><?php echo $f; ?></a>
	</span>
</p>

<?php $i++; } ?>	
</form>	