<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "rrhh"; // prueba vacío

// Validar nombre de la base de datos
if (empty(trim($base_datos))) {
    die("Error: Debes ingresar el nombre de la base de datos.");
}

try {
    // Crear conexión PDO
    $pdo = new PDO(
        "mysql:host=$host;dbname=$base_datos",
        $usuario,
        $contrasena
    );

    // Activar modo excepción
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    #echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
