<?php
	require_once("core/model/tabla-creditos.php");

	$value_input_buscar_credito = "";

	$model_tabla_creditos = new TablaCreditos();

	if (isset($_REQUEST['input-buscar-credito'])) {
		$value_input_buscar_credito = $_REQUEST['input-buscar-credito'];
		$return_get_creditos = $model_tabla_creditos->get_creditos_por_nombre($value_input_buscar_credito);	
	} else {
		$return_get_creditos = $model_tabla_creditos->get_creditos();
	}
?>