<?php
/*
	Controlador de la base de datos.
*/

class DatabaseController {
	var $mysqli;

	/*
		Realizar la conección con la base de datos.
	*/
	public function conectar_database() {
		$this->mysqli = new mysqli(	Database::get_servidor_database(),
									Database::get_usuario_database() ,
									Database::get_password_database(),
									Database::get_name_database());
		
		if ($this->mysqli->connect_errno) {
    		die("Error de conexión: " . $this->mysqli->connect_error);
		}
	}

	/*
		Cerrar la conección con la base de datos.
	*/
	public function cerrar_coneccion_database() {
		$this->mysqli->close();
	}

	/*
		Ejecutar sentencia SQL.
		@param String $sentencia: Sentencia SQL a ejecutar
		@return Int En caso de insert retorna el ID del registro.
	*/
	public function ejecutar_query($sentencia) {
		self::conectar_database();
		$this->mysqli->query($sentencia);
		$ultimo_id = $this->mysqli->insert_id;
		self::cerrar_coneccion_database();
		return $ultimo_id;
	}

	/*
		Ejecutar sentencia SQL de consulta.
		@param String $sentencia: Sentencia SQL a ejecutar
		@return Array Resultados de la consulta
	*/
	public function ejecutar_query_consulta($sentencia) {
		self::conectar_database();
		$resultado_de_la_consulta = $this->mysqli->query($sentencia);
		while($res = $resultado_de_la_consulta->fetch_assoc()) {
			$resultados[] = $res;
		}

		$resultado_de_la_consulta->free();
		self::cerrar_coneccion_database();
		return $resultados;
	}
}
?>