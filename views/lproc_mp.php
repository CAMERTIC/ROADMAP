<?php
	@session_start();
	$menu = new empresa_materias_primas();	
	$menus = $menu->getAllRecordsEProcP($_GET['producto_final']);	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Materia Prima for product <?php echo utf8_encode($menu->getName($_GET['producto_final'], 'productos_finales')); ?></h2>
					<span onclick="window.location='?view=lproc_pp'" class="addy">Back to product</span>
					<span onclick="window.location='?view=proc_mp&producto_final=<?php echo $_GET['producto_final']; ?>'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Producto</th>
								<th>Materia Prima</th>
								<th>Cantidad</th>
								<th>Vehiculo</th>
								<th>Recorrido</th>
								<th>Distancia</th>
								<th width="55"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
							<tr id="<?php echo $m->identificador; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->producto_final, 'productos_finales')); ?></a></td>
								<td><?php echo utf8_encode($menu->getName($m->materia_prima, 'materias_primas')); ?></td>
								<td><a href="#"><?php echo $m->cantidad; ?></a></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->maquinaria, 'maquinarias'));  ?></a></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->recorrido, 'recorridos'));  ?></a></td>
								<td><a href="#"><?php echo $m->distancia;  ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=proc_mp&materia_prima=<?php echo $m->identificador; ?>&producto_final=<?php echo $m->producto_final ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteMatP('<?php echo $m->identificador; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
									<a style="margin-left:2px;float:left" href="?view=lproc_mpt&materia_prima=<?php echo $m->identificador; ?>&producto_final=<?php echo $m->producto_final ?>" ><img height="20" src="images/icons/truck.png" alt="delete" /></a>
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
<script type="text/javascript" src="js/proc-mp.js"></script>