<?php 
	@session_start();
	global $lang;
	$pm = null;
	$pm = new provincias();
	$provs = $pm->getAllRecords();
	if(isset($_GET['id'])){
		if(isset($_GET['p'])) {
			$prov = new provincias();
			$pm = $prov->getRecord($_GET['id']);
			$pm->municipio = '';
		$pm->temperatura = '';
		$pm->fuente = '';
		$pm->provincia = '';
		}
		if(isset($_GET['m'])) {
			$prov = new municipios();
			$pm = $prov->getRecord($_GET['id']);
		}
		
	} else {
		$pm = new stdClass;
		$pm->nombre = '';
		$pm->municipio = '';
		$pm->temperatura = '';
		$pm->fuente = '';
		$pm->provincia = '';
		
	}
?>
<div class="formulaire btc">
	<div class="box">
		<div class="title">
			<h2>Provincias y Municipios</h2>
			<span onclick="window.location='?view=lmd-p'" title="List provincias" class="addy">Provinces List</span>
			<span onclick="window.location='?view=lmd-m'" title="List municipios" class="addy">Municipalities List</span>
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
					<legend id="idd">Municipios y temperatura Media</legend>
					<div class="line">
						<div class="finput" style="margin-right:15px">
							<label>Nombre</label>
							<input id="<?php if(isset($_GET['p'])) echo 'nombre'; else echo 'municipio'; ?>" type="text" class="small" value="<?php if(isset($_GET['p'])) echo $pm->nombre; else echo $pm->municipio; ?>" />
						</div>
						<div class="finput" style="margin-right:15px" id="t">
							<label>T Media Anual (C)</label>
							<input id="temperatura" type="text" name="temperatura" class="small" value="<?php echo $pm->temperatura; ?>" />
						</div>
						<div class="finput" style="margin-right:5px" id ="f">
							<label style="width:80px">Fuente</label>
							<input id="fuente" type="text" class="small" name="fuente" value="<?php echo $pm->fuente; ?>" />
						</div>
					</div>
					<div id="nextline" style="height: 30px; margin-top: 30px;  padding: 5px;">
						<div class="finput" style="margin-right : 126px">
							<div style="width : 200px">
								<input type="checkbox" onclick="checktype();" name="type[]" value="provincia" id="cat" />
								<label for="cat">Provincia</label>
							</div>
						</div>
						<div class="finput" id="btip">
							<label>Provincia</label>
							<select id="bt" name="bt">
								<option value="">Select provincia</option>
								<?php foreach($provs as $t) { ?>
								<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $pm->provincia) echo "SELECTED" ?>><?php echo $t->nombre; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</fieldset>
				<div class="centerbutton" style="width: 100%; text-align: center;">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" value="<?php echo $_GET['id']; ?>" id="id" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updatePM(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addPM();"<?php } ?> ><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
				
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
<script type="text/javascript" src="js/md-pm.js"></script>
<script type="text/javascript">
<?php if(isset($_GET['p'])) {  ?>
		$('#cat').attr('checked', true);
		jQuery('#btip').hide();
		jQuery('#t').hide();
		jQuery('#f').hide();
<?php } ?>
</script>