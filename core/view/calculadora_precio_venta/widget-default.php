<?php

?>

<div class="row px-3">
	<div class="col-md-4 offset-md-4 custom-box">
		<h2><i class="bi bi-calculator-fill"></i> Calculadora de precio para venta</h2>
		<p>Calcular precio sugerido para venta sugerido.</p>

		<form id="form-calculadora">
			<div class="input-group mb-3">
				<span class="input-group-text">Margen de ganancia</span>
				<input type="number" class="form-control" name="input-margen-ganancia" id="input-margen-ganancia" placeholder="ejemplo: 10" min="1" value="30" required>
				<span class="input-group-text">%</span>
			</div>

			<div class="input-group mb-3">
				<span class="input-group-text">Precio</span>
				<input type="number" class="form-control" name="input-precio" id="input-precio" placeholder="Ingrese precio" step="0.01" min="0.01" required>
			</div>

			<div class="mb-3">
				<select class="form-control" name="select-iva" id="select-iva">
					<option value="no_agregar_iva">No agregar IVA</option>
					<option value="agregar_iva">Agregar IVA</option>
				</select>
			</div>

			<div class="mb-3">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="radio-dividir" id="radio-dividir-1" value="no_dividir_resultado" checked>
					<label class="form-check-label" for="radio-dividir-1">
						No dividir resultado
					</label>
				</div>

				<div class="form-check mb-3">
					<input class="form-check-input" type="radio" name="radio-dividir" id="radio-dividir-2" value="dividir_resultado">
					<label class="form-check-label" for="radio-dividir-2">
						Dividir resultado
					</label>
				</div>

				<div class="input-group mb-3">
					<span class="input-group-text">Dividir entre</span>
					<input type="number" class="form-control" name="input-dividir" id="input-dividir" placeholder="ejemplo: 20" min="1">
					<span class="input-group-text">#</span>
				</div>
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
    	const inputMargenGanancia = formCalculadora.elements['input-margen-ganancia'];

    	const valorIvaPorcentaje = 16;
    	const valorMargenGananciaPorcentaje = inputMargenGanancia.value;

    	var precioInicial, precioFinal, precioCalculado, precioDividido;
    	var divMostrarResultado;
    	var htmlMostrarResultado;

    	const campoInputPrecio = formCalculadora.elements['input-precio']; // accessing element by name
    	const selectIva = formCalculadora.elements['select-iva'];
    	const radioDividir = formCalculadora.elements['radio-dividir'];
    	const campoInputDividir = formCalculadora.elements['input-dividir'];

    	htmlMostrarResultado = "<h3>Resultado</h3>";

    	/*
    	if (selectIva.value == "no_agregar_iva") {
    		precioInicial = parseFloat(campoInputPrecio.value);
    		precioCalculado = precioInicial + ((valorMargenGananciaPorcentaje / 100) * precioInicial);

    		htmlMostrarResultado += "<p>Precio sugerido de venta: " + precioCalculado + "</p>";
    	} else if (selectIva.value == "agregar_iva") {
    		precioInicial = parseFloat(campoInputPrecio.value);
    		precioFinal = precioInicial + ((valorIvaPorcentaje / 100) * precioInicial);
    		htmlMostrarResultado += "<p>Precio con IVA: " + precioFinal + "</p>";
    		
    		precioCalculado = precioFinal + ((valorMargenGananciaPorcentaje / 100) * precioFinal);
    		htmlMostrarResultado += "<p>Precio de venta: " + precioCalculado + "</p>";
    	}

    	if (radioDividir.value == "dividir_resultado") {
    		precioDividido = precioCalculado / parseInt(campoInputDividir.value);
    		htmlMostrarResultado += "<p>El precio final por unidad es: " + precioDividido + "</p>";
    	}
    	*/

    	/* Calcular precio de acuerdo el IVA*/
    	precioInicial = parseFloat(campoInputPrecio.value);
    	if (selectIva.value == "agregar_iva") {		
    		precioFinal = precioInicial + ((valorIvaPorcentaje / 100) * precioInicial);
    	} else if (selectIva.value == "no_agregar_iva") {
    		precioFinal = precioInicial;
    	}

    	htmlMostrarResultado += "<p>Precio final: " + precioFinal.toFixed(2) + "</p>";

    	/* Calcular en caso de dividir el precio, para precio por unidad*/
    	if (radioDividir.value == "dividir_resultado") {
    		precioFinal = precioFinal / parseInt(campoInputDividir.value);
    		htmlMostrarResultado += "<p>Precio final por unidad: " + precioFinal.toFixed(2) + "</p>";
    	}

    	/* Mostrar el precio sugerido de venta, de acuerdo al margen de ganancia indicado.*/
    	precioCalculado = precioFinal + ((valorMargenGananciaPorcentaje / 100) * precioFinal);
    	htmlMostrarResultado += "<p>Precio de venta: " + precioCalculado.toFixed(2) + "</p>";

    	divMostrarResultado = document.getElementById("mostrar-resultado");
    	divMostrarResultado.innerHTML = htmlMostrarResultado;
    });
</script>