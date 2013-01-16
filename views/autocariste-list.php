<?php
	@session_start();
	$autocariste = new mdr();
	$auto = new utilisateur();
	if(isset($_GET['membership']))
		$autos = $autocariste->getAllRecords(array('membership' => $_GET['membership']), 'limit 0, 4000');
	else
		$autos = $autocariste->getAllRecords();
?>
<div class="full">
	<div class="box">
		<div class="title">
			<h2>Liste des autocaristes</h2>
			<span class="hide"></span>
		</div>
		<div class="content">
			<table cellspacing="0" cellpadding="0" border="0" class="all"> 
				<thead> 
					<tr> 
						<th><input type="checkbox" name="check" class="checkall" /></th>
						<th>Nom</th>
						<th>Telephone</th>
						<th>Ville</th>
						<th>Plan</th>
						<th>Devis</th>
						<th width="60">Affichage</th>
						<?php if(isset($_GET['membership'])) { if($_GET['membership'] == 'premium') { ?><th width="120">D. payement</th><?php } } ?>
						<?php if(isset($_GET['membership'])) { if($_GET['membership'] == 'premium') { ?><th width="80">Etat</th><?php } } ?>
						<th width="60"></th>
					</tr> 
				</thead> 
				<tbody> 
					<?php foreach($autos as $a) { ?>
					<tr id="<?php echo $a->mdr_id; ?>"> 
						<td><input type="checkbox" name="check[]" value="<?php echo $a->mdr_id ?>" /></td>
						<td><a href="#"><?php echo stripslashes($a->mdr_nom); ?></a></td>
						<td><?php echo $a->mdr_tel ?></td>
						<td><?php echo stripslashes($a->mdr_ville); ?></td>
						<td><?php if($a->choix_plan == 1) { echo "Mensuel"; } elseif($a->choix_plan == 2) { echo "Annuel"; } ?></td>
						<td><?php echo $autocariste->getNbDevis($a->mdr_id); ?></td>
						<td><?php echo $a->nb_visites ?></td>
						<?php if(isset($_GET['membership'])) { if($_GET['membership'] == 'premium') { ?><td><?php echo utf8_encode($a->date_payement) ?></td><?php } } ?>
						<?php if(isset($_GET['membership'])) { if($_GET['membership'] == 'premium') { ?><td><?php echo ($a->valid == 1) ? "Actif" : "Non actif"; ?></td><?php } } ?>
						<td>
							<a href="?view=autocariste-form&id=<?php echo $a->mdr_id; ?>"><img src="gfx/icon-edit.png" alt="edit" title="Modifier fiche" /></a>
							<a href="#" onclick="del('<?php echo $a->mdr_id; ?>', '<?php echo $a->mdr_nom; ?>')"><img title="Supprimer" src="gfx/icon-delete.png" alt="delete" /></a>
							<a href="?view=autocariste-logs&id=<?php echo $a->mdr_id; if($auto->getCredentials($a->mdr_id)){} ?>" title="Modifier les acces"><img title="Modifier les acces" src="gfx/page_setup.png" alt="edit" /></a>
						</td>
					</tr>
					<?php } ?>
				</tbody> 
			</table>
			<button type="submit" class="red"><span>Delete</span></button>
		</div>
	</div>
</div>
	
<script type="text/javascript" src="js/autocaristes.js"></script>
<script type="text/javascript">

</script>