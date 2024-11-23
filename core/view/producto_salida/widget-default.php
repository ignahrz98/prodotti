<?php
	require_once("core/controller/producto-salida-controller.php");
?>

<div class="row">
	<div class="col-md-4 offset-md-4 custom-box">
		<h2 class="text-center mb-3">Salida de producto</h2>
		<p><?php echo $value_producto_nombre;?></p>

		<form action="./?action=formulario_producto_salida" method="post">
			<div class="mb-3">
				<label class="form-label" for="input-producto-salida-cantidad"><i class="bi bi-box2-fill"></i> Cantidad de salida</label>
				<div class="input-group">
					<span class="input-group-text">#</span>
					<input class="form-control" type="number" name="input-producto-salida-cantidad" id="input-producto-salida-cantidad" step="0.01" min="0.01" value="0" placeholder="Ingrese cantidad" required>
				</div>
			</div>

			<input type="hidden" name="id_producto" value="<?php echo $value_producto_id;?>">
			<div class="text-center mb-3">
				<button type="submit" class="btn btn-primary"><i class="bi bi-floppy2-fill"></i> Guardar</button>
			</div>
		</form>
	</div>
</div>