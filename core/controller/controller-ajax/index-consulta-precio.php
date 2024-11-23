<?php
	error_reporting(0);

	require_once("../database.php");
    require_once("../database-controller.php");
    require_once("../../model/tabla-productos.php");
  
    $model_tabla_productos = new TablaProductos();

    $value_input_buscar_producto = $_POST['inputBuscarProducto'];
	$value_select_busqueda = $_POST['tipoDeConsulta'];

	if ($value_select_busqueda == "buscar_por_codigo") {
		$return_get_productos = $model_tabla_productos->get_producto_por_codigo($value_input_buscar_producto);
	} else if ($value_select_busqueda == "buscar_por_nombre") {
		$return_get_productos = $model_tabla_productos->get_productos_por_nombre($value_input_buscar_producto);
	}

	/*
	echo $_POST['inputBuscarProducto'];
	echo "<br>";
	echo $_POST['tipoDeConsulta'];
	*/
?>

<div class="row">
	<!--
	<div class="caja-consulta-precio col-md-8 offset-md-2">
		<div class="row">
			<div class="col-md-4">
				Imagen del producto <br>
				<img src="" alt="aqui imagen">
			</div>
			<div class="col-md-4">
				<p class="font-monospace"><i class="bi bi-upc"></i> Codigo del producto </p>
				<h3>Nombre del producto</h3>
				<p class="fs-2"><i class="bi bi-cash-stack"></i> Precio</p>
				<span class="badge rounded-pill bg-success"><i class="bi bi-check-circle-fill"></i> Disponible</span>
			</div>
		</div>
	</div>
	-->

	<?php
		$existe_productos = false;
		foreach ($return_get_productos as $key) {
			$existe_productos = true;
	?>
			<div class="caja-consulta-precio col-md-6 offset-md-2">
				<div class="row">
					<div class="col-4 col-md-2">
						<?php
                            if ($key['producto_imagen'] == "") {
                        ?>
                                <p>El producto no tiene una imagen.</p>
                        <?php                              
                            } else {
                        ?>
                                <img id="preview" class="img-fluid img-thumbnail img-min-100"  src="subidas/producto/<?php echo $key['producto_imagen'];?>" alt="Imagen del producto">
                        <?php
                            }
                        ?>
					</div>
					<div class="col-8 col-md-10">
						<p class="font-monospace"><i class="bi bi-upc"></i> <?php echo $key['producto_codigo'];?></p>
						<h3><?php echo $key['producto_nombre'];?></h3>
						<p class="fs-2"><i class="bi bi-cash-stack"></i> <?php echo $key['producto_precio'];?></p>
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
					</div>
				</div>
			</div>
	<?php
		}

		if ($existe_productos == false) {
	?>
			<div class="alert alert-danger" role="alert">
				No se han encontrado coincidencias.
			</div>
	<?php
		}
	?>
</div>