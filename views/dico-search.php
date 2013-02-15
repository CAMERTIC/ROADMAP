<?php
	$dico = new dico();
	if(isset($_POST['word'])) {
		$defs = $dico->getAllDefinitions($_POST['word']);
	} else {
		$defs = $dico->getAllRecords();
	}
	global $dic;
	$dic = array();
	foreach($defs as $def) {
		$dic[trim($def->expression)] = trim($def->definition);
	}
	
	//var_dump($defs); die;
	
?>

<div class="centercontent tables">
			<div class="pageheader notab">
			<h1 class="pagetitle">Dictionary</h1>
			<span class="pagedesc">Get definitions of expressions</span>
			
		</div><!--pageheader-->
<div id="contentwrapper" class="contentwrapper">
		 <div class="contenttitle2">
			<h3> <?php if(isset($_POST['word'])) {
			$word = $_POST['word'];
			echo "Results for '<b><u>$word</u></b>' : ";
		 
			} else {
			 echo "Browse the dictinary";
			}
		 ?></h3>
		</div><!--contenttitle-->
		
		
		 <div>
			<form action="dashboard.php?view=dico-search" name="rech" method="POST" >
				<input type="text" name="word" placeholder="Type your search here" />
				<a href="dashboard.php?view=dictionnaire" class="btn btn2 btn_blue btn_search radius50" onclick="document.rech.submit(); return false;"><span>Search</span></a>
			</form>
		 </div>
		 <br /><br />
		List of results <br />
		<?php if(count($defs)==0) { ?>
		<i>No result for the search.</i>
		<?php } else { ?>
		<ul>
			<?php foreach($defs as $d) { ?>
			<li> <a href="?view=dictionnaire&word=<?php  echo $d->expression;  ?>"><?php echo $d->expression; ?></a> </li>
			<?php } ?>
		</ul>
		<?php } ?>
           <br /><br />
	</div>
</div>