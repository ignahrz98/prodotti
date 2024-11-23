<?php
	require_once("core/controller/credito-operaciones-controller.php");
?>

<div class="row">
	<div class="col-md-4 offset-md-4 custom-box">
		<h2 class="text-center mb-3">Crédito operaciones</h2>
		<p>Se modificará el crédito de <span><?php echo $cliente_nombre?></span>, quien posee un saldo de <span><?php echo $credito_saldo?></span>.</p>

		<form action="./?action=formulario_credito_operaciones" method="post">
			<div class="mb-3">
				<label class="form-label" for="select-credito-operaciones"><i class="bi bi-gear-wide"></i> Operación</label>
				<select class="form-control" name="select-credito-operaciones" id="select-credito-operaciones">
					<option value="sumar_saldo">Sumar al crédito</option>
					<option value="restar_saldo">Restar al crédito</option>
					<option value="modificar_saldo">Modificar el saldo manualmente</option>
				</select>
			</div>

			<div class="mb-3">
				<label class="form-label" for="input-monto-operaciones"><i class="bi bi-cash"></i> Monto de la operacion</label>
				<input class="form-control" type="number" name="input-monto-operaciones" id="input-monto-operaciones" step="0.01" min="0.01" value="0" placeholder="Ingrese cantidad" required>
			</div>

			<input type="hidden" name="id_credito" value="<?php echo $_GET['id'];?>">
			<div class="text-center mb-3">
				<button type="submit" class="btn btn-primary"><i class="bi bi-floppy2-fill"></i> Guardar</button>
			</div>
		</form>
	</div>
</div>