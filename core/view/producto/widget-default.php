<?php
	require_once("core/controller/producto-controller.php");
?>

<div class="col-12 custom-box">
	<nav aria-label="breadcrumb" class="nav-breadcrumb">
  		<ol class="breadcrumb">
    		<li class="breadcrumb-item"><a href="./?view=inventario">Inventario</a></li>
    		<li class="breadcrumb-item active" aria-current="page">Producto</li>
  		</ol>
	</nav>
	<h2 class="text-center mb-3"><i class="bi bi-list-ul"></i> Producto</h2>
	<?php
		if (isset($_GET['id'])) {
	?>
			<div class="btn-group mb-3" role="group">
		  		<a href="./?view=producto_entrada&id=<?php echo $_GET['id'];?>" class="btn btn-outline-primary">Entrada</a>
				<a href="./?view=producto_salida&id=<?php echo $_GET['id'];?>" class="btn btn-outline-success">Salida</a>
			</div>
	<?php
		}
	?>

	<?php
		if (isset($_GET['nuevo_producto_ananido_exitosamente'])) {
	?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			 	El <strong>nuevo producto</strong> ha sido añadido exitosamente.
			  	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php
		}

		if (isset($_GET['actualizacion_exitosa'])) {
	?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			 	El <strong>producto</strong> ha sido actualizado exitosamente.
			  	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php
		}
	?>
	<form action="./?action=formulario_producto" method="post" enctype="multipart/form-data">
		<h3>Información básica del producto</h3>
		<div class="row">
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label" for="input-codigo"><i class="bi bi-upc"></i> Código</label>
					<input class="form-control" type="text" name="input-codigo" id="input-codigo" maxlength="20" placeholder="Ingrese código" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $value_input_codigo;?>" required>
				</div>	
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label" for="input-nombre-producto"><i class="bi bi-list-ul"></i> Nombre del producto</label>
					<input class="form-control" type="text" name="input-nombre-producto" id="input-nombre-producto" maxlength="100" placeholder="Ingrese nombre del producto" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $value_input_nombre_producto;?>" required>
				</div>				
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="mb-3">
					<label class="form-label" for="input-precio-producto"><i class="bi bi-cash-stack"></i> Precio</label>
					<input type="number" class="form-control" name="input-precio-producto" id="input-precio-producto" placeholder="Ingrese precio" step="0.01" min="0" value="<?php echo $value_input_precio_producto;?>" required>
				</div>	
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label class="form-label" for="select-disponible-producto"><i class="bi bi-clipboard2"></i> Disponibilidad</label>
					<select class="form-control" name="select-disponible-producto" id="select-disponible-producto">
						<option value="1" <?php if($value_select_disponible_producto == 1){echo "selected";}?>>Producto disponible</option>
						<option value="0" <?php if($value_select_disponible_producto == 0){echo "selected";}?>>Producto agotado</option>
						<option value="2" <?php if($value_select_disponible_producto == 2){echo "selected";}?>>Producto retirado</option>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label class="form-label" for="select-categoria-producto"><i class="bi bi-tag-fill"></i> Categoría</label>
					<select class="form-control" name="select-categoria-producto" id="select-categoria-producto">
						<?php
							foreach ($return_get_categorias as $key) {
						?>
								<option value="<?php echo $key['id_categoria'];?>" <?php verificar_selected($value_select_categoria,$key['id_categoria']);?>><?php echo $key['categoria_nombre'];?></option>
						<?php
							}
						?>
					</select>
				</div>
			</div>
		</div>

		<h3>Unidades del producto</h3>
		<div class="row">
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label" for="select-unidad-de-venta"><i class="bi bi-box-fill"></i> Unidad de venta</label>
					<select class="form-control" name="select-unidad-de-venta" id="select-unidad-de-venta">
						<option value="no_contable" <?php verificar_selected("no_contable",$value_select_producto_unidad_venta);?>>No contable</option>
						<option value="unidades" <?php verificar_selected("unidades",$value_select_producto_unidad_venta);?>>Unidades</option>
						<option value="litros" <?php verificar_selected("litros",$value_select_producto_unidad_venta);?>>Litros</option>
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3" style="display: <?php echo $display;?>;" id="div-input-cantidad">
					<label class="form-label" for="input-cantidad-producto"><i class="bi bi-box2-fill"></i> Cantidad</label>
					<input class="form-control" type="number" name="input-cantidad-producto" id="input-cantidad-producto" placeholder="Ejemplo: 10" value="<?php echo $value_input_cantidad_producto;?>" step="0.001" required>
				</div>	
			</div>
		</div>

		<h3>Información adicional</h3>
		<div class="row">
			<div class="col-md-4">
				<div class="mb-3">
					<label class="form-label" for="boton-cargar-imagen"><i class="bi bi-image-fill"></i> Imagen del producto</label><br>
					<button type="button" class="btn btn-outline-dark" id="boton-cargar-imagen"><i class="bi bi-upload"></i> Cargar imagen</button>
					<input type="file" id="input-producto-imagen" name="input-producto-imagen" accept="image/*" onchange="previewImage(event)" style="display:none;">
				</div>
			</div>
			<div class="col-md-4">
				<img id="preview" class="img-thumbnail" src="<?php echo $value_producto_imagen;?>" alt="Vista previa de la imagen"><br>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label class="form-label" for="textarea-observacion-producto"><i class="bi bi-pencil-square"></i> Observaciones</label>
					<textarea class="form-control" name="textarea-observacion-producto" id="textarea-observacion-producto" rows="3" maxlength="250" placeholder="Ingrese alguna observación"><?php echo $value_textarea_observacion_producto;?></textarea>
				</div>
			</div>
		</div>

		<input type="hidden" name="formulario_operacion" value="<?php echo $formulario_operacion;?>">

		<?php
			if (isset($_GET['id'])) {
		?>
				<input type="hidden" name="id_producto" value="<?php echo $value_id_producto;?>">
		<?php
			}
		?>

		<div class="text-center mb-3">
			<button type="submit" class="btn btn-primary"><i class="bi bi-floppy2-fill"></i> Guardar</button>
		</div>
	</form>
</div>

<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {
	    const selectElement = document.getElementById('select-unidad-de-venta');
	    const inputExtra = document.getElementById('div-input-cantidad');

	    selectElement.addEventListener('change', function() {
	        if (selectElement.value != 'no_contable') {
	            inputExtra.style.display = 'block'; // Muestra el input
	        } else {
	            inputExtra.style.display = 'none'; // Oculta el input
	        }
	    });
	});

	function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];
        const reader = new FileReader();


        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            preview.src = '';
            preview.style.display = 'none';
        }

    }

    document.getElementById("boton-cargar-imagen").addEventListener('click', function() {
	    document.getElementById("input-producto-imagen").click();
	});
</script>