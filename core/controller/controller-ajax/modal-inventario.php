<?php
    require_once("../database.php");
    require_once("../database-controller.php");
    require_once("../../model/tabla-productos.php");
  
    $model_tabla_productos = new TablaProductos();
  
    $id_producto_modal = $_POST['id_producto'];
    $return_get_producto = $model_tabla_productos->get_producto_por_id((int)$id_producto_modal);

    foreach ($return_get_producto as $key) {
        $value_producto_codigo = $key['producto_codigo'];
        $value_producto_nombre = $key['producto_nombre'];
        $value_producto_precio = $key['producto_precio'];
        $value_producto_categoria = $key['categoria_nombre'];
        $value_producto_cantidad = $key['producto_cantidad'];
        $value_producto_unidad_venta = $key['producto_unidad_venta'];
        $value_producto_disponibilidad = $key['producto_disponibilidad'];
        $value_producto_imagen = $key['producto_imagen'];
        $value_producto_observaciones = $key['producto_observaciones'];
    }
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $value_producto_nombre;?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Código</th>
                            <td><?php echo $value_producto_codigo;?></td>
                        </tr>
                        <tr>
                            <th scope="row">Precio</th>
                            <td><?php echo $value_producto_precio;?></td>
                        </tr>
                        <tr>
                            <th scope="row">Categoría</th>
                            <td><?php echo $value_producto_categoria;?></td>
                        </tr>
                         <tr>
                            <th scope="row">Cantidad</th>
                            <td>
                                <?php
                                    if($value_producto_cantidad < 0) {
                                        $estilo_fuente = "text-danger";
                                    } else if($value_producto_cantidad > 0) {
                                        $estilo_fuente = "text-success";
                                    } else {
                                        $estilo_fuente = "text-secondary";
                                    }

                                    # Casting segun sea necesario
                                    if ($value_producto_unidad_venta == "unidades") {
                                        $value_mostrar_cantidad = (int)$value_producto_cantidad;
                                        $value_mostrar_cantidad .= " unidades";
                                    } else if ($value_producto_unidad_venta == "no_contable") {
                                        $value_mostrar_cantidad = "n/a";
                                    } else if ($value_producto_unidad_venta == "litros") {
                                        $value_mostrar_cantidad = $value_producto_cantidad;
                                        $value_mostrar_cantidad .= " litros";
                                    }
                                ?>
                                <p class="<?php echo $estilo_fuente;?>"><?php echo $value_mostrar_cantidad;?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Disponibilidad</th>
                            <td class="col">
                                <?php
                                    if ($value_producto_disponibilidad == "1") {
                                ?>
                                        <span class="badge rounded-pill bg-success"><i class="bi bi-check-circle-fill"></i> Disponible</span>
                                <?php       
                                    } else if ($value_producto_disponibilidad == "0") {
                                ?>
                                        <span class="badge rounded-pill bg-danger"><i class="bi bi-x-circle-fill"></i> Agotado</span>
                                <?php
                                    } else if ($value_producto_disponibilidad == "2") {
                                ?>
                                        <span class="badge rounded-pill bg-secondary"><i class="bi bi-x-circle-fill"></i> Retirado</span>
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Imagen del producto</th>
                            <td class="col">
                                <?php
                                    if ($value_producto_imagen == "") {
                                ?>
                                        <p>El producto no tiene una imagen.</p>
                                <?php                              
                                    } else {
                                ?>
                                        <img id="preview" class="img-fluid img-thumbnail img-min-100" src="subidas/producto/<?php echo $value_producto_imagen;?>" alt="Imagen del producto">
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Observaciones</th>
                            <td class="col"><?php echo $value_producto_observaciones;?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" href="./?view=producto_entrada&id=<?php echo $id_producto_modal;?>"><i class="bi bi-box-arrow-in-down"></i> Entrada</a>
                <a class="btn btn-primary" href="./?view=producto_salida&id=<?php echo $id_producto_modal;?>"><i class="bi bi-box-arrow-up"></i> Salida</a>
                <a class="btn btn-secondary" href="./?view=producto&id=<?php echo $id_producto_modal;?>"><i class="bi bi-pencil-fill"></i> Editar</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
        keyboard: false
    })


    //var modalToggle = document.getElementById('exampleModal'); // relatedTarget
    //myModal.show(modalToggle);

    myModal.show();
</script>