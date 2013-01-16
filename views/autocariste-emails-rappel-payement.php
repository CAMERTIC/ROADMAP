<?php
	$a = new parametres();
?>

<script src="./lib/jquery-1.7.min.js"></script>

<link rel="stylesheet" href="./redactor/redactor.css" />
<script src="./redactor/redactor.js"></script>
<div class="full">
	<div class="box">
		<div class="title">
			<h2>Patron de l'email de rappel de payement</h2>
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
					<label>Formule</label>
					<textarea id="redactor_content" name="content" style="height: 560px;">
					<?php
						echo $a->getEmailRappel();
					?>
					</textarea>
					<br />
					<span>{nom} = nom de la societe</span>
					<br />
					<span>{resp} = nom du responsable</span>
					<br />
					<span>{date} = date d'expiration</span>
				</div>
				<div class="line" style="padding-left: 15px;text-align: right;">
					<button type="button" onclick="update();" class="grey"><span>Enregistrer</span></button>
					<input type="hidden" name="" id="" value="" />
				</div>
				
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#redactor_content').redactor();
	$('#redactor_content').redactor({
		autosave: '_ajax/saveEmailRappel.php',
		interval: 10
	});
  }
);
</script>