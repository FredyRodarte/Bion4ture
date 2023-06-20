<?php 
include_once "conexion.php";


// ...

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener el carrito de compras enviado desde JavaScript
    $carrito = $_POST["carrito"];

    // Preparar la sentencia SQL para la inserción
    $stmt = mysqli_prepare($conn, "INSERT INTO ventas (producto, precio, cantidad, subtotal) VALUES (?, ?, ?, ?)");

    // Vincular los parámetros a la sentencia preparada
    mysqli_stmt_bind_param($stmt, "sidi", $producto, $precio, $cantidad, $subtotal);

    // Insertar los registros en la base de datos
    foreach ($carrito as $item) {
        
        $producto = $item["producto"];
        $precio = $item["precio"];
        $cantidad = $item["cantidad"];
        $subtotal = $item["subtotal"];

        mysqli_stmt_execute($stmt);
    }

    // Cerrar la sentencia preparada
    mysqli_stmt_close($stmt);

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);

    // Enviar una respuesta exitosa al cliente
    echo "OK";
}
?>


?>