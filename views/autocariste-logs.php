<?php
	$a = new mdr();
	if(isset($_GET['id'])){
		$en = $a->getRecord($_GET['id']);
		$b = new utilisateur;
		if($b->getCredentials($en->mdr_id)) {
			$u = $b->getCredentials($en->mdr_id);
			$en->utilisateur = $u->utilisateur;
			$en->id = $u->id;
			$en->etat = $u->etat;
		} else {
			$en->utilisateur = $en->mdr_email ;
			$en->etat = 1;
		}
		
	}
?>
<div class="full">
	<div class="box">
		<div class="title">
			<h2><?php echo "Gestion des acces de l'autocariste $en->mdr_nom"; ?></h2>
			<span class="hide"></span>
		</div>
		<div class="content forms">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<form action="" method="post" id="autocar-form">
				<div class="line">
					<label>Login</label>
					<input type="text" class="small" autocomplete="off" value="<?php echo $en->utilisateur; ?>" name="utilisateur" id="utilisateur" />
				</div>
				<div class="line">
					<label>Mot de passe</label>
					<input type="password" class="small" name="password" id="password" value="<?php  ?>" />
				</div>
				<div class="line">
					<label>Status de connexion</label>
					<input type="radio" name="etat" value="0" id="etat-1" <?php if($en->etat == 0) { ?>checked="checked"<?php } ?> /> 
					<label for="etat-1">Inactif</label>
					
					<input type="radio" name="etat" value="1" id="etat-2" <?php if($en->etat == 1) { ?>checked="checked"<?php } ?> /> 
					<label for="etat-2">Actif</label>
				</div>
				<div class="line">
					<label>Notifier par email</label>
					<input type="radio" name="notif" id="notif-1" value="0" checked="checked" /> 
					<label for="notif-1">Non</label>
					
					<input type="radio" name="notif" id="notif-2" value="1" /> 
					<label for="notif-2">Oui</label>
					<span><?php if($en->mdr_email == '') { ?>( L'autocariste n'a aucun email) <?php } else { ?> L'autocariste recevra un mail a l'adresse : <?php echo $en->mdr_email; } ?></span>
				</div>
				<div class="line" style="padding-left: 15px;text-align: right;">
					<button type="button" onclick="access(<?php  ?>);" class="grey"><span>Enregistrer</span></button>
					<?php if(isset($en->id)) {?><input type="hidden" name="id" id="id" value="<?php echo $en->id ?>" /><?php } ?>
					<?php if(isset($_GET['id'])) {?><input type="hidden" name="fiche_id" id="fiche_id" value="<?php echo $_GET['id'] ?>" /><?php } ?>
					<?php if(isset($_GET['id'])) {?><input type="hidden" name="email" id="email" value="<?php echo $en->mdr_email ?>" /><?php } ?>
					<input type="hidden" name="categorie" id="categorie" value="1" />
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/autocaristes.js"></script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){
	// var membership = $('input[name=membership]:checked', '#autocar-form').val();
	// if(membership=='free') {
			// jQuery("#pl").hide();
		// } else {
			
		// }
	//jQuery("#pl").hide();
	
	// jQuery('input[name=membership]', '#autocar-form').change(function ()
	// {
		// membership = $('input[name=membership]:checked', '#autocar-form').val();
		// if(membership=='free') {
			// jQuery("#pl").hide('slow');
		// } else {
			// jQuery("#pl").show('slow');
		// }
	// });
})
//]]>
</script>