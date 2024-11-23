<?php
	require_once("core/controller/categorias-controller.php");
?>

<div class="row">
	<div class="col-12 col-md-8">
		<h2 class="mb-3"><i class="bi bi-tags-fill"></i> Categorías</h2>	
	</div>

	<div class="col-12 col-md-4">
		<a class="btn btn-primary btn-sm" href="./?view=categoria" role="button"><i class="bi bi-plus-circle"></i> Añadir categoría</a>
	</div>
</div>

<div class="row">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col"><i class="bi bi-tags-fill"></i> Categoría</th>
					<th scope="col"><i class="bi bi-tools"></i> Operaciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($return_get_categorias as $key) {
				?>
						<tr>
							<td><?php echo $key['categoria_nombre'];?></td>
							<td><a class="btn btn-primary btn-sm" href="./?view=categoria&id=<?php echo $key['id_categoria'];?>">Editar</a></td>
						</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>