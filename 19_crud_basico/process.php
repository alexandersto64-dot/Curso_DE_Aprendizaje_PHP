<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dni = $_POST['dni'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $cargo_id = $_POST['cargo_id'];

    // Insertar empleado
    $stmt = $pdo->prepare("INSERT INTO empleado (dni, nombres, apellidos, direccion, telefono, cargo_id) 
              VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$dni, $nombres, $apellidos, $direccion, $telefono, $cargo_id]);
    header("Location: index.php");
    exit();
}
