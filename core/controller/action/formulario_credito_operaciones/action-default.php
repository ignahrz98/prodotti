<?php
	require_once('core/model/tabla-creditos.php');

	$model_tabla_creditos = new TablaCreditos();

	$return_get_credito = $model_tabla_creditos->get_credito_por_id($_REQUEST['id_credito']);

	foreach ($return_get_credito as $key) {
		$credito_saldo = $key['credito_saldo'];
		break;
	}

	if ($_REQUEST['select-credito-operaciones'] == "sumar_saldo") {
		$nuevo_credito_saldo = $credito_saldo + $_REQUEST['input-monto-operaciones'];
	} else if ($_REQUEST['select-credito-operaciones'] == "restar_saldo") {
		$nuevo_credito_saldo = $credito_saldo - $_REQUEST['input-monto-operaciones'];
	} else if ($_REQUEST['select-credito-operaciones'] == "modificar_saldo") {
		$nuevo_credito_saldo = $_REQUEST['input-monto-operaciones'];
	}

	$model_tabla_creditos->set_update_credito_saldo(	$_REQUEST['id_credito'],
														$nuevo_credito_saldo);

	$cadena_direccion = "Location: ./?view=credito_ver";
	$cadena_direccion.= "&id=" . $_REQUEST['id_credito'];
	header($cadena_direccion);
?>