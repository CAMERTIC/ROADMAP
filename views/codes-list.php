<?php
	@session_start();
	$autocariste = new codes_reduction();
	if(isset($_GET['expired']))
		$autos = $autocariste->getExpired();
	elseif(isset($_GET['valid']))
		$autos = $autocariste->getValid();
	else
		$autos = $autocariste->getAllRecords();
?>
<div class="full">
	<div class="box">
		<div class="title">
			<h2>Liste des codes</h2>
			<span class="hide"></span>
		</div>
		<div class="content">
			<table cellspacing="0" cellpadding="0" border="0" class="all"> 
				<thead> 
					<tr> 
						<th><input type="checkbox" name="check" class="checkall" /></th>
						<th>Code</th>
						<th>Montant</th>
						<th>Date limite</th>
						<th>Etat</th>
						<!--<th style="width:100px">Deja utilise</th>-->
						<th></th>
					</tr> 
				</thead> 
				<tbody> 
					<?php foreach($autos as $a) { ?>
					<tr id="<?php echo $a->id; ?>"> 
						<td><input type="checkbox" name="check[]" value="<?php echo $a->id ?>" /></td>
						<td><a href="#"><?php echo $a->code; ?></a></td>
						<td><?php echo $a->montant ?></td>
						<td><?php echo $a->date_limite ?></td>
						<td><?php  if($a->date_limite > @date('Y-m-d H:i:s')) echo "Valide"; else echo "Expire"; ?></td>
						<!--<td><?php  if($a->deja_use == 0) echo "Non"; else echo "Oui"; ?></td>-->
						<td>
							<a href="?view=codes-form&id=<?php echo $a->id; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
							<a href="#" onclick="del('<?php echo $a->id; ?>', '<?php echo $a->code; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
						</td>
					</tr>
					<?php } ?>
				</tbody> 
			</table>
			<button type="submit" class="red"><span>Delete</span></button>
		</div>
	</div>
</div>
	
<script type="text/javascript" src="js/codes.js"></script>
<script type="text/javascript">

</script>