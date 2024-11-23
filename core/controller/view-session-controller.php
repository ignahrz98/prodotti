<?php
	class ViewSessionController {
		var $permitir_mostrar_vista = false;
		var $mostrar_sin_session = array('login');
		var $mostrar_con_session = array(	'inventario',
											'producto',
											'creditos',
											'credito',
											'herramientas',
											'calculadora_precio_venta',
											'configuracion',
											'categorias',
											'categoria',
											'peso_digital',
											'conversor_moneda',
											'clientes',
											'cliente',
											'producto_entrada',
											'producto_salida',
											'credito_ver',
											'credito_operaciones');

		public function check_sin_session($vista_solicitada) {
			foreach ($this->mostrar_sin_session as $key => $value) {
				if ($vista_solicitada == $value) {
					$this->permitir_mostrar_vista = true;
				}
			}

			return $this->permitir_mostrar_vista;
		}

		public function check_con_session($vista_solicitada) {
			foreach ($this->mostrar_con_session as $key => $value) {
				if ($vista_solicitada == $value) {
					$this->permitir_mostrar_vista = true;
				}
			}
			return $this->permitir_mostrar_vista;
		}
	}
?>