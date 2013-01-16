<?php
	@session_start();
	$autocariste = new devis();
	$autos = $autocariste->getAllRecords('0, 100');
?>
<div class="full">
	<div class="box">
		<div class="title">
			<h2>Liste des demandes de devis</h2>
			<span class="hide"></span>
		</div>
		<div class="content">
			<table cellspacing="0" cellpadding="0" border="0" class="all"> 
				<thead> 
					<tr> 
						<th><input type="checkbox" name="check" class="checkall" /></th>
						<th>Nom</th>
						<th>Email</th>
						<th>Telephone</th>
						<th>Depart</th>
						<th width="100">Nb passagers</th>
						<th></th>
					</tr> 
				</thead> 
				<tbody> 
					<?php foreach($autos as $a) { ?>
					<tr id="<?php echo $a->id; ?>"> 
						<td><input type="checkbox" name="check[]" value="<?php echo $a->id ?>" /></td>
						<td><a href="#"><?php echo $a->nom; ?></a></td>
						<td><?php echo $a->email ?></td>
						<td><?php echo $a->telephone ?></td>
						<td><?php echo $a->ville_depart ?></td>
						<td><?php echo $a->nombre_passager ?></td>
						<td>
							
						</td>
					</tr>
					<?php } ?>
				</tbody> 
			</table>
			<button type="submit" class="red"><span>Delete</span></button>
		</div>
	</div>
</div>
	
<script type="text/javascript">

</script>