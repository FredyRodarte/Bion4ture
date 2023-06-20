<?php require_once "vistas/page_top.php"?>
<!--INICIO del cont principal-->
<script>
    function agregarProducto(id, nombre, precio) {
        var cantidad = parseInt(prompt("Ingrese la cantidad de " + nombre + " a agregar:"));
        if (cantidad > 0) {
            let carrito = document.getElementById("carrito");
            let fila = document.createElement("tr");
            fila.innerHTML = `
                <td>${nombre}</td>
                <td>${precio}</td>
                <td>${cantidad}</td>
                <td>${(precio * cantidad).toFixed(2)}</td>
                <td><button onclick="eliminarProducto(this)">Eliminar</button></td>
            `;
            carrito.appendChild(fila);
            calcularTotal(); // Calcular el total después de agregar un producto
        }
    }
    
    function eliminarProducto(boton) {
        boton.closest("tr").remove();
        calcularTotal(); // Calcular el total después de eliminar un producto
    }
    
    function calcularTotal() {
    let total = 0.0;
    let filas = document.querySelectorAll("#carrito tr");
    filas.forEach(function(fila) {
        let subtotal = parseFloat(fila.children[3].textContent);
        if (!isNaN(subtotal)) {
            total += subtotal;
            console.log(subtotal);
        }
    });
        document.getElementById("total").textContent = total.toFixed(2);
        console.log(total);
    }
    
    
    
    function pagar() {
    let total = parseFloat(document.getElementById("total").textContent);
    if (total > 0.0) {
        if (confirm("¿Desea procesar el pago por $" + total.toFixed(2) + "?")) {
            // Obtener los datos del carrito de compras
            let carrito = [];
            let filas = document.querySelectorAll("#carrito tbody tr");
            filas.forEach(function(fila) {
                let producto = fila.children[0].textContent;
                let precio = parseFloat(fila.children[1].textContent);
                let cantidad = parseInt(fila.children[2].textContent);
                let subtotal = parseFloat(fila.children[3].textContent);

                carrito.push({
                    producto: producto,
                    precio: precio,
                    cantidad: cantidad,
                    subtotal: subtotal
                });
            });

            // Enviar los datos del carrito de compras al servidor mediante AJAX
            $.ajax({
                url: "registro_venta.php", // Ruta a la página PHP que procesará la solicitud
                type: "POST",
                data: { carrito: carrito }, // Enviar los datos del carrito como un objeto JSON
                success: function(response) {
                    alert("Pago procesado correctamente.");
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.log(error);
                    alert("Error al procesar el pago.");
                }
            });
        }
    } else {
        alert("No hay productos en el carrito.");
    }
}
    

</script>
<div class="container">
    <h1><img src='vendor/img/logo1.png' alt=''>BioN4ture</h1>
    <!-- contenido principal    INICIO   -->
<div id="botonera"> 
    <div class="container text-center"> 
    
    
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <div class="col">
            <div class="p-3" onclick="agregarProducto(1, 'Jabon de Azufre', 30.00)"><img src='vendor/img/azufre.jpg' alt='' style="width:150px;height:150px;"></div>
        </div>
            <div class="col">
            <div class="p-3" onclick="agregarProducto(2, 'Jabon de Aceite de Argán', 30.00)"><img src='vendor/img/aceiteargan.jpg' alt=''style="width:150px;height:150px;"></div>
        </div>
            <div class="col">
            <div class="p-3" onclick="agregarProducto(3, 'Jabon de Aloe Vera', 30.00)"><img src='vendor/img/aloevera.jpg' alt=''style="width:150px;height:150px;"></div>
        </div>
            <div class="col">
            <div class="p-3" onclick="agregarProducto(4, 'Jabon de Chocolate', 30.00)"><img src='vendor/img/chocolate.jpg' alt=''style="width:150px;height:150px;"></div>
        </div>
            <div class="col">
            <div class="p-3" onclick="agregarProducto(5, 'Jabon de Romero', 30.00)"><img src='vendor/img/romero.jpg' alt=''style="width:150px;height:150px;"></div>
        </div>
            <div class="col">
            <div class="p-3" onclick="agregarProducto(6, 'Jabon de Arcilla Roja', 30.00)"><img src='vendor/img/arcillaroja.jpg' alt=''style="width:150px;height:150px;"></div>
        </div>
            <div class="col">
            <div class="p-3" onclick="agregarProducto(7, 'Jabon de Carbon Activado', 30.00)"><img src='vendor/img/carbonact.jpg' alt=''style="width:150px;height:150px;"></div>
        </div>
            <div class="col">
            <div class="p-3" onclick="agregarProducto(8, 'Jabon de Leche de Cabra', 30.00)"><img src='vendor/img/leche.jpg' alt=''style="width:150px;height:150px;"></div>
        </div>
            <div class="col">
            <div class="p-3" onclick="agregarProducto(9, 'Jabon de Rosa Mosqueta', 30.00)"><img src='vendor/img/rosamosqueta.jpg' alt=''style="width:150px;height:150px;"></div>
        </div>
            <div class="col">
            <div class="p-3" onclick="agregarProducto(10, 'Jabon de Limon', 30.00)"><img src='vendor/img/limon.jpg' alt=''style="width:150px;height:150px;"></div>
        </div>
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


<?php require_once "vistas/page_down.php"?>
