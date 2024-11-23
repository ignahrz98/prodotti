<?php
	require_once("core/controller/inventario-controller.php");
?>

<div class="row">
	<div class="col-12 col-md-8">
		<h2 class="mb-3"><i class="bi bi-inboxes-fill"></i> Inventario</h2>	
	</div>
	<div class="col-12 col-md-4 mb-3 mb-md-0">
		<a class="btn btn-primary btn-sm" href="./?view=producto" role="button"><i class="bi bi-plus-circle"></i> Añadir producto</a>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<form action="./?view=inventario" method="post">
			<div class="input-group mb-3">
				<div class="col-12 col-md-6">
					<input class="form-control" type="text" name="input-buscar-producto" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $value_input_buscar_producto;?>" placeholder="Ingrese búsqueda">
				</div>
				<div class="col-12 col-md-2 mt-3 mt-sm-0">
					<select class="form-select" name="select-busqueda">
						<option value="buscar_por_nombre" <?php if(isset($_REQUEST['select-busqueda']) && $_REQUEST['select-busqueda'] == "buscar_por_nombre"){echo "selected";}?>>Nombre</option>
						<option value="buscar_por_codigo" <?php if(isset($_REQUEST['select-busqueda']) && $_REQUEST['select-busqueda'] == "buscar_por_codigo"){echo "selected";}?>>Código</option>
					</select>
				</div>
				<div class="col-8 col-md-2 mt-3 mt-sm-0">
					<select class="form-select" name="select-categoria">
						<option value="todas_las_categorias">TODAS LAS CATEGORIAS</option>
						<?php
							foreach ($return_get_categorias as $key) {
						?>
								<option value="<?php echo $key['id_categoria'];?>" <?php verificar_selected($key['id_categoria'],$value_select_categoria);?>><?php echo $key['categoria_nombre'];?></option>
						<?php
							}
						?>
					</select>
				</div>
				<div class="col-2 col-md-2 mt-3 mt-sm-0">
					<button type="submit" class="btn btn-primary">Buscar</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="row">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col"><i class="bi bi-upc"></i> Código</th>
					<th scope="col"><i class="bi bi-list-ul"></i> Nombre</th>
					<th scope="col"><i class="bi bi-tag-fill"></i> Categoría</th>
					<th scope="col"><i class="bi bi-box2-fill"></i> Cantidad</th>
					<th scope="col"><i class="bi bi-clipboard2"></i> Disponible</th>
					<th scope="col"><i class="bi bi-tools"></i> Operaciones</th>
				</tr>	
			</thead>
			<tbody>
				<?php
					$existe_productos = false;
					foreach ($return_get_productos as $key) {
						if ($existe_productos == false) {
							$existe_productos = true;
						}
				?>
						<tr>
							<td class="col"><?php echo $key['producto_codigo'];?></td>
							<td class="col "><span class="fw-bold nombre-producto-inventario" onclick="mostrarModalInventario(<?php echo $key['id_producto'];?>)"><?php echo $key['producto_nombre'];?></span></td>
							<td><?php echo $key['categoria_nombre'];?></td>
							<td class="col">
								<?php
									# Color de fuente segun la cantidad
									if($key['producto_cantidad'] < 0) {
									 	$estilo_fuente = "text-danger";
									} else if($key['producto_cantidad'] > 0) {
										$estilo_fuente = "text-success";
									} else {
										$estilo_fuente = "text-secondary";
									}

									# Casting segun sea necesario
									if ($key['producto_unidad_venta'] == "unidades") {
										$value_mostrar_cantidad = (int)$key['producto_cantidad'];
										$value_mostrar_cantidad .= " unidades";
									} else if ($key['producto_unidad_venta'] == "no_contable") {
										$value_mostrar_cantidad = "n/a";
									} else if ($key['producto_unidad_venta'] == "litros") {
										$value_mostrar_cantidad = $key['producto_cantidad'];
										$value_mostrar_cantidad .= " litros";
									}
								?>
								<p class="<?php echo $estilo_fuente;?>"><?php echo $value_mostrar_cantidad;?></p>
							</td>
							<td class="col">
								<?php
									if ($key['producto_disponibilidad'] == "1") {
								?>
										<span class="badge rounded-pill bg-success"><i class="bi bi-check-circle-fill"></i> Disponible</span>
								<?php		
									} else if ($key['producto_disponibilidad'] == "0") {
								?>
										<span class="badge rounded-pill bg-danger"><i class="bi bi-x-circle-fill"></i> Agotado</span>
								<?php
									} else if ($key['producto_disponibilidad'] == "2") {
								?>
										<span class="badge rounded-pill bg-secondary"><i class="bi bi-x-circle-fill"></i> Retirado</span>
								<?php
									}
								?>
							</td>
							<td class="col">
								<a class="btn btn-secondary btn-sm btn-opciones-tabla" href="./?view=producto&id=<?php echo $key['id_producto'];?>" role="button"><i class="bi bi-pencil-fill"></i> Editar</a>
								<a class="btn btn-secondary btn-sm btn-opciones-tabla" onclick="mostrarModalInventario(<?php echo $key['id_producto'];?>)"><i class="bi bi-eye-fill"></i> Ver</a>
							</td>
						</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<?php
		if (isset($_REQUEST['select-busqueda']) && $existe_productos == false) {
	?>
			<div class="alert alert-danger" role="alert">
				No se han encontrado coincidencias.
			</div>
	<?php
		} else if (!isset($_REQUEST['select-busqueda']) && $existe_productos == false) {
	?>
			<div class="alert alert-dark" role="alert">
				Aún no tiene productos en el inventario <a href="./?view=producto" class="alert-link">Puede añadir uno nuevo aquí</a>.
			</div>
	<?php
		}
	?>
</div>

<div id="resultado">
	
</div>

<script type="text/javascript">
	function mostrarModalInventario(id_producto){
		var parametros = {
            "id_producto" : id_producto
        };
		$.ajax({
        	data:  parametros, //datos que se envian a traves de ajax
			url: 'core/controller/controller-ajax/modal-inventario.php', //archivo que recibe la peticion
			type:  'post', //método de envio
			success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#resultado").html(response);
            }
		});
	};
</script>