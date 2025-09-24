<?php
session_start(); // Guarda el dinero entre jugadas

// Inicializar el juego con la cantidad introducida
if (isset($_POST['iniciar'])) {
    $dinero = max(0, (float)$_POST['dinero']);
    $_SESSION['dinero'] = $dinero;
    $_SESSION['mensaje'] = "¡Juego iniciado con $dinero €!";
    $_SESSION['imagen'] = "";
}

// Realizar una apuesta
if (isset($_POST['apostar']) && isset($_SESSION['dinero'])) {
    $dinero = $_SESSION['dinero'];
    $opciones = [
        "pierde" => ["img/pierde.jpg", 0, "¡Oh no! Has perdido todo tu dinero."],
        "mitad" => ["img/mitad.jpg", 0.5, "Has perdido la mitad de tu dinero."],
        "gana" => ["img/gana.jpg", 2, "¡Suerte! Has duplicado tu dinero."]
    ];

   [$imagen, $factor, $mensaje] = $opciones[array_rand($opciones)];
    $_SESSION['dinero'] = round($_SESSION['dinero'] * $factor, 2);
    $_SESSION['imagen'] = $imagen;

}

// Reiniciar el juego
if (isset($_POST['reiniciar'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Apuesta y gana</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>🎰 Apuesta y gana</h1>

    <?php if (!isset($_SESSION['dinero'])): ?>
        <!-- Formulario para iniciar el juego -->
        <form method="post">
            <label for="dinero">Introduce tu dinero inicial (€):</label>
            <input type="number" name="dinero" id="dinero" min="1" step="0.01" required>
            <input type="submit" name="iniciar" value="Iniciar juego">
        </form>
    <?php else: ?>
        <!-- Mostrar resultado de la apuesta -->
        <div class="estado">
            <p><strong>Dinero actual:</strong> <?= $_SESSION['dinero'] ?> €</p>
            <p><strong><?= $_SESSION['mensaje'] ?></strong></p>
            <?php if ($_SESSION['imagen']): ?>
                <img src="<?= $_SESSION['imagen'] ?>" alt="Resultado">
            <?php endif; ?>
        </div>

        <!-- Opciones de continuar o reiniciar -->
        <?php if ($_SESSION['dinero'] > 0): ?>
            <form method="post">
                <input type="submit" name="apostar" value="Prueba suerte">
                <input type="submit" name="reiniciar" value="Abandonar el juego">
                              
            </form>
        <?php else: ?>
            <form method="post">
                <input type="submit" name="reiniciar" value="Probar suerte de nuevo">
                 
            </form>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
