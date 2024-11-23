<?php
	require_once("core/model/tabla-creditos.php");
	require_once("core/model/tabla-credito-movimientos.php");
	require_once("core/model/tabla-ingresos.php");
	require_once("core/model/tabla-balance-diario.php");
	require_once("core/model/tabla-forma-pago.php");

	$model_tabla_creditos = new TablaCreditos();
	$model_tabla_credito_movimientos = new TablaCreditoMovimientos();
	$model_tabla_ingresos = new TablaIngresos();
	$model_tabla_balance_diario = new TablaBalanceDiario();
	$model_tabla_forma_pago = new TablaFormaPago();

	$credito_movimiento_fecha = $_REQUEST['input-fecha-credito-pago'];
	$value_input_monto_credito_pago = $_REQUEST['input-monto-credito-pago'];
	$value_input_concepto_credito_pago = $_REQUEST['textarea-concepto-credito-pago'];
	$value_select_forma_pago_credito = $_REQUEST['select-forma-pago-credito-pago'];
	$value_id_credito = $_REQUEST['id_credito'];

	$value_credito_pago_dia = date('Y-m-d', strtotime($credito_movimiento_fecha)); // Extraer solo la fecha

	$return_get_credito = $model_tabla_creditos->get_credito_por_id($value_id_credito);

	foreach ($return_get_credito as $key) {
		$credito_saldo_actual = $key['credito_saldo'];
	}

	$credito_saldo_nuevo = $credito_saldo_actual - $value_input_monto_credito_pago;

	#$credito_movimiento_fecha = date("Y-m-d");

	$credito_movimiento_descripcion = "CREDITO PAGO";

	$model_tabla_credito_movimientos->set_nuevo_movimiento_credito(	$value_id_credito,
																	$value_credito_pago_dia,
																	$credito_movimiento_fecha,
																	$value_input_monto_credito_pago,
																	$credito_movimiento_descripcion,
																	$value_input_concepto_credito_pago);

	$model_tabla_creditos->set_update_credito_saldo($value_id_credito,
													$credito_saldo_nuevo);

	$model_tabla_ingresos->set_nuevo_ingreso(	$value_credito_pago_dia,
												$credito_movimiento_fecha,
												$value_input_monto_credito_pago,
												$value_select_forma_pago_credito);

	$return_get_forma_pago = $model_tabla_forma_pago->get_forma_pago_por_id($value_select_forma_pago_credito);
	if (!empty($return_get_forma_pago)) {
		foreach ($return_get_forma_pago as $key) {
			if ($key['forma_pago_tipo_ingreso'] == 1) {
				$model_tabla_balance_diario->set_actualizar_balance_diario_ingreso(	$value_credito_pago_dia,
																					$value_input_monto_credito_pago);
				break;
			}
		}
	}


	$cadena_direccion = "Location: ./?view=credito_movimientos";
	$cadena_direccion .= "&id=".$value_id_credito;
	header($cadena_direccion);
?>