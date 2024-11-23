<?php
	require_once("core/model/tabla-creditos.php");

	$value_input_nombre_credito = $_REQUEST['input-nombre-credito'];

	$formulario_operacion = $_REQUEST['formulario_operacion'];

	$model_tabla_creditos = new TablaCreditos();
	if ($formulario_operacion == "crear_nuevo_credito") {
		$model_tabla_creditos->set_nuevo_credito(	$value_input_nombre_credito,
					                                0);
		$cadena_direccion = "Location: ./?view=credito";
		$cadena_direccion .= "&nuevo_credito_ananido_exitosamente";
		header($cadena_direccion);
	} else if ($formulario_operacion == "editar_credito") {
		$id_credito = $_REQUEST['id_credito'];
		$model_tabla_creditos->set_update_credito(	$id_credito,
													$value_input_nombre_credito);
		$cadena_direccion = "Location: ./?view=credito";
		$cadena_direccion .= "&id=".$id_credito;
		$cadena_direccion .= "&actualizacion_exitosa";
		header($cadena_direccion);
	}
?>