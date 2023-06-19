<?php require_once "vistas/page_top.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1><i class="fa-solid fa-bottle-water"></i> Productos</h1>

    <?php
        include_once "bd/conexion.php";
        $sql="SELECT * FROM productos";
        $productos = $pdo->query($sql);
    ?>

<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo producto</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaProductos" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Sku</th>
                                <th>Nombre</th>                                
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($productos as $producto) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $producto['id_producto'] ?></td>
                                <td><?php echo $producto['sku_producto'] ?></td>
                                <td><?php echo $producto['nombre_producto'] ?></td>
                                <td><?php echo $producto['desc_producto'] ?></td>
                                <td><?php echo $producto['cant_producto'] ?></td>
                                <td><?php echo $producto['precio_producto'] ?></td>  
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formProductos">    
            <div class="modal-body">
                <div class="form-group">
                    <label for="sku" class="col-form-label">SKU:</label>
                    <input type="text" class="form-control" id="sku">
                </div>
                <div class="form-group">
                    <label for="nombre" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre">
                </div>                
                <div class="form-group">
                    <label for="descripcion" class="col-form-label">Descripción:</label>
                    <!-- <input type="text" class="form-control" id="descripcion"> -->
                    <textarea class="form-control" id="descripcion" cols="4" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="cantidad" class="col-form-label">Cantidad:</label>
                    <input type="number" class="form-control" id="cantidad" min="1">
                </div>
                <div class="form-group">
                    <label for="precio" class="col-form-label">Precio:</label>
                    <input type="number" class="form-control" id="precio" min="1">
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/page_down_productos.php"?>