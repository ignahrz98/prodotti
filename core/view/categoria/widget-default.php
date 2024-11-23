<?php
	require_once("core/controller/categoria-controller.php");
?>

<div class="row">
	<div class="col-md-4 offset-md-4 custom-box">
		<nav aria-label="breadcrumb" class="nav-breadcrumb">
	  		<ol class="breadcrumb">
	    		<li class="breadcrumb-item"><a href="./?view=categorias">Categorías</a></li>
	    		<li class="breadcrumb-item active" aria-current="page">Categoria</li>
	  		</ol>
		</nav>
		<h2 class="text-center mb-3"><i class="bi bi-tags-fill"></i> Categoría</h2>
		<?php
			if (isset($_GET['nueva_categoria_ananida_exitosamente'])) {
		?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				 	La <strong>nueva categoría</strong> ha sido añadida exitosamente.
				  	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php
			}

			if (isset($_GET['actualizacion_exitosa'])) {
		?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				 	La <strong>categoría</strong> ha sido actualizada exitosamente.
				  	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		<?php
			}
		?>
		<form action="./?action=formulario_categoria" method="post">
			<div class="mb-3">
				<label class="form-label" for="input-nombre-categoria"><i class="bi bi-tag-fill"></i> Nombre de la categoría</label>
				<input class="form-control" type="text" name="input-nombre-categoria" id="input-nombre-categoria" maxlength="100" placeholder="Ingrese nombre de la categoría" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $value_categoria_nombre;?>" required>
			</div>
			<?php
				if (isset($_GET['id'])) {
			?>
					<input type="hidden" name="value_id_categoria" value="<?php echo $_GET['id'];?>">
			<?php
				}
			?>
			<input type="hidden" name="formulario_operacion" value="<?php echo $formulario_operacion;?>">
			<div class="text-center mb-3">
				<button type="submit" class="btn btn-primary"><i class="bi bi-floppy2-fill"></i> Guardar</button>
			</div>
		</form>
	</div>
</div>