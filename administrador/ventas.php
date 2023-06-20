<?php require_once "vistas/page_top.php"?>

<!--INICIO del cont principal-->
<div class="container p-3 my-3 border">
    




  <h2>Registro de Ventas</h2>

  <form class="form-inline" action="/action_page.php">
    <label for="folio" class="mb-2 mr-sm-2">Folio de Venta:</label>
    <input type="text" class="form-control mb-2 mr-sm-5" id="folio" name="folio">
    <label for="pwd2" class="mb-2 mr-sm-2">Fecha de Venta:</label>
    <input type="date" class="form-control mb-2 mr-sm-5" id="fecha" name="fecha">
    <div class="form-check mb-2 mr-sm-2">
      
    </div>    
    <button type="submit" class="btn btn-primary mb-2 ">Consultar</button>
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
        <th style="text-align:center">Fecha</th>
        <!-- Agrega más encabezados de columna según tus necesidades -->
      </tr>
    </thead>
    <tbody>
        <td style="text-align:center">00001</td>
        <td style="text-align:center">Jabon de Azufre</td>
        <td style="text-align:center">100</td>
        <td style="text-align:center">$1500.00</td>
        <td style="text-align:center" class="date" type="date">12/06/2023</td>
        <tr></tr>
    
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
    </div>
  </fieldset>
</form>



    
    

<!--FIN del cont principal-->
<?php require_once "vistas/page_down.php"?>