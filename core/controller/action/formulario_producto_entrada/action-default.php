<?php
	require_once('core/model/tabla-productos.php');

	$model_tabla_productos = new TablaProductos();

	$return_get_producto = $model_tabla_productos->get_producto_por_id($_REQUEST['id_producto']);

	foreach ($return_get_producto as $key) {
		$producto_cantidad = $key['producto_cantidad'];
	}

	$nuevo_producto_cantidad = $producto_cantidad + $_REQUEST['input-producto-entrada-cantidad'];

	$model_tabla_productos->set_update_producto_cantidad(	$_REQUEST['id_producto'],
															$nuevo_producto_cantidad);

	$cadena_direccion = "Location: ./?view=inventario";
	header($cadena_direccion);
?>