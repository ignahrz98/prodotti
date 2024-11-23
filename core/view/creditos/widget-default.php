<?php
	require_once("core/controller/creditos-controller.php");
?>

<div class="row">
	<div class="col-md-12">
		<h2><i class="bi bi-wallet-fill"></i> Créditos</h2>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<form action="./?view=creditos" method="post">
			<div class="input-group mb-3">
				<input class="form-control" type="text" name="input-buscar-credito" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $value_input_buscar_credito;?>" placeholder="Buscar crédito">
				<button type="submit" class="btn btn-primary">Buscar</button>
			</div>
		</form>
	</div>

	<!--
	<div class="col-md-4">
		<a class="btn btn-primary btn-sm" href="./?view=credito" role="button"><i class="bi bi-plus-circle"></i> Añadir crédito</a>
	</div>
	-->
</div>

<div class="row">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Nombre</th>
					<th scope="col">Saldo</th>
					<th scope="col">Operaciones</th>
				</tr>	
			</thead>
			<tbody>
				<?php
					foreach ($return_get_creditos as $key) {
				?>
						<tr>
							<td><?php echo $key['cliente_nombre'];?></td>
							<td>
								<span class="badge rounded-pill bg-secondary">
									<?php echo $key['credito_saldo'];?></td>
								</span>
							<td>
								<a class="btn btn-primary btn-sm btn-opciones-tabla" href="./?view=credito_ver&id=<?php echo $key['id_credito'];?>")><i class="bi bi-eye-fill"></i> Ver crédito</a>
							</td>
						</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>