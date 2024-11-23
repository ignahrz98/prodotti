<?php
	require_once("core/model/tabla-categorias.php");

	$nombre_input_categoria = $_REQUEST['input-nombre-categoria'];
	$formulario_operacion = $_REQUEST['formulario_operacion'];

	$model_tabla_categorias = new TablaCategorias();
	
	if ($formulario_operacion == "crear_categoria") {
		$model_tabla_categorias->set_nueva_categoria($nombre_input_categoria);

		$cadena_direccion = "Location: ./?view=categoria";
		$cadena_direccion .= "&nueva_categoria_ananida_exitosamente";
		header($cadena_direccion);
	} else if ($formulario_operacion == "editar_categoria") {
		$id_categoria = $_REQUEST['value_id_categoria'];
		$model_tabla_categorias->set_update_categoria(	$id_categoria,
														$nombre_input_categoria);
		$cadena_direccion = "Location: ./?view=categoria";
		$cadena_direccion .= "&id=".$id_categoria;
		$cadena_direccion .= "&actualizacion_exitosa";
		header($cadena_direccion);
	}
?>