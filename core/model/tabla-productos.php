<?php
	class TablaProductos {
		const NOMBRE_DE_LA_TABLA = "productos";

		public function set_nuevo_producto(	$producto_nombre,
											$producto_codigo,
											$producto_precio,
											$producto_cantidad,
											$producto_unidad_venta,
											$producto_disponibilidad,
											$producto_imagen,
											$producto_observaciones,
											$id_categoria) {
			$database_controller = new DatabaseController();
			$sql = "INSERT INTO ".self::NOMBRE_DE_LA_TABLA." (
					producto_nombre,
					producto_codigo,
					producto_precio,
					producto_cantidad,
					producto_unidad_venta,
					producto_disponibilidad,
					producto_imagen,
					producto_observaciones,
					id_categoria)

					VALUES(
					'".$producto_nombre."',
					'".$producto_codigo."',
					'".$producto_precio."',
					'".$producto_cantidad."',
					'".$producto_unidad_venta."',
					'".$producto_disponibilidad."',
					'".$producto_imagen."',
					'".$producto_observaciones."',
					'".$id_categoria."');";

			$database_controller->ejecutar_query($sql);
		}

		public function set_update_producto($producto_id,
											$producto_nombre,
											$producto_codigo,
											$producto_precio,
											$producto_cantidad,
											$producto_unidad_venta,
											$producto_disponibilidad,
											$producto_observaciones,
											$id_categoria) {
			$database_controller = new DatabaseController();
			$sql = "UPDATE ".self::NOMBRE_DE_LA_TABLA."
					SET producto_nombre='".$producto_nombre."',
					producto_codigo='".$producto_codigo."',
					producto_precio='".$producto_precio."',
					producto_cantidad='".$producto_cantidad."',
					producto_unidad_venta='".$producto_unidad_venta."',
					producto_disponibilidad='".$producto_disponibilidad."',
					producto_observaciones='".$producto_observaciones."',
					id_categoria='".$id_categoria."'
					WHERE id_producto=".$producto_id.";";
			$database_controller->ejecutar_query($sql);
		}

		public function set_update_producto_cantidad(	$producto_id,
														$producto_cantidad){
			$database_controller = new DatabaseController();
			$sql = "UPDATE ".self::NOMBRE_DE_LA_TABLA."
					SET producto_cantidad='".$producto_cantidad."'
					WHERE id_producto=".$producto_id.";";
			$database_controller->ejecutar_query($sql);
		}

		public function set_update_producto_imagen(	$producto_id,
													$producto_imagen){
			$database_controller = new DatabaseController();
			$sql = "UPDATE ".self::NOMBRE_DE_LA_TABLA."
					SET producto_imagen='".$producto_imagen."'
					WHERE id_producto=".$producto_id.";";
			$database_controller->ejecutar_query($sql);
		}

		public function get_productos() {
			$database_controller = new DatabaseController();
			$sql = "SELECT * FROM ".self::NOMBRE_DE_LA_TABLA."
					INNER JOIN categorias on categorias.id_categoria = productos.id_categoria
					ORDER BY producto_nombre ASC;";
			$resultados = $database_controller->ejecutar_query_consulta($sql);
			return $resultados;
		}

		public function get_producto_por_codigo($producto_codigo_a_buscar) {
			$database_controller = new DatabaseController();
			$sql = "SELECT * FROM ".self::NOMBRE_DE_LA_TABLA."
					INNER JOIN categorias on categorias.id_categoria = productos.id_categoria
					WHERE producto_codigo='".$producto_codigo_a_buscar."'
					ORDER BY producto_nombre ASC;";
			$resultados = $database_controller->ejecutar_query_consulta($sql);
			return $resultados;
		}

		public function get_productos_por_nombre($productos_nombre_a_buscar) {
			$database_controller = new DatabaseController();
			$sql = "SELECT * FROM ".self::NOMBRE_DE_LA_TABLA."
					INNER JOIN categorias on categorias.id_categoria = productos.id_categoria
					WHERE producto_nombre LIKE '%".$productos_nombre_a_buscar."%'
					ORDER BY producto_nombre ASC;";
			$resultados = $database_controller->ejecutar_query_consulta($sql);
			return $resultados;
		}

		public function get_productos_por_nombre_y_categoria(	$productos_nombre_a_buscar,
																$id_categoria) {
			$database_controller = new DatabaseController();
			$sql = "SELECT * FROM ".self::NOMBRE_DE_LA_TABLA." 
					INNER JOIN categorias ON categorias.id_categoria = productos.id_categoria 
					WHERE productos.producto_nombre LIKE '%".$productos_nombre_a_buscar."%'  AND 
					productos.id_categoria = ".$id_categoria." 
					ORDER BY producto_nombre ASC;";
			$resultados = $database_controller->ejecutar_query_consulta($sql);
			return $resultados;
		}

		public function get_producto_por_id($id_producto) {
			$database_controller = new DatabaseController();
			$sql = "SELECT * FROM ".self::NOMBRE_DE_LA_TABLA." 
					INNER JOIN categorias on categorias.id_categoria = productos.id_categoria
					WHERE id_producto = ".$id_producto.";";
			$resultados = $database_controller->ejecutar_query_consulta($sql);
			return $resultados;	
		}

		public function get_producto_imagen($id_producto) {
			$database_controller = new DatabaseController();
			$sql = "SELECT producto_imagen FROM ".self::NOMBRE_DE_LA_TABLA." 
					WHERE id_producto = ".$id_producto.";";
			$resultados = $database_controller->ejecutar_query_consulta($sql);
			return $resultados;	
		}
	}
?>