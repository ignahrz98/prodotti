<?php
	require_once("core/model/tabla-categorias.php");

	$value_categoria_nombre = "";

	$formulario_operacion = "crear_categoria";

	if(isset($_GET['id'])) {
		$formulario_operacion = "editar_categoria";
		$model_tabla_categorias = new TablaCategorias();
		$return_get_categoria = $model_tabla_categorias->get_categoria_por_id($_GET['id']);
		foreach ($return_get_categoria as $key) {
			$value_categoria_nombre = $key['categoria_nombre'];
		}
	}
?>