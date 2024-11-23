<?php
	class TablaCategorias {
		const NOMBRE_DE_LA_TABLA = "categorias";

		public function set_nueva_categoria($categoria_nombre) {
			$database_controller = new DatabaseController();

			$sql = "INSERT INTO ".self::NOMBRE_DE_LA_TABLA." (
					categoria_nombre)

					VALUES(
					'".$categoria_nombre."');";
			$database_controller->ejecutar_query($sql);
		}

		public function set_update_categoria(	$id_categoria,
												$categoria_nombre) {
			$database_controller = new DatabaseController();
			$sql = "UPDATE ".self::NOMBRE_DE_LA_TABLA."
					SET categoria_nombre='".$categoria_nombre."'
					WHERE id_categoria=".$id_categoria.";";
			$database_controller->ejecutar_query($sql);
		}

		public function get_categorias() {
			$database_controller = new DatabaseController();
			$sql = "SELECT * FROM ".self::NOMBRE_DE_LA_TABLA."
					ORDER BY categoria_nombre ASC;";
			$resultados = $database_controller->ejecutar_query_consulta($sql);
			return $resultados;
		}

		public function get_categoria_por_id($id_categoria) {
			$database_controller = new DatabaseController();
			$sql = "SELECT * FROM ".self::NOMBRE_DE_LA_TABLA." 
					WHERE id_categoria = ".$id_categoria.";";
			$resultados = $database_controller->ejecutar_query_consulta($sql);
			return $resultados;	
		}
	}
?>