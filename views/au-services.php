<?php
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	$c = new servicios();
	if(isset($_GET['id'])){
		$mic = $c->getRecord($_GET['id']);
	} else {
		$mic = new servicios();
		$vars = $mic->getAllFields();
		//var_dump($vars); die();
		foreach($vars as $var)
			$mic->$var = '';
	}
?>
<div class="formulaire btc">
	<div class="box">
		<div class="title">
			<h2>Auxiliary Services</h2>
			<span onclick="window.location='?view=lau-servicios'" class="add">List</span>
		</div>
		<div class="content forms">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Auxiliary Services</legend>
					<div class="line">
						<div class="finput">
							<label>Nombre</label>
							<input id="nombre" name="nombre" type="text" class="medium" value="<?php echo $mic->nombre; ?>" />
						</div>
						<div class="finput" id="btip">
							<label style="width:60px">Categoria</label>
							<select id="categoria" name="categoria">
								<option value="">Select Categoria</option>
								<?php foreach($cats as $t) { ?>
								<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->categoria) echo "SELECTED" ?>><?php echo $t->nombre; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					
					<div class="centerbutton" style="width: 100%; text-align: center; clear: both;">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateServicios(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addServicios();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				    </div>
					
				</fieldset>
				
				
			</form> 
		</div>
	</div>
</div>
<div id="list" class="box" style="position:absolute; display:none;">
	<div class="title">
		<h2>Users</h2>
		<span class="hide"></span>
	</div>
</div>
<script type="text/javascript" src="js/au-servicios.js"></script>