<?php
	require_once("core/model/tabla-productos.php");
	require_once("core/model/tabla-categorias.php");

	$value_id_producto = "";
	$value_input_codigo = "";
	$value_input_nombre_producto = "";
	$value_input_precio_producto = "";
	$value_input_cantidad_producto = "0";
	$value_select_disponible_producto = "1";
	$value_textarea_observacion_producto = "";

	$formulario_operacion = "crear_nuevo_producto";
	$display = "none";

	$model_tabla_categorias = new TablaCategorias();
	$return_get_categorias = $model_tabla_categorias->get_categorias();


	if (isset($_GET['id'])) {
		$formulario_operacion = "editar_producto";
		$model_tabla_productos = new TablaProductos();
		$return_get_producto = $model_tabla_productos->get_producto_por_id($_GET['id']);
		foreach ($return_get_producto as $key) {
			$value_id_producto = $key['id_producto'];
			$value_input_codigo = $key['producto_codigo'];
			$value_input_nombre_producto = $key['producto_nombre'];
			$value_input_precio_producto = $key['producto_precio'];
			$value_input_cantidad_producto = $key['producto_cantidad'];
			$value_select_producto_unidad_venta = $key['producto_unidad_venta'];
			$value_select_disponible_producto = $key['producto_disponibilidad'];
			$value_select_categoria = $key['id_categoria'];
			$value_producto_imagen = $key['producto_imagen'];
			$value_textarea_observacion_producto = $key['producto_observaciones'];
		}

		# Mostrar input de cantidad segun sea necesario.
		if ($value_select_producto_unidad_venta != "no_contable") {
			$display = "block";
		}
		# Preparar datos para mostrar.
		if ($value_select_producto_unidad_venta == "unidades") {
			$value_input_cantidad_producto = (int)$value_input_cantidad_producto;
		}

		# Preparar imagen del producto.
		$value_producto_imagen = "subidas/producto/".$value_producto_imagen;
	}

	function verificar_selected($categoria_producto,$categoria_a_mostrar) {
		if ($categoria_producto == $categoria_a_mostrar) {
			echo "selected";
		}
	}
?>