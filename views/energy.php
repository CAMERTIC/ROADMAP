<?php
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	
	$c = new energias();
	if(isset($_GET['id'])){
		$en = $c->getRecord($_GET['id']);
	} else {
		$en = new energias();
		$vars = $en->getAllFields();
		foreach($vars as $var)
			$en->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Energy</h2>
			<span onclick="window.location='?view=lenergy'" class="add">List</span>
		</div>
		<div class="content forms" style="height:170px">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<!--<div id="subhead">
				<a href="#"><img src="gfx/table-first.gif" /></a>
				<input id="user" type="text" class="medium" value="" />
				<a href="#"><img src="gfx/table-last.gif" /></a>
			</div>-->
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Energy Types</legend>
					<div id="lesinputs">
				
						<div class="line">
                            <div class="finput">
								<label style=" margin-right:5px;">Nombre</label>
								<input id="nombre" type="text" name="nombre" class="small" value="<?php echo utf8_encode($en->nombre); ?>" style="margin-left : 20px;" />
							</div>
							<div class="sfinput">
								<label style="margin-right : 0px;">F.E CO<sub>2</sub></label>
								<input id="emision_co2" type="text" name="emision_co2" class="small" value="<?php echo $en->emision_co2; ?>" style="margin-right : 20px;"/>
							</div>
							<div class="sfinput">
								<label style="margin-right : 0px;">F.E CH<sub>4</sub></label>
								<input id="emision_ch4" type="text" name="emision_ch4" class="small" value="<?php echo $en->emision_ch4; ?>" style="margin-right : 20px;"/>
							</div>
							<div class="sfinput">
								<label style="margin-right : 0px;">F.E N<sub>2</sub>O</label>
								<input id="emision_n2o" type="text" name="emision_n2o" class="small" value="<?php echo $en->emision_n2o; ?>" style="margin-right : 20px;"/>
							</div>
							<div class="sfinput">
								<label style="margin-right : 0px;">F.E CO<sub>2</sub>eq</label>
								<input id="emision_co2_eq" type="text" name="emision_co2_eq" class="small" value="<?php echo $en->emision_co2_eq; ?>" style="margin-right : 20px;"/>
							</div>
						</div>
		
						<div class="nextline">
							<div class="finput">
								<label style=" margin-right:5px;">Unidad</label>
								<input id="unidad" type="text" name="unidad" class="small" value="<?php echo utf8_encode($en->unidad); ?>" style="margin-left : 20px;" />
							</div>
							<div class="sfinput">
								<label style=" margin-right:0px;">Year</label>
								<input id="year" type="text" name="year" class="small" value="<?php echo $en->year; ?>" style="margin-right : 20px;" />
							</div>
							<div class="sfinput">
								<label style=" margin-right:0px;">Mix</label>
								<input id="mix" type="text" name="mix" class="small" value="<?php echo $en->mix; ?>" style="margin-right : 20px;" />
							</div>
							<div class="sfinput">
								<label style=" margin-right:0px;">Alcance</label>
								<input id="alcance" type="text" name="alcance" class="small" value="<?php echo $en->alcance; ?>" style="margin-right : 20px;" />
							</div>
							<div class="finput">
								<label>Fuente</label>
								<input id="fuente" type="text" name="fuente" class="small" value="<?php echo utf8_encode($en->fuente); ?>" />
							</div>
						</div>
						
						<div class="line">
							<div class="finput" id="btip" style="float : left; margin-top : 12px">
								<label style="width:60px">Categoria</label>
								<select id="categoria" name="categoria">
									<option value="">Select Categoria</option>
									<?php foreach($cats as $t) { ?>
									<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $en->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
							
							
						</div>
						
					</div>
					<div id="newuser">
						
					</div>
					
				</fieldset>
				<div class="centerbutton" style="width: 100%; text-align: center;">
				<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateEn(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addEn();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
				
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/energy.js"></script>