<?php
	$product = new productos_finales();	
	$producto = $product->getAllRecords();
	$machine = new maquinarias();	
	$machines = $machine->getAllRecords();
	
	$c = new procesos_transformacion();
	if(isset($_GET['id'])){
		$lab = $c->getRecord($_GET['id']);
	} else {
		$lab = new procesos_transformacion();
		$vars = $lab->getAllFields();
		foreach($vars as $var)
			$lab->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Procesos Transformacion</h2>
			<span onclick="window.location='?view=ltransform-process'" class="add">List</span>
		</div>
		<div class="content forms" style="height:225px;">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					
					This is a successful placed text message.
				</div>
			</div>
			<form id="userform" action="" method="post">
			<fieldset>
				<legend>Procesos Asociados</legend>
						<div class="finput">
							<label style=" margin-right:5px;">Nombre</label>
							<input id="nombre" type="text" name="nombre" class="medium" value="<?php echo utf8_encode($lab->nombre); ?>" style="margin-left : 20px;" />
						</div>
						
						<div class="finput">
							<label>Orden Hab.</label>
							<input id="orden" type="text" name="orden" class="small" value="<?php echo $lab->orden; ?>" />
						</div>
						
						<div class="finput" id="btip" style="">
							<label style="width:60px">Producto</label>
							<select id="uso_final" name="uso_final">
								<option value="">Select Producto</option>
								<?php foreach($producto as $t) { ?>
								<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $lab->uso_final) echo "SELECTED" ?>><?php echo $t->nombre; ?></option>
								<?php } ?>
							</select>
						</div>
							<!--
							-->
						<div id="lesinputs users">
						 <fieldset class="type" style=" width: 470px; margin-top:15px;"> 
								  <legend>Associated machine </legend>
								  
								 <div class="finput">
								<span style="float:left; margin-right: 15px;">Machine</span>
								<select id="maquinaria" name="maquinaria">
									<option value="">Select Maquinaria</option>
									<?php foreach($machines as $t) { ?>
									<option value="<?php echo $t->identificador; ?>"><?php echo utf8_encode($t->nombre); ?></option>
									
									<?php } ?>
								</select>
								<?php foreach($machines as $t) { ?><input type="hidden" id="<?php echo "m".$t->identificador; ?>" value="<?php echo utf8_encode($t->nombre); ?>" />
								<?php } ?>
							    </div>
							    <div class="finput" >
								<span style="float:left; margin-right: 15px;">Name</span>
								<input type="text" class="small" />
							   </div>
							  <div style="text-align : right">
								<button class="green medium" type="button" onclick="addMachine();" ><span>Accept</span></button>
							  </div>
								<?php if(isset($_GET['id'])) { ?><input type="hidden" name="proceso_transformacion" value="<?php echo $_GET['id']; ?>" id="proceso_transformacion" /><?php } ?>
						     </fieldset>
					  </div>
				<div class="centerbutton" style="width: 100%;  text-align: center; height : 50px; float : left">
				<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateTP(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addTP();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>	
				<?php
			if(isset($_GET['id'])) {
				$machs = $c->getAssociatedMachines($_GET['id']);
			?>
			<div style="float:left; width:99%; margin-top:10px"> 
			<table cellspacing="0" cellpadding="0" border="0" class="sorting"> 
				<thead> 
					<tr width="100%"> 
						<th><input type="checkbox" name="check" class="checkall" /></th>
						<th>Associated Maquinaria</th>
						
						<th width="30"></th>
					</tr> 
				</thead> 
				<tbody> 
				<?php
				$i = 0;
				foreach($machs as $user) { ?>
					<tr id="<?php echo $i; ?>"> 
						<td><input type="checkbox" name="check" /></td>
						<td><a href="#"><?php echo $user->nombre; ?></a></td>
						<td style="padding:5px 4px;">
							<a style="margin-left:2px;float:left" href="#" onclick="deleteMaquinarias(<?php echo $user->maquinaria; ?>, <?php echo $i; ?>)"><img src="gfx/icon-delete.png" alt="delete" title="Delete maquinaria" /></a>
						</td>
					</tr>
				<?php $i++; } ?> 
				</tbody> 
			</table>
			</div>
			<?php 
			}
			?>			
				</fieldset>
				
				
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/transform-process.js"></script>