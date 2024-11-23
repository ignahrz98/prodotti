<?php
	class TablaCreditos {
		const NOMBRE_DE_LA_TABLA = "creditos";

		public function set_nuevo_credito(	$id_cliente,
											$credito_saldo) {
			
			$database_controller = new DatabaseController();
			$sql = "INSERT INTO ".self::NOMBRE_DE_LA_TABLA." (
					id_cliente,
					credito_saldo)

					VALUES(
					'".$id_cliente."',
					'".$credito_saldo."');";

			$database_controller->ejecutar_query($sql);
		}

		public function get_creditos(){
			$database_controller = new DatabaseController();
			$sql = "SELECT * FROM ".self::NOMBRE_DE_LA_TABLA."
					INNER JOIN clientes on creditos.id_cliente = clientes.id_cliente 
					ORDER BY cliente_nombre ASC;";
			$resultados = $database_controller->ejecutar_query_consulta($sql);
			return $resultados;
		}

		public function get_creditos_por_nombre($creditos_nombre_a_buscar){
			$database_controller = new DatabaseController();
			$sql = "SELECT * FROM ".self::NOMBRE_DE_LA_TABLA." 
					INNER JOIN clientes on creditos.id_cliente = clientes.id_cliente
					WHERE clientes.cliente_nombre LIKE '%".$creditos_nombre_a_buscar."%'
					ORDER BY clientes.cliente_nombre ASC;";
			$resultados = $database_controller->ejecutar_query_consulta($sql);
			return $resultados;
		}

		public function get_credito_por_id($id_credito){
			$database_controller = new DatabaseController();
			$sql = "SELECT * FROM ".self::NOMBRE_DE_LA_TABLA." 
					INNER JOIN clientes on creditos.id_cliente = clientes.id_cliente 
					WHERE id_credito = ".$id_credito.";";
			$resultados = $database_controller->ejecutar_query_consulta($sql);
			return $resultados;	
		}

		public function set_update_credito(	$id_credito,
											$credito_nombre){
			$database_controller = new DatabaseController();
			$sql = "UPDATE ".self::NOMBRE_DE_LA_TABLA."
					SET credito_nombre='".$credito_nombre."'
					WHERE id_credito=".$id_credito.";";
			$database_controller->ejecutar_query($sql);
		}

		public function set_update_credito_saldo(	$id_credito,
													$credito_saldo) {
			$database_controller = new DatabaseController();
			$sql = "UPDATE ".self::NOMBRE_DE_LA_TABLA."
					SET credito_saldo='".$credito_saldo."'
					WHERE id_credito=".$id_credito.";";
			$database_controller->ejecutar_query($sql);
		}
	}
?>