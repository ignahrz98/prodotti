<?php
	require_once("core/model/tabla-creditos.php");

	$value_id_credito = "";
	$value_input_nombre_credito = "";
	$value_input_fecha_credito = "";
	$value_input_saldo_credito = "";
	$value_textarea_concepto_credito = "";

	$formulario_operacion = "crear_nuevo_credito";

	if (isset($_GET['id'])) {
		$formulario_operacion = "editar_credito";
		$model_tabla_creditos = new TablaCreditos();
		$return_get_credito = $model_tabla_creditos->get_credito_por_id($_GET['id']);
		foreach ($return_get_credito as $key) {
			$value_id_credito = $key['id_credito'];
			$value_input_nombre_credito = $key['credito_nombre'];
			$value_input_fecha_credito = $key['credito_fecha'];
			$value_input_saldo_credito = $key['credito_saldo'];
			$value_textarea_concepto_credito = $key['credito_concepto'];
		}
	}
?>