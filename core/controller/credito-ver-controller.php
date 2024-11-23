<?php
	require_once("core/model/tabla-creditos.php");
	$id_credito = $_GET['id'];

	$model_tabla_creditos = new TablaCreditos();

	$return_get_credito = $model_tabla_creditos->get_credito_por_id($id_credito);

	foreach ($return_get_credito as $key) {
		$value_credito_nombre = $key['cliente_nombre'];
		$value_credito_saldo = $key['credito_saldo'];
	}
?>