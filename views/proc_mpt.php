<?php
	@session_start();
	
	$maquinaria = new maquinarias();	
	$maqs = $maquinaria->getAllVehicle();
	$cats = $maquinaria->getCategoriesOfEntity();
	
	$mat = new materias();	
	$mats = $mat->getAllRecords();
	
	
	
	$producto = new empresa_unidades_funcionales();	
	$products = $producto->getAllRecordsFromEmpresa($_SESSION['u']['enterprise']);
	
	$process = new proceso_maquinarias();
	$procesos = $process->getProcesosMaquinaria();
	//var_dump($products); die;
	$prod = new empresa_materias_primas_transporte();
	if(isset($_GET['id'])){
		$pr = $prod->getRecord($_GET['id']);
	} else {
		$pr = new empresa_materias_primas_transporte();
		$vars = $pr->getAllFields();
		foreach($vars as $var)
			$pr->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Transport of Materia Prima</h2>
			<span onclick="window.location='?view=lproc_mpt&materia_prima=<?php echo $_GET['materia']; ?>&producto_final=<?php echo $_GET['producto_final'] ?>'" class="add">List</span>
		</div>
		<div class="content forms tabs" style="height:300px;">
			<div class="tabmenu">
				<ul> 
					<!--<li><a href="#tabs-1">Production y Procesos</a></li> -->
					<!--<li><a href="#tabs-2">Materias Primas</a></li>-->
					<li><a href="#tabs-3">Transporte</a></li>
				</ul>
			</div>
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			
		<div id="tabs-2">
			<form id="userform2" action="" method="post">
				<fieldset>
					<legend>Transportes y Materias Primas</legend>
						<div id="lesinputs users">
							
							<fieldset>
								<legend>Transport</legend>
								<div class="line">
									<div class="finput" id="btip">
										<label style="width:60px">Categorias</label>
										<select id="categoria" name="categoria">
											<option value="">Select Categoria</option>
											<?php foreach($cats as $t) { ?>
												<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $pr->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
											<?php } ?>
										</select>
									</div>
									
									<div class="finput" id="btip" style="margin-right:0px">
										<label >Vehiculo</label>
										<select id="maquinaria" name="maquinaria" >
										<option value="">Select vehiculo</option>
										<?php foreach($maqs as $t) { ?>
											<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $pr->maquinaria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
											<?php } ?>
									
										</select>
									</div>
									
									<div class="finput" id="btip">
										<label >Reccorido</label>
										<select id="recorrido" name="recorrido" class="">
										<option value="">Reccorido</option>
										<?php foreach($recorridos as $t) { ?>
										<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->maquinaria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
										<?php } ?>
										</select>
									
										</select>
									</div>
								</div>
								<div class="nextline">
									
								<input type="radio" name="es_propio" id="radio-1" value="1" <?php if($pr->es_propio == '1') echo "CHECKED"; ?> /> 
									<label for="radio-1">Propio</label>
									
									<input type="radio" name="es_propio" id="radio-2" value="0" <?php if($pr->es_propio == '0') echo "CHECKED"; ?> /> 
									<label for="radio-2">Externo</label>
									
									
									<div class="sfinput">
										<label >F.E CO<sub>2</sub></label>
										<input id="emision_co2" type="text" name="emision_co2" class="small" value="<?php echo $pr->emision_co2 ?>" />
									</div>
									<div class="finput" style="float : left; margin-left: 15px;">
										<label style="width:50px; margin-left : 10px;">F.E CH<sub>4</sub></label>
										<input id="emision_ch4" name="emision_ch4" type="text" class="small" value="<?php echo $pr->emision_ch4 ?>" style="width:30px" />
									</div>
									
									<div class="finput" style="float : left; margin-left: 15px;">
										<label style="width:50px; margin-left : 10px;">F.E N<sub>2</sub>O</label>
										<input id="emision_n2o" name="emision_n2o" type="text" class="small" value="<?php echo $pr->emision_n2o ?>" style="width:30px" />
									</div>
									
									<div class="finput" style="float : left; margin-left: 15px;">
										<label style="width:60px; margin-left : 10px;">F.E CO<sub>2</sub>eq</label>
										<input id="emision_co2_eq" name="emision_co2_eq" type="text" class="small" value="<?php echo $pr->emision_co2_eq ?>" style="width:30px" />
									</div>
									
								</div>
								<div class="nextline" style="margin-top : 10px">
									<div class="sfinput" style="float : left; width : 160px">
										<label style="width : 80px">Proveedor</label>
										<input id="proveedor" type="text" name="proveedor" style="margin-right : 0px " class="small" value="<?php echo $pr->proveedor ?>" />
									</div>
									<div class="sfinput" style="float : left; width : 160px">
										<label style="width : 80px">Distancia(km)</label>
										<input id="distancia" type="text" name="distancia" style="margin-right : 0px " class="small" value="<?php echo $pr->distancia ?>" />
									</div>
									<div class="sfinput" style="">
										<label >Unidad</label>
										<input id="unidad" readonly=readonly type="text" name="unidad" class="small" value="<?php echo $pr->unidad ?>" />
									</div>
									<div class="finput" style="">
										<label >Fuente</label>
										<input id="fuente" type="text" name="fuente" class="medium" value="<?php echo utf8_encode($pr->fuente); ?>" />
									</div>
								</div>
								<input type="hidden" name="es_produccion" value="0" id="es_produccion" />
								<input type="hidden" name="es_transformacion" value="1" id="es_transformacion" />
								<?php if(isset($_SESSION['u']['enterprise'])) { ?><input type="hidden" name="empresa" value="<?php echo $_SESSION['u']['enterprise']; ?>" id="empresa" /><?php } ?>
								<input type="hidden" name="materia" value="<?php echo $_GET['materia']; ?>" id="materia" />
								<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
							</fieldset>
						</div>
				</fieldset>
				<div class="centerbutton" style="width: 100%;  text-align: center; height : 50px; float : left">
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateMatPT(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addMatPT();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form>	
		</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="js/proc-mpt.js"></script>
<script type="text/javascript" charset="utf-8">
$(function(){

	$("select#categoria").change(function(){
	//alert('charge les materia stp');
    $.getJSON("_ajax/select_Cat_Vehicules.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
	  options += '<option value="">Select Vehiculo</option>';
      for (var i = 0; i < j.length; i++) {
        options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
      }
	  $("#maquinaria-button").remove();
     $("select#maquinaria").html(options);
	  
        $("select#maquinaria").selectmenu({
            style: 'dropdown',
            transferClasses: true,
            width: null
        });
    })
  });
  
  $("select#maquinaria").change(function(){
	//alert('charge les materia stp');
    $.getJSON("_ajax/select_Veh_Recorridos.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
	  options += '<option value="">Select recoridos</option>';
      for (var i = 0; i < j.length; i++) {
        options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
      }
	  $("#recorrido-button").remove();
     $("select#recorrido").html(options);
	  
        $("select#recorrido").selectmenu({
            style: 'dropdown',
            transferClasses: true,
            width: null
        });
    })
  });
  
  
  $("select#recorrido").change(function(){
	//alert('charge les materia stp');
    $.getJSON("_ajax/getRecorrido.php",{id: $(this).val(), ajax: 'true'}, function(obj){
		jQuery("#unidad").val(obj.unidad);		
		jQuery("#emision_co2").val(obj.emision_co2);		
		jQuery("#emision_n2o").val(obj.emision_n2o);		
		jQuery("#emision_n2o").val(obj.emision_n2o);		
		jQuery("#emision_ch4").val(obj.emision_ch4);		
		jQuery("#emision_co2_eq").val(obj.emision_co2_eq);	
		jQuery("#fuente").val(obj.fuente);	
    })
  })
})
</script>