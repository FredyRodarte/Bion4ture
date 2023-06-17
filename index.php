<?php
    if(isset($_GET['error'])){

        if ($_GET['error']==1){
            $mensaje="<p>Ingresa tu usuario y contraseña</p>";
        }

        if ($_GET['error']==2){
            $mensaje="<p>Usuario y/o Contraseña incorrectos.</p>";
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login - BioN4ture</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Icono de pagina -->
        <link rel="icon" href="vendor/img/hoja.ico">
        <!-- Bootstrap y CSS-->
        <link rel="stylesheet" href="vendor/css/indexStyle.css">
        <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row align-self-center">
                <div class="col-6" id="formulario">
                    <form action="bd/inicio_sesion.php" method="post">
                        <div id="titulo-form">
                            <img src="vendor/img/logo.png" alt="">
                            <h3>BioN4ture</h3>
                        </div>
                        <div id="datos-form">
                            <label for="usuario"><i class="fa-solid fa-user"></i> Usuario:</label>
                            <input type="text" name="usuario" class="form-control">
                            <label for="contraseña"><i class="fa-solid fa-key"></i> Constraseña:</label>
                            <input type="password" name="pass" class="form-control">

                        </div>
                        <div id="texto">
                            <?php
                                if(isset($mensaje))
                                {
                                  echo $mensaje;
                                }
                            ?>
                        </div>
                        <div id="botones">
                            <button type="submit" class="btn btn-light">Iniciar Sesion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Bootstrap y JQuery-->
        <script src="vendor/js/bootstrap.min.js"></script>
        <script src="vendor/js/jquery-3.6.4.min.js"></script>
        <!-- Iconos -->
        <script src="https://kit.fontawesome.com/e777ccecfb.js" crossorigin="anonymous"></script>
    </body>
</html>