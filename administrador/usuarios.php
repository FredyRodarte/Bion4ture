<?php require_once "vistas/page_top.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1><i class="fa-solid fa-user-secret"></i> Usuarios</h1>

    <?php
        include_once "bd/conexion.php";
        $sql="SELECT * FROM usuarios";
        $usuarios= $pdo->query($sql);
    ?>

<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo usuario</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido paterno</th>                                
                                <th>Apellido materno</th>
                                <th>Fecha de nacimiento</th>
                                <th>NSS</th>
                                <th>Usuario</th>
                                <th>Contraseña</th>
                                <th>Tipo de usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($usuarios as $usuario) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $usuario['id_usuario'] ?></td>
                                <td><?php echo $usuario['nombre_usuario'] ?></td>
                                <td><?php echo $usuario['apell1_usuario'] ?></td>
                                <td><?php echo $usuario['apell2_usuario'] ?></td>
                                <td><?php echo $usuario['fecha_nacimiento'] ?></td>
                                <td><?php echo $usuario['nss_usuario'] ?></td>
                                <td><?php echo $usuario['nick_name'] ?></td>
                                <td><?php echo $usuario['contraseña'] ?></td>
                                <td><?php echo $usuario['tipo_usuario'] ?></td>   
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
        <form id="formPersonas">    
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre">
                </div>
                <div class="form-group">
                    <label for="apPat" class="col-form-label">Apellido Paterno:</label>
                    <input type="text" class="form-control" id="apPat">
                </div>                
                <div class="form-group">
                    <label for="apMat" class="col-form-label">Apellido Materno:</label>
                    <input type="text" class="form-control" id="apMat">
                </div>
                <div class="form-group">
                    <label for="nacimiento" class="col-form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="nacimiento">
                </div>
                <div class="form-group">
                    <label for="nss" class="col-form-label">Apellido Materno:</label>
                    <input type="text" class="form-control" id="nss">
                </div>
                <div class="form-group">
                    <label for="usuario" class="col-form-label">Usuario:</label>
                    <input type="text" class="form-control" id="usuario">
                </div>
                <div class="form-group">
                    <label for="contraseña" class="col-form-label">Contraseña:</label>
                    <input type="text" class="form-control" id="contraseña">
                </div>
                <div class="form-group">
                    <label for="tipo" class="col-form-label">Tipo de usuario:</label>
                    <select name="tipo" class="form-control" id="tipo" require>
                        <option selected value="">Selecciona un valor</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Usuario">Usuario</option>
                    </select>
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
<?php require_once "vistas/page_down.php"?>