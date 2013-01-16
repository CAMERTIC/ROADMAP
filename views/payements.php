<?php
	@session_start();
	$autocariste = new payements();
	$autos = $autocariste->getAllRecords();
?>
<div class="full">
	<div class="box">
		<div class="title">
			<h2>Liste des payements recus</h2>
			<span class="hide"></span>
		</div>
		<div class="content">
			<table cellspacing="0" cellpadding="0" border="0" class="all"> 
				<thead> 
					<tr> 
						<th><input type="checkbox" name="check" class="checkall" /></th>
						<th>Autocarite</th>
						<th>Date</th>
						<th>Montant</th>
						<th>Id Transaction</th>
						<th></th>
					</tr> 
				</thead> 
				<tbody> 
					<?php foreach($autos as $a) { ?>
					<tr id="<?php echo $a->id; ?>"> 
						<td><input type="checkbox" name="check[]" value="<?php echo $a->id ?>" /></td>
						<td><a href="#"><?php echo $autocariste->getName($a->id_autocariste, 'mdr', 'mdr_nom'); ?></a></td>
						<td><?php echo $a->date_payement ?></td>
						<td><?php echo $a->montant; ?></td>
						<td><?php echo $a->id_transaction; ?></td>
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