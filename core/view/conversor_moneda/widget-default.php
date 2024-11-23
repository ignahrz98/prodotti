<?php

?>

<div class="row px-3">
	<div class="col-md-4 offset-md-4 custom-box">
		<h2><i class="bi bi-calculator-fill"></i> Conversor de moneda</h2>
		<p>Convertir entre monedas</p>

		<form id="form-calculadora">
			<div class="input-group mb-3">
				<span class="input-group-text">Monto</span>
				<input type="number" class="form-control" name="input-monto" id="input-monto" placeholder="Ingrese monto" step="0.01" min="0.01" required>
			</div>

			<div class="input-group mb-3">
				<span class="input-group-text">Tasa</span>
				<input type="number" class="form-control" name="input-tasa" id="input-tasa" placeholder="Ingrese precio" step="0.01" min="0.01" required>
			</div>

			<div class="mb-3">
				<select class="form-control" name="select-conversor" id="select-conversor">
					<option value="multiplicar_tasa">Monto x Tasa</option>
					<option value="dividir_tasa">Monto / Tasa</option>
				</select>
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
    	const inputMonto = formCalculadora.elements['input-monto'];
    	const inputTasa = formCalculadora.elements['input-tasa'];
    	const selectConversor = formCalculadora.elements['select-conversor'];

    	var divMostrarResultado, htmlMostrarResultado;
    	var montoConvertido;

    	if (selectConversor.value == "multiplicar_tasa") {
    		montoConvertido = parseFloat(inputMonto.value) * parseFloat(inputTasa.value);
    	} else if (selectConversor.value == "dividir_tasa") {
    		montoConvertido = parseFloat(inputMonto.value) / parseFloat(inputTasa.value);
    	}

    	htmlMostrarResultado = "<h3>Resultado</h3>";
    	htmlMostrarResultado += "<p>Monto convertido: " + montoConvertido.toFixed(2) + "</p>";

    	divMostrarResultado = document.getElementById("mostrar-resultado");
    	divMostrarResultado.innerHTML = htmlMostrarResultado;
    });
</script>