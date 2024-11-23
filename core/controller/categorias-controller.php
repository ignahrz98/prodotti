<?php
	require_once("core/model/tabla-categorias.php");

	$model_tabla_categorias = new TablaCategorias();

	$return_get_categorias = $model_tabla_categorias->get_categorias();
?>