<?php
	require_once("core/model/tabla-productos.php");

	$model_tabla_productos = new TablaProductos();

	$return_get_producto = $model_tabla_productos->get_producto_por_id($_GET['id']);

	foreach ($return_get_producto as $key) {
		$value_producto_id = $key['id_producto'];
		$value_producto_nombre = $key['producto_nombre'];
		break;
	}
?>