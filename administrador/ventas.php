<?php require_once "vistas/page_top.php"?>

<!--INICIO del cont principal-->
<div class="container p-3 my-3 border">
    
    <?php
      include_once "bd/conexion.php";

      $folio = (isset($_POST['folio'])) ? $_POST['folio'] : '';
      $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';

      $data;
      $total;
  
      if(!empty($folio) and !empty($fecha)){
          header('location: ../ventas.php?error=1');
      }else{
          if(empty($fecha) and !empty($folio)){
              $consulta = "SELECT folio_venta,nombreP_venta, cantidad_venta, precio_venta, subtotal_venta, fecha_venta FROM ventas WHERE folio_venta='$folio'";
              $resultado = $pdo -> query($consulta);
              $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
              $total = 0;
              //print_r($data);
          }

          if(!empty($fecha) and empty($folio)){
              $consulta = "SELECT folio_venta,nombreP_venta, cantidad_venta, precio_venta, subtotal_venta, fecha_venta FROM ventas WHERE fecha_venta='$fecha'";
              $resultado = $pdo -> query($consulta);
              $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
              $total = 0;
          }
      }
    ?>



  <h2>Registro de Ventas</h2>

  <form class="form-inline" action="ventas.php" method="post">
    <label for="folio" class="mb-2 mr-sm-2">Folio de Venta:</label>
    <input type="text" class="form-control mb-2 mr-sm-5" id="folio" name="folio">
    <label for="pwd2" class="mb-2 mr-sm-2">Fecha de Venta:</label>
    <input type="date" class="form-control mb-2 mr-sm-5" id="fecha" name="fecha">
    <div class="form-check mb-2 mr-sm-2">
      
    </div>    
    <button type="submit" class="btn btn-primary mb-2"">Consultar</button>
  </form>
</div>
<div class="container p-3 my-3 border">
  

  <!-- ... Resto del código del formulario ... -->

  <!-- Agrega la tabla aquí -->
  <table class="table">
    <thead>
      <tr>
        <th style="text-align:center">Foilio</th>
        <th style="text-align:center">Nombre</th>
        <th style="text-align:center">Cantidad</th>
        <th style="text-align:center">Precio</th>
        <th style="text-align:center">Subtotal</th>
        <th style="text-align:center">Fecha</th>
        <!-- Agrega más encabezados de columna según tus necesidades -->
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($data)){foreach($data as $registro) {
      ?>
        <tr>
          <td style="text-align:center"><?php echo $registro['folio_venta'];?></td>
          <td style="text-align:center"><?php echo $registro['nombreP_venta'];?></td>
          <td style="text-align:center"><?php echo $registro['cantidad_venta'];?></td>
          <td style="text-align:center"><?php echo $registro['precio_venta'];?></td>
          <td style="text-align:center"><?php echo $registro['subtotal_venta'];?></td>
          <td style="text-align:center"><?php echo $registro['fecha_venta'];?></td>
        </tr>
      <?php $total = $total+ $registro['subtotal_venta'];}}
      ?>
    </tbody>
  </table>



</div>
<form>
  <fieldset disabled>
    
    <div class="container mb-3">
      <h4>
        Total Ventas: 
      </h4>
      <input type="text" id="disabledTextInput" class="form-control" style="padding:40px;" placeholder="Aqui va el contenido de la tabla">
      <p><?php if(!empty($total)){ echo $total;}?></p>
    </div>
  </fieldset>
</form>



    
    

<!--FIN del cont principal-->
<?php require_once "vistas/page_down_reporte.php"?>