<?php
    include_once "conexion.php";

    //recepcion de datps enviados mediante POST desde el JS

    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $paterno = (isset($_POST['paterno'])) ? $_POST['paterno'] : '';
    $materno = (isset($_POST['materno'])) ? $_POST['materno'] : '';
    $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
    $seguro = (isset($_POST['seguro'])) ? $_POST['seguro'] : '';
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    $pass = (isset($_POST['pass'])) ? $_POST['pass'] : '';
    $userTipo = (isset($_POST['userTipo'])) ? $_POST['userTipo'] : '';
    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $id = (isset($_POST['id'])) ? $_POST['id'] : '';

    switch($opcion){
        case 1: //Alta usuario
            $consulta = "INSERT INTO usuarios (nombre_usuario, apell1_usuario, apell2_usuario, fecha_nacimiento, nss_usuario, nick_name, contraseña, tipo_usuario)
            VALUES('$nombre', '$paterno', '$materno', '$fecha', '$seguro', '$usuario', '$pass', '$userTipo')";
            $resultado = $pdo->query($consulta);
            
            $consulta = "SELECT id_usuario, nombre_usuario, apell1_usuario, apell2_usuario, fecha_nacimiento, nss_usuario, nick_name, contraseña, tipo_usuario FROM usuarios 
            ORDER BY id_usuario DESC LIMIT 1";
            $resultado = $pdo->query($consulta);
            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 2: //Modificar usuario
            $consulta = "UPDATE usuarios SET nombre_usuario='$nombre', apell1_usuario='$paterno', apell2_usuario='$materno', fecha_nacimiento='$fecha', nss_usuario='$seguro',
            nick_name='$usuario', contraseña='$pass', tipo_usuario='$userTipo'WHERE id_usuario='$id'";
            $resultado = $pdo->query($consulta);

            $consulta = "SELECT id_usuario, nombre_usuario, apell1_usuario, apell2_usuario, fecha_nacimiento, nss_usuario, nick_name, contraseña, tipo_usuario FROM usuarios 
            WHERE id_usuario='$id'";
            $resultado = $pdo->query($consulta);
            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 3:
            $consulta = "DELETE FROM usuarios WHERE id_usuario='$id'";
            $resultado = $pdo->query($consulta);
            break;

    }

    print json_encode($data, JSON_UNESCAPED_UNICODE);
?>