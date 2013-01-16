<?php
	@session_start();
	$autocariste = new demandes_ref();
	$autos = $autocariste->getAllRecords();
?>
<div class="full">
	<div class="box">
		<div class="title">
			<h2>Liste des demandes de referencements</h2>
			<span class="hide"></span>
		</div>
		<div class="content">
			<table cellspacing="0" cellpadding="0" border="0" class="all"> 
				<thead> 
					<tr> 
						<th><input type="checkbox" name="check" class="checkall" /></th>
						<th>Nom societe</th>
						<th>Responsable</th>
						<th>Email</th>
						<th>Tel</th>
						<th></th>
					</tr> 
				</thead> 
				<tbody> 
					<?php foreach($autos as $a) { ?>
					<tr id="<?php echo $a->id; ?>"> 
						<td><input type="checkbox" name="check[]" value="<?php echo $a->id ?>" /></td>
						<td><a href="#"><?php echo $a->nom_societe; ?></a></td>
						<td><?php echo $a->nom_responsable ?></td>
						<td><?php echo $a->email ?></td>
						<td><?php echo $a->tel ?></td>
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