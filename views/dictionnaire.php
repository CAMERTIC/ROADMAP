<?php
	$dico = new dico();
	$defs = $dico->getAllRecords();
	global $dic;
	$dic = array();
	foreach($defs as $def) {
		$dic[trim($def->expression)] = trim($def->definition);
	}
?>

<div class="centercontent tables">
			<div class="pageheader notab">
			<h1 class="pagetitle">Dictionary</h1>
			<span class="pagedesc">Get definitions of expressions</span>
			
		</div><!--pageheader-->
<div id="contentwrapper" class="contentwrapper">
		 <div class="contenttitle2">
			<h3> <?php if(isset($_GET['word'])) {
			$word = $_GET['word'];
			echo "Definition of '<b><u>$word</u></b>' : ";
		 
			} else {
			 echo "Browse the dictinary";
			}
		 ?></h3>
		</div><!--contenttitle-->
		<div>	
         <?php if(isset($_GET['word'])) {
			
			echo nl2br(utf8_encode($dic[$word]));
		 ?><br />
		 <input type="button" value="Back" onclick="window.history.back()" id="seek">
		 </div>
		<?php
		} else {
		 ?>
		 <div>
			<form action="dashboard.php?view=dictionnaire" name="rech" method="GET" >
				<input type="text" name="word" placeholder="Type your search here" />
				<a href="dashboard.php?view=dictionnaire" class="btn btn2 btn_blue btn_search radius50" onclick="document.rech.submit(); return false;"><span>Search</span></a>
			</form>
		 </div>
		 <br /><br />
		<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                        
                            <th class="head0">Expression</th>
                            <th class="head1">Definition</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                      <?php foreach($dic as $u => $d) { ?>
                    
                        <tr class="gradeA">
                          
                            <td><?php echo $u ?></td>
                            <td><?php echo utf8_encode($d) ?></td>
                        </tr>
					<?php } ?>
                        
                    </tbody>
                </table>
		<?php } ?>
           <br /><br />
	</div>
</div>