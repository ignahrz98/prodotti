<?php
	require_once("core/model/tabla-clientes.php");

	$value_input_buscar_cliente = "";

	$model_tabla_clientes = new TablaClientes();

	if (isset($_REQUEST['input-buscar-cliente'])) {
		$value_input_buscar_cliente = $_REQUEST['input-buscar-cliente'];
		$return_get_clientes = $model_tabla_clientes->get_clientes_por_nombre($value_input_buscar_cliente);
	} else {
		$return_get_clientes = $model_tabla_clientes->get_clientes();
	}
?>