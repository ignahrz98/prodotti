<?php
	require_once("core/controller/credito-controller.php");
?>

<div class="row px-3">
	<div class="col-md-4 offset-md-4 custom-box">
		<div class="row">
			<div class="col-12 mb-3">
				<nav aria-label="breadcrumb" class="nav-breadcrumb">
			  		<ol class="breadcrumb">
			    		<li class="breadcrumb-item"><a href="./?view=creditos">Créditos</a></li>
			    		<li class="breadcrumb-item active" aria-current="page">Crédito</li>
			  		</ol>
				</nav>
				<h2 class="text-center mb-3"><i class="bi bi-wallet-fill"></i> Crédito</h2>
				<?php
					if (isset($_GET['nuevo_credito_ananido_exitosamente'])) {
				?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
						 	El <strong>nuevo crédito</strong> ha sido añadido exitosamente.
						  	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php
					}

					if (isset($_GET['actualizacion_exitosa'])) {
				?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
						 	El <strong>crédito</strong> ha sido actualizado exitosamente.
						  	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php
					}
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<form action="./?action=formulario_credito" method="post">
					<div class="mb-3">
						<label class="form-label" for="input-nombre-credito"><i class="bi bi-journal-text"></i> Nombre del crédito</label>
						<input class="form-control" type="text" name="input-nombre-credito" id="input-nombre-credito" maxlength="50" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $value_input_nombre_credito;?>" placeholder="Ingrese nombre de crédito" required>
					</div>
					
					<input type="hidden" name="formulario_operacion" value="<?php echo $formulario_operacion;?>">
					<?php
						if (isset($_GET['id'])) {
					?>
							<input type="hidden" name="id_credito" value="<?php echo $value_id_credito;?>">
					<?php
						}
					?>
					<div class="text-center mb-3">
						<button type="submit" class="btn btn-primary"><i class="bi bi-floppy2-fill"></i> Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>