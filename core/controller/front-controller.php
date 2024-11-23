<?php
	require_once("core/controller/action-controller.php");
	require_once("core/controller/view-controller.php");
	require_once("core/controller/view-session-controller.php");

	if (isset($_GET['view'])) {
		$ControladorDeVistaSession = new ViewSessionController();
		if (isset($_SESSION['id_user_sesion_activa'])) {
			if ($ControladorDeVistaSession->check_con_session($_GET['view'])) {
				$vista_a_mostrar = $_GET['view'];
				require_once("core/view/pagina.php");
			} else {
				header("Location: ./");
			}
		} else {
			if ($ControladorDeVistaSession->check_sin_session($_GET['view'])) {
				$vista_a_mostrar = $_GET['view'];
				require_once("core/view/pagina.php");
			} else {
				header("Location: ./");
			}
		}
	} else if (isset($_GET['action'])) {
		ActionController::add_action($_GET['action']);	
	} else {
		$vista_a_mostrar = "index";
		require_once("core/view/pagina.php");
	}
?>