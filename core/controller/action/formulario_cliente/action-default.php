<?php
	require_once("core/model/tabla-clientes.php");
	require_once("core/model/tabla-creditos.php");

	$model_tabla_clientes = new TablaClientes();

	$value_input_nombre_cliente = $_REQUEST['input-nombre-cliente'];

	$formulario_operacion = $_REQUEST['formulario_operacion'];


	if ($formulario_operacion == "crear_nuevo_cliente") {
		# Crear el nuevo cliente.
		$ultimo_id = $model_tabla_clientes->set_nuevo_cliente($value_input_nombre_cliente);

		# Abrir credito.
		$model_tabla_creditos = new TablaCreditos();
		$model_tabla_creditos->set_nuevo_credito($ultimo_id,0);

		$cadena_direccion = "Location: ./?view=cliente";
		$cadena_direccion .= "&nuevo_cliente_ananido_exitosamente";
		header($cadena_direccion);
	} else if ($formulario_operacion == "editar_cliente") {
		$id_cliente = $_REQUEST['id_cliente'];
		$model_tabla_clientes->set_update_cliente(	$id_cliente,
													$value_input_nombre_cliente);
		$cadena_direccion = "Location: ./?view=cliente";
		$cadena_direccion .= "&id=".$id_cliente;
		$cadena_direccion .= "&actualizacion_exitosa";
		header($cadena_direccion);
	}
?>