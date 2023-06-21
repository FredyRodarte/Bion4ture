<?php
    include_once "conexion.php";

    $datos = $_POST['datos'];

    if(empty($datos)){
        echo "El arreglo esta vacio";
    }else{
        echo "El arreglo no esta vacio";
    }

    foreach ($datos as $registro){
        
        $folio = $registro['folio'];
        $producto = $registro['nombre'];
        $precio = $registro['precio'];
        $cantidad = $registro['cantidad'];
        $subtotal = $registro['subtotal'];
        $fecha = $registro['fecha'];

        $consulta = "INSERT INTO ventas (folio_venta,nombreP_venta,cantidad_venta,precio_venta,subtotal_venta,fecha_venta) VALUES ('$folio','$producto','$cantidad','$precio','$subtotal','$fecha')";
        $resultado = $pdo->query($consulta);
    }

?>