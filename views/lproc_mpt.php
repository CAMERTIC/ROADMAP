<?php
	@session_start();
	$menu = new empresa_materias_primas_transporte();	
	$menus = $menu->getAllRecordsEMatPT($_GET['materia_prima']);	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Transport for Materia Prima</h2>
					<span onclick="window.location='?view=lproc_mp&producto_final=<?php echo $_GET['producto_final'] ?>'" class="addy">Back to Materias primas</span>
					<span onclick="window.location='?view=proc_mpt&materia=<?php echo $_GET['materia_prima']; ?>&producto_final=<?php echo $_GET['producto_final'] ?>'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Materia Prima</th>
								<th>Vehiculo</th>
								<th>Recorrido</th>
								<th>Distancia</th>
								<th>Proveedor</th>
								<th width="55"></th>
							</tr> 
						</thead>
						<tbody> 
						<?php foreach($menus as $m) { ?> 
							<tr id="<?php echo $m->identificador; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><?php echo utf8_encode($m->material); ?></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->maquinaria, 'maquinarias'));  ?></a></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->recorrido, 'recorridos'));  ?></a></td>
								<td><a href="#"><?php echo $m->distancia;  ?></a></td>
								<td><a href="#"><?php echo $m->proveedor; ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=proc_mpt&id=<?php echo $m->identificador; ?>&materia=<?php echo $_GET['materia_prima'] ?>&producto_final=<?php echo $_GET['producto_final'] ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteMpt('<?php echo $m->identificador; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
								</td>
							</tr>
						<?php } ?> 
						</tbody> 
					</table>
					<button type="submit" class="red"><span>Delete</span></button>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="js/proc-mpt.js"></script>