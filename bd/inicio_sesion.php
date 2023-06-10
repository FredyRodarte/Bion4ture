<?php
    if (!isset($_POST['usuario']) || !isset($_POST['pass'])) 
	{
		header('location: ../index.php?error=1');
	}

    $user = $_POST['usuario'];
    $pasword = $_POST['pass'];
    $entra = false;

    include("conexion.php");

    $sql="select * from usuarios";
    $usuarios= $pdo->query($sql);

    foreach($usuarios as $usuario){
        echo $usuario["id_usuario"];
        echo $usuario["nombre_usuario"];
        echo $usuario["nick_name"];
        echo $usuario["contraseña"];
        echo $usuario["tipo_usuario"];

        if ($user == $usuario["nick_name"] && $pasword == $usuario["contraseña"]) {
            
            if ($usuario["tipo_usuario"] == "Administrador") {
                header("location: ../administrador/inicio.php");
                $entra = true;
            }else{
                if ($usuario["tipo_usuario"] == "Usuario") {
                    $entra = true;
                }
            }
        }  
    }
    
    if(!$entra){
        header('location: ../index.php?error=2');
    }
?>