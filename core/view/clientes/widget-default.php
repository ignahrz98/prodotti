<?php
	require_once("core/controller/clientes-controller.php");
?>

<div class="row">
	<div class="col-md-12">
		<h2><i class="bi bi-people-fill"></i> Clientes</h2>	
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<form action="./?view=clientes" method="post">
			<div class="input-group mb-3">
				<input class="form-control" type="text" name="input-buscar-cliente" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $value_input_buscar_cliente;?>" placeholder="Buscar cliente">
				<button type="submit" class="btn btn-primary">Buscar</button>
			</div>
		</form>
	</div>

	<div class="col-md-4">
		<a class="btn btn-primary btn-sm" href="./?view=cliente" role="button"><i class="bi bi-plus-circle"></i> Añadir cliente</a>
	</div>
</div>

<div class="row">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Nombre</th>
					<th scope="col">Operaciones</th>
				</tr>	
			</thead>
			<tbody>
				<?php
					foreach ($return_get_clientes as $key) {
				?>
						<tr>
							<td><?php echo $key['cliente_nombre'];?></td>
							<td>
							<a class="btn btn-secondary btn-sm btn-opciones-tabla" href="./?view=cliente&id=<?php echo $key['id_cliente'];?>"><i class="bi bi-pencil-fill"></i> Editar</a>
							</td>
						</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>