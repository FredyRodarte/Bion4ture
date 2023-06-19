<?php
    include_once "conexion.php";

    //recepcion de datps enviados mediante POST desde el JS

    $sku = (isset($_POST['sku'])) ? $_POST['sku'] : '';
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
    $cantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad'] : '';
    $precio = (isset($_POST['precio'])) ? $_POST['precio'] : '';
    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $id = (isset($_POST['id'])) ? $_POST['id'] : '';

    switch($opcion){
        case 1: //Alta usuario
            $consulta = "INSERT INTO productos (sku_producto,nombre_producto,desc_producto,cant_producto,precio_producto)
            VALUES('$sku','$nombre','$descripcion','$cantidad','$precio')";
            $resultado = $pdo->query($consulta);
            
            $consulta = "SELECT id_producto,sku_producto,nombre_producto,desc_producto,cant_producto,precio_producto FROM productos 
            ORDER BY id_producto DESC LIMIT 1";
            $resultado = $pdo->query($consulta);
            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 2: //Modificar usuario
            $consulta = "UPDATE productos SET sku_producto='$sku', nombre_producto='$nombre', desc_producto='$descripcion', cant_producto='$cantidad', precio_producto='$precio'
            WHERE id_producto='$id'";
            $resultado = $pdo->query($consulta);

            $consulta = "SELECT id_producto,sku_producto,nombre_producto,desc_producto,cant_producto,precio_producto FROM productos
            WHERE id_producto ='$id'";
            $resultado = $pdo->query($consulta);
            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 3:
            $consulta = "DELETE FROM productos WHERE id_producto='$id'";
            $resultado = $pdo->query($consulta);
            break;

    }

    print json_encode($data, JSON_UNESCAPED_UNICODE);
?>