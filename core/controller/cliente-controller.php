<?php
	require_once("core/model/tabla-clientes.php");

	$value_id_cliente = "";
	$value_input_nombre_cliente = "";

	$formulario_operacion = "crear_nuevo_cliente";

	if (isset($_GET['id'])) {
		$formulario_operacion = "editar_cliente";
		$model_tabla_clientes = new TablaClientes();
		$return_get_clientes = $model_tabla_clientes->get_cliente_por_id($_GET['id']);
		foreach ($return_get_clientes as $key) {
			$value_id_cliente = $key['id_cliente'];
			$value_input_nombre_cliente = $key['cliente_nombre'];
		}
	}
?>