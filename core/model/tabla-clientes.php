<?php
	class TablaClientes {
		const NOMBRE_DE_LA_TABLA = "clientes";

		public function set_nuevo_cliente($cliente_nombre) {
			
			$database_controller = new DatabaseController();
			$sql = "INSERT INTO ".self::NOMBRE_DE_LA_TABLA." (
					cliente_nombre)

					VALUES(
					'".$cliente_nombre."');";

			$ultimo_id = $database_controller->ejecutar_query($sql);

			return $ultimo_id;
		}

		public function get_clientes(){
			$database_controller = new DatabaseController();
			$sql = "SELECT * FROM ".self::NOMBRE_DE_LA_TABLA."
					ORDER BY cliente_nombre ASC;";
			$resultados = $database_controller->ejecutar_query_consulta($sql);
			return $resultados;
		}

		public function get_clientes_por_nombre($clientes_nombre_a_buscar){
			$database_controller = new DatabaseController();
			$sql = "SELECT * FROM ".self::NOMBRE_DE_LA_TABLA."
					WHERE cliente_nombre LIKE '%".$clientes_nombre_a_buscar."%'
					ORDER BY cliente_nombre ASC;";
			$resultados = $database_controller->ejecutar_query_consulta($sql);
			return $resultados;
		}

		public function get_cliente_por_id($id_cliente){
			$database_controller = new DatabaseController();
			$sql = "SELECT * FROM ".self::NOMBRE_DE_LA_TABLA." 
					WHERE id_cliente = ".$id_cliente.";";
			$resultados = $database_controller->ejecutar_query_consulta($sql);
			return $resultados;	
		}

		public function set_update_cliente(	$id_cliente,
											$cliente_nombre){
			$database_controller = new DatabaseController();
			$sql = "UPDATE ".self::NOMBRE_DE_LA_TABLA."
					SET cliente_nombre='".$cliente_nombre."'
					WHERE id_cliente=".$id_cliente.";";
			$database_controller->ejecutar_query($sql);
		}
	}
?>