<?php
	$a = new codes_reduction();
	if(isset($_GET['id'])){
		$en = $a->getRecord($_GET['id']);
		$dateini = explode(" ", $en->date_limite);
		$dateini = explode("-", $dateini[0]);
		$array = array();
		$lastelt = count($dateini) - 1;
		while($lastelt >= 0) {
			$array[] = $dateini[$lastelt];
			$lastelt--;
		}
		$en->date_limite = implode(".", $array);
	} else {
		$en = new codes_reduction();
		$vars = $en->getAllFields();
		foreach($vars as $var)
			$en->$var = '';
	}
	//var_dump($en); die;
?>
<div class="full">
	<div class="box">
		<div class="title">
			<h2><?php if(!isset($_GET['id'])) echo "Creer un nouveau code de reduction"; else echo "Modifier le code de reduction $en->code"; ?></h2>
			<span class="hide"></span>
		</div>
		<div class="content forms">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<form action="" method="post" id="codes-form">
				<div class="line">
					<label>Code</label>
					<input type="text" class="small" value="<?php echo $en->code; ?>" name="code" id="code" />
				</div>
				<div class="line">
					<label>Montant</label>
					<input type="text" class="small" value="<?php echo $en->montant; ?>" name="montant" id="montant" />
				</div>
				<div class="line">
					<label>Date limite</label>
					<input type="text" value="<?php echo $en->date_limite; ?>" name="date_limite" id="date_limite" class="datepicker medium" />
				</div>
				<div class="line" style="padding-left: 15px;text-align: right;">
					<button type="button" <?php if(isset($_GET['id'])) { ?> onclick="update(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="add();"<?php } ?> class="grey"><span>Enregistrer</span></button>
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="id" id="id" value="<?php echo $_GET['id'] ?>" /><?php } ?>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/codes.js"></script>