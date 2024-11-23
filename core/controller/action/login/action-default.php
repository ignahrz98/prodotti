<?php
	require_once("core/model/tabla-usuarios.php");

	$username_ingresado_login = $_REQUEST['input-usuario'];
	$password_ingresado_login = $_REQUEST['input-contrasena'];
	
	$model_tabla_usuarios = new TablaUsuarios();
	$return_consulta_busqueda_usuario = $model_tabla_usuarios->get_usuario_por_username($username_ingresado_login);

	#   Verificar que el array venga con datos
    #   Si está vacio es porque no hay coincidencias en la base de datos.
    if (is_array($return_consulta_busqueda_usuario)) {
        foreach ($return_consulta_busqueda_usuario as $key) {
            if ($key['username'] == $username_ingresado_login) {
                if (password_verify($password_ingresado_login, $key['password'])) {
                    $_SESSION['id_user_sesion_activa'] = $key['id_user'];
                    header("Location: ./");
                } else {
                    $cadena_direccion = "Location: ./?view=login";
                    $cadena_direccion .= "&username_ingresado=".$username_ingresado_login;
                    $cadena_direccion .= "&password_incorrecto";
                    header($cadena_direccion);
                }
            }
        }
    } else {
    	$cadena_direccion = "Location: ./?view=login";
    	$cadena_direccion .= "&username_ingresado=".$username_ingresado_login;
        $cadena_direccion .= "&username_no_registrado";
        header($cadena_direccion);
    }
?>