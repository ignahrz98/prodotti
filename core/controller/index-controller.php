<?php
	require_once("core/model/tabla-productos.php");

	$model_tabla_productos = new TablaProductos();

	$value_input_buscar_producto = "";

	if (isset($_REQUEST['select-busqueda'])) {
		$value_input_buscar_producto = $_REQUEST['input-buscar-producto'];
		$value_select_busqueda = $_REQUEST['select-busqueda'];

		if ($value_select_busqueda == "buscar_por_codigo") {
			$return_get_productos = $model_tabla_productos->get_producto_por_codigo($value_input_buscar_producto);
		} else if ($value_select_busqueda == "buscar_por_nombre") {
			$return_get_productos = $model_tabla_productos->get_productos_por_nombre($value_input_buscar_producto);
		}
	}

	# Obtener los nombres de los productos para rellenar el datalist.
	$return_get_productos_datalist = $model_tabla_productos->get_productos();
?>