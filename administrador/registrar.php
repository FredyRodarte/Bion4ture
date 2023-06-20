<?php require_once "vistas/page_top.php"?>
<!--INICIO del cont principal-->
<div class="container">
    <h1><img src='vendor/img/logo.png' alt=''>BioN4ture</h1>
    <!-- contenido principal    INICIO   -->
<div id="botonera"> 
    <div class="container text-center"> 
        <?php
            include_once "bd/conexion.php";
            $consulta = "SELECT id_producto,nombre_producto,precio_producto,imagen_producto FROM productos";
            $productos = $pdo->query($consulta);
        ?>
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <?php foreach($productos as $producto){?>
            <div class="col">
                <div class="p-3" onclick="agregarProducto(<?php echo $producto['id_producto']?>, '<?php echo $producto['nombre_producto']?>', <?php echo $producto['precio_producto']?>)">
                    <img src="<?php echo $producto['imagen_producto']?>" alt="" style="width:150px;height:150px;">
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>   
<!-- contenido principal FIN -->

    <h2>Carrito de compras</h2>
            <table id="carrito">
            <thead>
                <tr>
                <th>Producto</th>
                <th>Precio unitario</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
            <p>Total: $<span id="total">0.00</span></p>
            <button onclick="pagar()">Pagar</button>

<!--FIN del cont principal-->


<?php require_once "vistas/page_down_registro.php"?>
