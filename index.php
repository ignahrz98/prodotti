<?php
	/*	Prodotti
		Es una aplicacion sencilla para el control de inventario y creditos en pequeños negocios.
	*/

	error_reporting(0);
	session_start();
	date_default_timezone_set('America/Caracas');

	require_once("core/controller/database.php");
	require_once("core/controller/database-controller.php");
	require_once("core/controller/front-controller.php");

	# Codigo utilizado para crear el primer usuario.
	/*
	require_once("core/model/tabla-usuarios.php");
	$usuario_nuevo = new TablaUsuarios();
	$usuario_nuevo->set_nuevo_usuario("admin",password_hash("1234", PASSWORD_DEFAULT));
	*/
	
?>