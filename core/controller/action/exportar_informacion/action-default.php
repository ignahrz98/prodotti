<?php
	require_once("core/model/tabla-productos.php");
	require_once("core/model/tabla-creditos.php");

	$model_tabla_productos = new TablaProductos();
	$model_tabla_creditos = new TablaCreditos();
	$return_get_productos = $model_tabla_productos->get_productos();
	$return_get_creditos = $model_tabla_creditos->get_creditos();

	# Cargar en buffer.
	ob_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--<title>Gestión de emprendimiento</title>-->
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
	<style type="text/css">
		.table {
			width: 100%;
		}

		.table-bordered,
		.table-bordered th,
		.table-bordered td{
			border: solid 1px;
		}

		.border-dark {
			border-color: black;
		}

		.text-center {
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 class="text-center">Datos exportados</h1>

		<h2>Inventario</h2>

		<table class="table table-bordered  border-dark">
			<thead>
				<tr>
					<th scope="col">Código</th>
					<th scope="col">Nombre</th>
					<th scope="col">Precio</th>
					<th scope="col">Cantidad</th>
					<th scope="col">Disponible</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($return_get_productos as $key) {
				?>
						<tr>
							<td class="col"><?php echo $key['producto_codigo'];?></td>
							<td class="col "><span class="fw-bold"><?php echo $key['producto_nombre'];?></span></td>
							<td class="col">
								<span class="badge rounded-pill bg-secondary">
									<?php echo $key['producto_precio'];?>
								</span>
							</td>
							<td class="col">
								<?php
									if($key['producto_cantidad'] < 0) {
									 	$estilo_fuente = "text-danger";
									} else if($key['producto_cantidad'] > 0) {
										$estilo_fuente = "text-success";
									} else {
										$estilo_fuente = "text-secondary";
									}
								?>
								<p class="<?php echo $estilo_fuente;?>"><?php echo $key['producto_cantidad'];?></p>
							</td>
							<td class="col">
								<?php
									if ($key['producto_disponibilidad'] == "1") {
								?>
										<span class="badge rounded-pill bg-success">Si</span>
								<?php		
									} else if ($key['producto_disponibilidad'] == "0") {
								?>
										<span class="badge rounded-pill bg-danger">No</span>
								<?php
									}
								?>
							</td>
						</tr>
				<?php
					}
				?>
			</tbody>
		</table>

		<h2>Créditos</h2>

		<table class="table table-bordered  border-dark">
			<thead>
				<tr>
					<th scope="col">Nombre</th>
					<th scope="col">Saldo</th>
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
									<?php echo $key['credito_saldo'];?>
								</span>
							</td>
						</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>

<?php
	require_once 'res/plugins/dompdf/autoload.inc.php';
	use Dompdf\Dompdf;
	$dompdf = new DOMPDF();
	$dompdf->load_html(ob_get_clean());
	$dompdf->render();
	$pdf = $dompdf->output();
	$filename = "data-prodotti.pdf";
	file_put_contents($filename, $pdf);
	$dompdf->stream($filename);
?>