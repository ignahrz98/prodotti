<?php
	require_once("core/model/tabla-productos.php");
	require_once("core/model/tabla-categorias.php");
	
	$value_input_buscar_producto = "";
	
	$model_tabla_productos = new TablaProductos();
	$model_tabla_categorias = new TablaCategorias();

	$return_get_categorias = $model_tabla_categorias->get_categorias();

	if (isset($_REQUEST['select-busqueda'])) {
		$value_input_buscar_producto = $_REQUEST['input-buscar-producto'];
		$value_select_busqueda = $_REQUEST['select-busqueda'];
		$value_select_categoria = $_REQUEST['select-categoria'];

		$model_tabla_productos = new TablaProductos();

		if ($value_select_busqueda == "buscar_por_codigo") {
			$return_get_productos = $model_tabla_productos->get_producto_por_codigo($value_input_buscar_producto);
		} else if ($value_select_busqueda == "buscar_por_nombre") {
			if ($value_select_categoria == "todas_las_categorias") {
				$return_get_productos = $model_tabla_productos->get_productos_por_nombre($value_input_buscar_producto);
			} else {
				$return_get_productos = $model_tabla_productos->get_productos_por_nombre_y_categoria(	$value_input_buscar_producto,
																										$value_select_categoria);
			}
		}
	} else {
		$return_get_productos = $model_tabla_productos->get_productos();
	}

	function verificar_selected($categoria_producto,$categoria_a_mostrar) {
		if ($categoria_producto == $categoria_a_mostrar) {
			echo "selected";
		}
	}
?>