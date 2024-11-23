<?php
    require_once("core/view/_BARRA_DE_MENU_/widget-default.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Prodotti</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="res/bootstrap-5.0.2-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="res/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" type="text/css" href="res/bootstrap-sidebar-main/style.css">
	<link rel="stylesheet" type="text/css" href="res/css/custom.css">
	<link rel="icon" href="res/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="res/img/favicon.ico" type="image/x-icon">
</head>
<body>
	<?php
        $barra_de_menu = new BarraDeMenu();

        if (isset($_SESSION['id_user_sesion_activa'])) {
            #$barra_de_menu->generar_barra_de_menu("menu_con_sesion");
    ?>
    		<div class="wrapper">
    			<?php
    				require_once("core/view/_SIDEBAR/widget-default.php");
    			?>
    			<div class="main">
		            <nav class="navbar navbar-expand px-3 border-bottom">
		                <!-- Button for sidebar toggle -->
		                <button class="btn btn-dark" type="button">
		                    <i class="bi bi-list"></i>
		                    Menú
		                </button>
		            </nav>
		            <main class="content px-3 py-2">
		                <div class="container-fluid">
		                    <div class="mb-3">
		                        <?php
									ViewController::add_view($vista_a_mostrar);
								?>
		                    </div>
		                </div>
		            </main>
		        </div>
    		</div>
    <?php
        } else {
            $barra_de_menu->generar_barra_de_menu("menu_sin_sesion");
    ?>
    		<div class="container">
				<?php
					ViewController::add_view($vista_a_mostrar);
				?>
			</div>
    <?php
        }
    ?>

	<script type="text/javascript" src="res/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="res/bootstrap-sidebar-main/script.js"></script>
	<script type="text/javascript" src="res/js/jquery.js"></script>
</body>
</html>