<?php
class BarraDeMenu {
	public function generar_barra_de_menu($tipo_de_menu) {
?>
	    <nav class="navbar navbar-expand-lg navbar-dark mb-3">	    
			<div class="container-fluid">
				<a class="navbar-brand" href="./">Prodotti</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      			<span class="navbar-toggler-icon"></span>
	    		</button>

	    		<div class="collapse navbar-collapse" id="navbarSupportedContent">
	   				<?php
	   					if ($tipo_de_menu == "menu_con_sesion") {
	   						$this->menu_opciones_con_sesion();
	   					} else if ($tipo_de_menu == "menu_sin_sesion") {
	   						$this->menu_opciones_sin_sesion();
	   					}
	   				?>	
	    		</div>
			</div>
		</nav>
<?php
	}

	private function menu_opciones_con_sesion() {
?>
		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
		 	<li class="nav-item">
  				<a class="nav-link" href="./?view=inventario">Inventario</a>
			</li>
			<li class="nav-item">
  				<a class="nav-link" href="./?view=compras">Compras</a>
			</li>
            <li class="nav-item dropdown">
            	<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		        	Ventas
		        </a>
		          <ul class="dropdown-menu">
		            <li><a class="dropdown-item" href="./?view=ventas">Todas las ventas</a></li>
		            <li><a class="dropdown-item" href="./?view=ventas_por_dia">Ventas por día</a></li>
		          </ul>
            </li>
			<li class="nav-item">
  				<a class="nav-link" href="./?view=creditos">Créditos</a>
			</li>
            <li class="nav-item">
                <a class="nav-link" href="./?view=herramientas">Herramientas</a>
            </li>
		</ul>

		<ul class="navbar-nav justify-content-end">
			<li class="nav-item">
  				<a class="btn btn-sm btn-outline-light" href="./?view=configuracion">Configuración</a>
			</li>
		</ul>
<?php
	}

	private function menu_opciones_sin_sesion() {
?>
		<ul class="navbar-nav ms-auto">
		 	<li class="nav-item">
  				<a class="btn btn-sm btn-outline-light" href="./?view=login"><i class="bi bi-box-arrow-in-right"></i> Iniciar sesión</a>
			</li>
		</ul>
<?php
	}
}
?>