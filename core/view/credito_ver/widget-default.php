<?php
	require_once("core/controller/credito-ver-controller.php");
?>

<div class="row">
	<div class="col-12">
		<h2>Crédito movimientos</h2>	
	</div>
</div>
<div class="row">
	<div class="col-12 col-md-6">
		<h4><?php echo $value_credito_nombre;?> <span class="badge bg-secondary"><?php echo $value_credito_saldo;?></span></h4>
	</div>

	<div class="col-12 col-md-6">
		<a class="btn btn-primary btn-sm" href="./?view=credito_operaciones&id=<?php echo $_GET['id'];?>" role="button"><i class="bi bi-credit-card-2-back-fill"></i> Operaciones</a>
	</div>
</div>