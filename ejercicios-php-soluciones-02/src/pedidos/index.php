<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Pedido</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Enlace al archivo CSS -->
    <script>
        // Función para reiniciar el formulario recargando la página
        function reiniciarPedido() {
            location.reload();
            echo "pedido reiniciado";
        }
    </script>
</head>
<body>
    <h1>Pide la comida más sana a domicilio</h1>

    <!-- Formulario principal para seleccionar productos -->
    <form method="post" action="">
        <h2>Comidas</h2>
        <div class="fila">
        <?php
        // Array de comidas con nombre, precio y ruta de imagen
        $comidas = [
            "hamburguesa" => ["Hamburguesa vegetariana", 6.95, "img/hamburguesa.jpg"],
            "pasta" => ["Pasta al pesto", 8.50, "img/pastapesto.jpg"],
            "pizza" => ["Pizza caprese", 7.90, "img/pizzacaprese.jpg"],
            "quinoa" => ["Quinoa con verdura", 9.20, "img/quinoa.jpg"]
        ];

        // Recorrer cada comida y mostrarla como una tarjeta
        foreach ($comidas as $comanda => [$nombre, $precio, $imagen]) {
            echo "<div class='item'>
                    <img src='$imagen' alt='$nombre'> <!-- Imagen del producto -->
                    <h3>$nombre</h3> <!-- Nombre del producto -->
                    <p>" . number_format($precio, 2) . "</p> <!-- Precio con 2 decimales -->
                    <input type='number' name='$comanda' min='0' value='0'> <!-- Campo para cantidad -->
                  </div>";
        }
        ?>
        </div>

        <h2>Bebidas</h2>
        <div class="fila">
        <?php
        // Array de bebidas con nombre, precio y ruta de imagen
        $bebidas = [
            "agua" => ["Agua", 1.20, "img/agua.jpg"],
            "cervezas" => ["Cerveza", 1.80, "img/cerveza.jpg"],
            "refrescos" => ["Refresco", 1.80, "img/refresco.jpg"]
        ];

        // Recorrer cada bebida y mostrarla como una tarjeta
        foreach ($bebidas as $comanda => [$nombre, $precio, $imagen]) {
            echo "<div class='item'>
                    <img src='$imagen' alt='$nombre'> <!-- Imagen de la bebida -->
                    <h3>$nombre</h3>
                    <p>" . number_format($precio, 2) . "</p>
                    <input type='number' name='$comanda' min='0' value='0'>
                  </div>";
        }
        ?>
        </div>

        <!-- Botones para enviar el pedido o reiniciar -->
        <div class="boton">
            <input type="submit" value="Hacer pedido"> <!-- Enviar formulario -->
            <button type="button" onclick="reiniciarPedido()">Nuevo pedido</button> <!-- Recargar página -->
        </div>
    </form>

    <?php
    // Si se ha enviado el formulario (método POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<div id='total-pedido'>
                <h2>Resumen del Pedido</h2>
                <div class='resumen'>";

        $total = 0; // Inicializar total

        // Combinar comidas y bebidas en un solo array para recorrerlos juntos
        foreach (array_merge($comidas, $bebidas) as $comanda => [$nombre, $precio, $imagen]) {
            // Obtener la cantidad seleccionada del formulario
            $cantidad = isset($_POST[$comanda]) ? (int)$_POST[$comanda] : 0;

            // Si se ha pedido al menos una unidad
            if ($cantidad > 0) {
                $subtotal = $cantidad * $precio; // Calcular subtotal
                $total += $subtotal; // Sumar al total
                echo "<p>$cantidad x $nombre = " . number_format($subtotal, 2) . " €</p>"; // Mostrar línea del pedido
            }
        }

        // Mostrar el total final
        echo "  </div>
                <div class='total'><strong>Total: " . number_format($total, 2) . " €</strong></div>
              </div>";
    }
    ?>
</body>
</html>

