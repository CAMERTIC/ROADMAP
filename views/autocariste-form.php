<?php
	$a = new mdr();
	if(isset($_GET['id'])){
		$en = $a->getRecord($_GET['id']);
	} else {
		$en = new mdr();
		$vars = $en->getAllFields();
		foreach($vars as $var)
			$en->$var = '';
	}
?>
<div class="full">
	<div class="box">
		<div class="title">
			<h2><?php if(!isset($_GET['id'])) echo "Creer un nouvel autocariste"; else echo "Modifier l'autocariste ". stripslashes($en->mdr_nom); ?></h2>
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
					<label>Nom entreprise</label>
					<input type="text" class="small" value="<?php echo stripslashes($en->mdr_nom); ?>" name="mdr_nom" id="mdr_nom" />
				</div>
				<div class="line">
					<label>Nom responsable</label>
					<input type="text" class="medium" name="mdr_resp" id="mdr_resp" value="<?php echo utf8_encode($en->mdr_resp) ?>" />
				</div>
				<div class="line">
					<label>Email</label>
					<input type="text" class="medium" name="mdr_email" id="mdr_email" value="<?php echo $en->mdr_email ?>" />
				</div>
				<div class="line">
					<label>Telephone</label>
					<input type="text" class="medium" name="mdr_tel" id="mdr_tel" value="<?php echo $en->mdr_tel ?>" />
				</div>
				<div class="line">
					<label>Fax</label>
					<input type="text" class="medium" name="mdr_fax" id="mdr_fax" value="<?php echo $en->mdr_fax ?>" />
				</div>
				<div class="line">
					<label>Adresse</label>
					<input type="text" class="medium" name="mdr_adresse" id="mdr_adresse" value="<?php echo $en->mdr_adresse ?>" />
				</div>
				<div class="line">
					<label>Code Postal</label>
					<input type="text" class="medium" name="mdr_cp" id="mdr_cp" value="<?php echo $en->mdr_cp ?>" />
				</div>
				<div class="line">
					<label>Ville</label>
					<input type="text" class="medium" name="mdr_ville" id="mdr_ville" value="<?php echo $en->mdr_ville ?>" />
				</div>
				<div class="line">
					<label>N Siret</label>
					<input type="text" class="medium" name="mdr_siret" id="mdr_siret" value="<?php echo $en->mdr_siret ?>" />
				</div>
				
				<div class="line">
					<label>Afficher carte</label>
					<input type="radio" name="google_map" id="google_map-5" <?php if($en->google_map == 1) { ?>checked="checked"<?php } ?> value="1" /> 
					<label for="google_map-5">Oui</label>
					
					<input type="radio" name="google_map" id="google_map-6" <?php if($en->google_map == 0) { ?>checked="checked"<?php } ?> value="0" /> 
					<label for="google_map-6">Non</label>
				</div>
				<div class="line">
					<label>Status</label>
					<input type="radio" name="membership" value="free" id="membership-1" <?php if($en->membership == 'free') { ?>checked="checked"<?php } ?> /> 
					<label for="membership-1">Free</label>
					
					<input type="radio" name="membership" value="premium" id="membership-2" <?php if($en->membership == 'premium') { ?>checked="checked"<?php } ?> /> 
					<label for="membership-2">Premium</label>
				</div>
				<div class="line" id="pl">
					<label>Plan renouvellement</label>
					<input type="radio" name="chosen_pack" value="mensuel" id="radio-3" <?php if($en->chosen_pack == 'mensuel') { ?>checked="checked"<?php } ?> /> 
					<label for="radio-3">Mensuel</label>
					
					<input type="radio" name="chosen_pack" value="annuel" id="radio-4" <?php if($en->chosen_pack == 'annuel') { ?>checked="checked"<?php } ?> /> 
					<label for="radio-4">Annuel</label>
				</div>
				<div class="line" style="padding-left: 15px;text-align: right;">
					<button type="button" <?php if(isset($_GET['id'])) { ?> onclick="update(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="add();"<?php } ?> class="grey"><span>Enregistrer</span></button>
					<?php if(isset($_GET['id'])) {?><input type="hidden" name="mdr_id" id="mdr_id" value="<?php echo $_GET['id'] ?>" /><?php } ?>
					<input type="hidden" name="mdr_categorie" id="mdr_categorie" value="autocar" />
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/autocaristes.js"></script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){
	var membership = $('input[name=membership]:checked', '#autocar-form').val();
	if(membership=='free') {
			jQuery("#pl").hide();
		} else {
			
		}
	//jQuery("#pl").hide();
	
	jQuery('input[name=membership]', '#autocar-form').change(function ()
	{
		membership = $('input[name=membership]:checked', '#autocar-form').val();
		if(membership=='free') {
			jQuery("#pl").hide('slow');
		} else {
			jQuery("#pl").show('slow');
		}
	});
})
//]]>
</script>