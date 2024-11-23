<?php
	require_once("core/model/tabla-creditos.php");

	$model_tabla_creditos = new TablaCreditos();

	$return_get_credito = $model_tabla_creditos->get_credito_por_id($_GET['id']);

	foreach ($return_get_credito as $key) {
		$cliente_nombre = $key['cliente_nombre'];
		$credito_saldo = $key['credito_saldo'];
	}
?>