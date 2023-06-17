<?php require_once "vistas/page_top.php"?>
<!--INICIO del cont principal-->
<div class="container">
    <h1><img src='vendor/img/logo1.png' alt=''>BioN4ture</h1>
    

<div class="container text-center"> <!-- contenido principal    INICIO   -->
        
<div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
    <div class="col">
      <div class="p-3" onclick="agregarProducto(1, 'Producto 1', 10.00)"><img src='vendor/img/azufre.jpg' alt='' style="width:150px;height:150px;"></div>
    </div>
    <div class="col">
      <div class="p-3" onclick="agregarProducto(2, 'Producto 2', 15.00)"><img src='vendor/img/aceiteargan.jpg' alt=''style="width:150px;height:150px;"></div>
    </div>
    <div class="col">
      <div class="p-3" onclick="agregarProducto(2, 'Producto 3', 15.00)"><img src='vendor/img/aloevera.jpg' alt=''style="width:150px;height:150px;"></div>
    </div>
    <div class="col">
      <div class="p-3" onclick="agregarProducto(2, 'Producto 4', 15.00)"><img src='vendor/img/chocolate.jpg' alt=''style="width:150px;height:150px;"></div>
    </div>
    <div class="col">
      <div class="p-3" onclick="agregarProducto(2, 'Producto 5', 15.00)"><img src='vendor/img/romero.jpg' alt=''style="width:150px;height:150px;"></div>
    </div>
    <div class="col">
      <div class="p-3" onclick="agregarProducto(2, 'Producto 6', 15.00)"><img src='vendor/img/arcillaroja.jpg' alt=''style="width:150px;height:150px;"></div>
    </div>
    <div class="col">
      <div class="p-3" onclick="agregarProducto(2, 'Producto 7', 15.00)"><img src='vendor/img/carbonact.jpg' alt=''style="width:150px;height:150px;"></div>
    </div>
    <div class="col">
      <div class="p-3" onclick="agregarProducto(2, 'Producto 8', 15.00)"><img src='vendor/img/leche.jpg' alt=''style="width:150px;height:150px;"></div>
    </div>
    <div class="col">
      <div class="p-3" onclick="agregarProducto(2, 'Producto 9', 15.00)"><img src='vendor/img/rosamosqueta.jpg' alt=''style="width:150px;height:150px;"></div>
    </div>
    <div class="col">
      <div class="p-3" onclick="agregarProducto(2, 'Producto 10', 15.00)"><img src='vendor/img/limon.jpg' alt=''style="width:150px;height:150px;"></div>
    </div>
  </div>
  
</div>                  <!-- contenido principal FIN -->
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


<?php require_once "vistas/page_down.php"?>
