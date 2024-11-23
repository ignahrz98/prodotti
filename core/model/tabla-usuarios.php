<?php
	class TablaUsuarios {
		const NOMBRE_DE_LA_TABLA = "usuarios";

		public function set_nuevo_usuario(	$username_nuevo_usuario, 
											$password_nuevo_usuario) {

			$database_controller = new DatabaseController();
			$sql = "INSERT INTO ".self::NOMBRE_DE_LA_TABLA." (
					username,
					password)

					VALUES(
					'".$username_nuevo_usuario."',
					'".$password_nuevo_usuario."');";

			$database_controller->ejecutar_query($sql);
		}

		public function get_usuario_por_username($username_a_buscar) {

			$database_controller = new DatabaseController();
			$sql = "SELECT id_user,username,password 
					FROM ".self::NOMBRE_DE_LA_TABLA."
					WHERE username='".$username_a_buscar."';";
			$resultados = $database_controller->ejecutar_query_consulta($sql);
			return $resultados;
		}
	}
?>