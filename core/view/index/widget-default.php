<?php
	require_once("core/controller/index-controller.php");
?>

<div class="row">
	<div class="col-md-8 offset-md-2">
		<h2 class="mb-3"><i class="bi bi-upc-scan"></i> Consulta de precio</h2>	
		<form action="./" id="form-consulta-precio" method="post" onsubmit="return false;">
			<div class="input-group mb-3">
				<div class="col-12 col-md-8">
					<input class="form-control" type="text" id="input-buscar-producto" name="input-buscar-producto" list="datalistOptions" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ingrese búsqueda" autocomplete="off" required>
					<datalist id="datalistOptions">
					  	<?php
					  		foreach ($return_get_productos_datalist as $key) {
					  	?>
					  			<option value="<?php echo $key['producto_nombre']?>">
					  	<?php
					  		}
					  	?>
					</datalist>
				</div>
				<div class="col-8 col-md-2 mt-3 mt-sm-0">
					<select class="form-select" id="select-busqueda" name="select-busqueda">
						<option value="buscar_por_nombre">Nombre</option>
						<option value="buscar_por_codigo">Código</option>
					</select>
				</div>
				<div class="col-2 col-md-2 mt-3 mt-sm-0">
					<button type="submit" class="btn btn-primary" onclick="buscarDatos()">Buscar</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div id="resultado">
	
</div>

<script type="text/javascript">
	function buscarDatos() {
		var inputBuscarProducto = $('#input-buscar-producto').val(); // Obtener el valor del input
		var tipoDeConsulta = $('#select-busqueda').val();

		console.log(inputBuscarProducto);
		console.log(tipoDeConsulta);

		if (inputBuscarProducto != "") {
			var parametros = {
	            "inputBuscarProducto" : inputBuscarProducto,
	            "tipoDeConsulta" : tipoDeConsulta
	        };
			$.ajax({
	        	data:  parametros, //datos que se envian a traves de ajax
				url: 'core/controller/controller-ajax/index-consulta-precio.php', //archivo que recibe la peticion
				type:  'post', //método de envio
				success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
	                $("#resultado").html(response);
	            }
			});
		}
	}
</script>