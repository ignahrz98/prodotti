<?php
	require_once("core/model/tabla-creditos.php");
	require_once("core/model/tabla-credito-movimientos.php");

	$credito_movimiento_fecha = $_REQUEST['input-fecha-credito-compra'];
	$value_input_monto_credito_compra = $_REQUEST['input-monto-credito-compra'];
	$value_input_concepto_credito_compra = $_REQUEST['textarea-concepto-credito-compra'];
	$value_id_credito = $_REQUEST['id_credito'];

	$value_compra_credito_dia = date('Y-m-d', strtotime($credito_movimiento_fecha)); // Extraer solo la fecha

	$model_tabla_creditos = new TablaCreditos();
	$model_tabla_credito_movimientos = new TablaCreditoMovimientos();

	$return_get_credito = $model_tabla_creditos->get_credito_por_id($value_id_credito);

	foreach ($return_get_credito as $key) {
		$credito_saldo_actual = $key['credito_saldo'];
	}

	$credito_saldo_nuevo = $credito_saldo_actual + $value_input_monto_credito_compra;

	//$credito_movimiento_fecha = date("Y-m-d");

	$credito_movimiento_descripcion = "COMPRA A CREDITO";

	$model_tabla_credito_movimientos->set_nuevo_movimiento_credito(	$value_id_credito,
																	$value_compra_credito_dia,
																	$credito_movimiento_fecha,
																	$value_input_monto_credito_compra,
																	$credito_movimiento_descripcion,
																	$value_input_concepto_credito_compra);

	$model_tabla_creditos->set_update_credito_saldo($value_id_credito,
													$credito_saldo_nuevo);

	$cadena_direccion = "Location: ./?view=credito_movimientos";
	$cadena_direccion .= "&id=".$value_id_credito;
	header($cadena_direccion);
?>