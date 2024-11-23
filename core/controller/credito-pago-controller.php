<?php
	require_once("core/model/tabla-forma-pago.php");

	$model_tabla_forma_pago = new TablaFormaPago();
	$return_formas_pago = $model_tabla_forma_pago->get_formas_pago();

	$fecha_venta_default = date("Y-m-d H:i");
?>