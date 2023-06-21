

function agregarProducto(id, nombre, precio) {
         cantidad = parseInt(prompt("Ingrese la cantidad de " + nombre + " a agregar:"));
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
            //venta.push(registro);
            
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
            subtotal = parseFloat(fila.children[3].textContent);
            if (!isNaN(subtotal)) {
                total += subtotal;
                //console.log(subtotal);
            }
        });
        document.getElementById("total").textContent = total.toFixed(2);
        //console.log(total);
    }
    
    function pagar() {
        let total = parseFloat(document.getElementById("total").textContent);
        if (total > 0.0) {
            if (confirm("¿Desea procesar el pago por $" + total.toFixed(2) + "?")) {
                // Aquí se podría enviar el registro de ventas a la base de datos mediante una petición AJAX
                var registroVenta = leerTabla();
                console.log(registroVenta);
                $.ajax({
                    url: "bd/registrarVenta.php",
                    type:"POST",
                    data: {datos:registroVenta},
                    success: function(response){
                        console.log("Datos enviados");
                    },
                    error: function(xhr, status, error){
                        console.log("Datos no enviados.");
                    }
                });
                alert("Pago procesado correctamente.");
                //location.reload();
            }
        } else {
            alert("No hay productos en el carrito.");
        }
    }

    function leerTabla(){
        let tablaCarrito = document.getElementById("carrito"); //extrae la tabla carrito
        let filas = tablaCarrito.getElementsByTagName("tr"); //extra todas las filas de la tabla
        var venta = [];
        var folio = crearFolio();

        //iterar sobre las filas excluyendo la ultima columna
        for (var i = 1; i < filas.length; i++) {
            var fila = filas[i];
            var celdas = fila.getElementsByTagName("td"); //extraer las celdas de cada fila

            //extraer los datos de cada celda excpeto la del boton.
            var producto = celdas[0].innerText;
            var precio = parseInt(celdas[1].textContent);
            var cantidad = parseInt(celdas[2].textContent);
            var subtotal = parseInt(celdas[3].textContent);

            var fecha = crearFecha();

            var registro = {folio:folio,nombre:producto,precio:precio,cantidad,cantidad,subtotal:subtotal,fecha:fecha};
            venta.push(registro);
        }
        return venta;
        //console.log(venta);
    }

    function crearFecha(){
        var fecha = new Date();

        var year = fecha.getFullYear();
        var month = ("0" + (fecha.getMonth() + 1)).slice(-2);
        var day = ("0" + fecha.getDate()).slice(-2);

        var fechaSQL = year+"-"+month+"-"+day;

        return fechaSQL;
    }

    function crearFolio(){
        var randomNumber = Math.floor(Math.random()*9000)+1000;
        var folio = "VENTA"+randomNumber;
        return folio;
    }