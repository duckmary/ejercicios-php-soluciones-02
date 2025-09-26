<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(to right, #7fd0f6, #a3e4ff);
    margin: 0;
    padding: 40px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

h1 {
    color: #003366;
    font-size: 2.5em;
    margin-bottom: 20px;
    text-shadow: 1px 1px 2px #ffffff;
}

ul {
    list-style-type: none;
    padding: 0;
    max-width: 600px;
    width: 100%;
}

li {
    background-color: #ffffff;
    margin: 15px 0;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

li:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

a {
    text-decoration: none;
    color: #0077cc;
    font-weight: bold;
    font-size: 1.1em;
}

a:hover {
    text-decoration: underline;
    color: #005fa3;
}

    </style>
</head>
<body>
    <h1>Ejercicios de PHP – Relación II (Certificaciones de Profesionalidad) </h1>
    <p>Selecciona una secciona un ejercicio para ver la <strong>SOLUCIÓN:</strong></p>

    <ol>
        <li><a href="pedidos/index.php">Realiza tu pedido</a></li>
        <li><a href="apuestaygana/index.php">Apuesta y Gana</a></li>
    </ol>
</body>
</html>
