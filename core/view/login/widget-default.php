<?php
	require_once("core/controller/login-controller.php");
?>

<div class="row px-3">
	<div class="col-md-4 offset-md-4 custom-box">
		<h2 class="text-center mb-3"><i class="bi bi-box-arrow-in-right"></i> Iniciar sesión</h2>
		<form action="./?action=login" method="post">
			<div class="mb-3">
				<label for="input-usuario" class="form-label"><i class="bi bi-person-fill"></i> Usuario</label>
				<input class="form-control" type="text" name="input-usuario" id="input-usuario" maxlength="20" placeholder="Ingrese usuario" value="<?php echo $username_ingresado;?>" required>
				<?php
					if (isset($_GET['username_no_registrado'])) {
				?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 	El <strong>usuario</strong> ingresado no existe.
						  	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php
					}
				?>
			</div>
			<div class="mb-3">
				<label for="input-contrasena" class="form-label"><i class="bi bi-key-fill"></i> Contraseña</label>
				<input class="form-control" type="password" name="input-contrasena" id="input-contrasena" maxlength="20" placeholder="Ingrese contraseña" required>
				<?php
					if (isset($_GET['password_incorrecto'])) {
				?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 	La <strong>contraseña</strong> ingresada es incorrecta.
						  	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
				<?php
					}
				?>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary"><i class="bi bi-box-arrow-in-right"></i> Iniciar sesión</button>
			</div>
		</form>
	</div>
</div>