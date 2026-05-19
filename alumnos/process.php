<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dni = $_POST['dni'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $carrera_id = $_POST['carrera_id'];

    // INSERTAR ALUMNO
    $stmt = $pdo->prepare("
        INSERT INTO alumno
        (
            dni,
            nombres,
            apellidos,
            direccion,
            telefono,
            carrera_id
        )
        VALUES
        (
            ?, ?, ?, ?, ?, ?
        )
    ");

    $stmt->execute([
        $dni,
        $nombres,
        $apellidos,
        $direccion,
        $telefono,
        $carrera_id
    ]);

    header("Location: index.php");
    exit();
}
?>