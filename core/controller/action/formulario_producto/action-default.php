<?php
	require_once("core/model/tabla-productos.php");

	$producto_input_codigo = $_REQUEST['input-codigo'];
	$producto_input_nombre_producto = $_REQUEST['input-nombre-producto'];
	$producto_input_precio_producto = $_REQUEST['input-precio-producto'];
	$producto_input_cantidad_producto = $_REQUEST['input-cantidad-producto'];
	$producto_select_unidad_de_venta = $_REQUEST['select-unidad-de-venta'];
	$producto_select_disponible_producto = $_REQUEST['select-disponible-producto'];
	$producto_select_categoria = $_REQUEST['select-categoria-producto'];
	$producto_textarea_observacion_producto = $_REQUEST['textarea-observacion-producto'];

	$formulario_operacion = $_REQUEST['formulario_operacion'];

	$model_tabla_productos = new TablaProductos();

	# Si el producto no es contable.
	if ($producto_select_unidad_de_venta == "no_contable") {
		$producto_input_cantidad_producto = 0;
	}

	# Colocar nombre al archivo de imagen del producto.
	$nombre_archivo_imagen_producto = "";
	$imagen_cargada_formulario = 0; // 0: no hay imagen, 1: si se ha cargado imagen en formulario.
	if ($_FILES['input-producto-imagen']['name'] != "") {
		$timestamp = time();
		$nombre_archivo_imagen_producto = $timestamp."_".basename($_FILES['input-producto-imagen']['name']);
		$imagen_cargada_formulario = 1;
	}

	if ($formulario_operacion == "crear_nuevo_producto") {
		$model_tabla_productos->set_nuevo_producto(	$producto_input_nombre_producto,
													$producto_input_codigo,
													$producto_input_precio_producto,
													$producto_input_cantidad_producto,
													$producto_select_unidad_de_venta,
													$producto_select_disponible_producto,
													$nombre_archivo_imagen_producto,
													$producto_textarea_observacion_producto,
													$producto_select_categoria);

		# Añadir la imagen del producto.
		//move_uploaded_file($_FILES['input-producto-imagen']['tmp_name'],"subidas/producto/".basename($_FILES['input-producto-imagen']['name']));
		if ($imagen_cargada_formulario == 1) {
			move_uploaded_file($_FILES['input-producto-imagen']['tmp_name'],"subidas/producto/".$nombre_archivo_imagen_producto);
		}

		$cadena_direccion = "Location: ./?view=producto";
	    $cadena_direccion .= "&nuevo_producto_ananido_exitosamente";
	    header($cadena_direccion);
	} else if ($formulario_operacion == "editar_producto") {
		$producto_id = $_REQUEST['id_producto'];
		$model_tabla_productos->set_update_producto($producto_id,
													$producto_input_nombre_producto,
													$producto_input_codigo,
													$producto_input_precio_producto,
													$producto_input_cantidad_producto,
													$producto_select_unidad_de_venta,
													$producto_select_disponible_producto,
													$producto_textarea_observacion_producto,
													$producto_select_categoria);


		# Actualizar imagen.
		$return_producto_imagen_actual = $model_tabla_productos->get_producto_imagen($producto_id);
		foreach ($return_producto_imagen_actual as $key) {
			$producto_imagen_actual = $key['producto_imagen'];
		}

		# Validar si se ha cargado una imagen.
		if ($imagen_cargada_formulario == 1) {
			# Eliminar la imagen anterior, si existe.
			if (file_exists("subidas/producto/".$producto_imagen_actual)) {
				echo ", si existe el archivo";
				unlink("subidas/producto/".$producto_imagen_actual);
			} else {
				echo ", error para saber donde esta el fichero";
			}
			$model_tabla_productos->set_update_producto_imagen($producto_id,$nombre_archivo_imagen_producto);
			move_uploaded_file($_FILES['input-producto-imagen']['tmp_name'],"subidas/producto/".$nombre_archivo_imagen_producto);
		}
		
		$cadena_direccion = "Location: ./?view=producto";
		$cadena_direccion .= "&id=".$producto_id;
		$cadena_direccion .= "&actualizacion_exitosa";
		header($cadena_direccion);
	}
?>