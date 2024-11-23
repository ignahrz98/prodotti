<?php

?>

<div class="row px-3">
	<div class="col-md-4 offset-md-4 custom-box">
		<h2><i class="bi bi-calculator-fill"></i> Peso</h2>
		<p>Calcula el precio según el peso</p>

		<form id="form-calculadora">
			<div class="input-group mb-3">
				<span class="input-group-text">Precio (Kg)</span>
				<input type="number" class="form-control" name="input-precio" id="input-precio" placeholder="Ingrese precio" step="0.01" min="0.01" required>
			</div>

			<div class="input-group mb-3">
				<span class="input-group-text">Peso</span>
				<input type="number" class="form-control" name="input-peso" id="input-peso" placeholder="ejemplo: 10" min="1" required>
				<span class="input-group-text">grs</span>
			</div>

			<div class="text-center mb-3">
				<button type="submit" class="btn btn-primary">Calcular</button>
			</div>
		</form>

		<div id="mostrar-resultado">
			
		</div>
	</div>
</div>

<script type="text/javascript">
	const formCalculadora = document.getElementById("form-calculadora");
	formCalculadora.addEventListener('submit', (event) => {
		event.preventDefault(); // Prevents the default form submission
    	// Custom validation and submission logic here
    	const inputPrecio = formCalculadora.elements['input-precio'];
    	const inputPeso = formCalculadora.elements['input-peso'];

    	var divMostrarResultado, htmlMostrarResultado;
    	var precioPorPesoCalculado;

    	precioPorPesoCalculado = parseFloat(inputPrecio.value) * (parseInt(inputPeso.value) / 1000);

    	htmlMostrarResultado = "<h3>Resultado</h3>";
    	htmlMostrarResultado += "<p>Precio: " + precioPorPesoCalculado.toFixed(2) + "</p>";

    	divMostrarResultado = document.getElementById("mostrar-resultado");
    	divMostrarResultado.innerHTML = htmlMostrarResultado;
    });
</script>