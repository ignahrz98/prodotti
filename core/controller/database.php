<?php
/*
	Contiene los datos necesarios para conectar con la base de datos.
*/

class Database {
	/*
		@return Nombre del servidor.
	*/
	public static function get_servidor_database() {
		$dato = "localhost";
    	return $dato;
	}

	/*
		@return Usuario de la base de datos.
	*/
	public static function get_usuario_database() {
		$dato = "root";
    	return $dato;
	}

	/*
		@return Clave de usuario de la base de datos.
	*/
	public static function get_password_database() {
		$dato = "";
    	return $dato;
	}

	/*
		@return Nombre de la base de datos.
	*/
	public static function get_name_database() 
	{
		$dato = "prodotti";
    	return $dato;
	}
}
?>